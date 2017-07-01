<?php
/**
 * Created by PhpStorm.
 * User: fdaranno
 * Date: 29/5/17
 */
define('FACEBOOK_SDK_SRC_DIR', __DIR__ . '/Facebook/');
require_once  __DIR__ . '/Facebook/autoload.php';

class FacebookLogin
{
    private $facebookApi;
    private $facebookHelper;
    private $loginUrl;
    private $fallbackUrl;
    private $permissions;

    private $appId;
    private $appSecret;
    private $defaultGraphVersion;

    private $accessToken;
    private $tokenMetadata;

    // Funciones de creacion de API de facebook --------------------------------------
    function __construct($fallbackUrl = 'http://localhost/fluffy/librerias/loginFacebook/facebookCallback.php'){

        $this->initConfig();

        $this->facebookApi = new Facebook\Facebook([
            'app_id' => $this->appId,
            'app_secret' => $this->appSecret,
            'default_graph_version' => $this->defaultGraphVersion,
        ]);

        $this->facebookHelper = $this->facebookApi->getRedirectLoginHelper();
        $this->fallbackUrl = $fallbackUrl;

        $this->permissions = ['email'];
        $this->loginUrl = $this->facebookHelper->getLoginUrl($this->fallbackUrl, $this->permissions);

    }

    private function initConfig()
    {
        $auxConfig = parse_ini_file( $_SERVER['DOCUMENT_ROOT'] .  "/fluffy/librerias/loginFacebook/config/config.ini", true);
        $this->appId = $auxConfig['facebook']['appId'];
        $this->appSecret = $auxConfig['facebook']['appSecret'];
        $this->defaultGraphVersion = $auxConfig['facebook']['defaultGraphVersion'];
    }

    public function getLoginUrl(){
        return htmlspecialchars( $this->loginUrl );
    }

    // Funciones de manejo en callback --------------------------------------
    public function getFacebookAcessToken(){
        return (string) $this->accessToken;
    }


    public function getUserName(){

        $response = null;
        try {
            $response = $this->facebookApi->get('/me?fields=id,name,email', $this->accessToken);
        } catch(Exception $e) {
            echo 'Error obteniendo datos del usuario de facebook';
        }

        $user = $response->getGraphUser();
        $name = $user->getName() ?  $user->getName() : "sin nombre";

        return $name;
    }

    public function getUserEmail(){

        $response = null;
        try {
            $response = $this->facebookApi->get('/me?fields=id,name,email', $this->accessToken);
        } catch(Exception $e) {
            echo 'Error obteniendo datos del usuario de facebook';
        }

        $user = $response->getGraphUser();
        $name = $user->getEmail() ?  $user->getEmail() : "sin email";

        return $name;
    }    

    // Esta funcion realiza las llamadas y validaciones necesarias para obtener el token para utilizar facebook
    public function generateAccessToken(){

        $validAccessToken = true;

        try {
            $this->accessToken = $this->facebookHelper->getAccessToken();
        } catch(Exception $e) {
            echo 'Facebook:ocurrio un error al realizar el login  ' . $e->getMessage();
            $validAccessToken = false;
        }

        if (! isset($this->accessToken)) {
            if ($this->helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $this->helper->getError() . "\n";
                echo "Error Code: " . $this->helper->getErrorCode() . "\n";
                echo "Error Reason: " . $this->helper->getErrorReason() . "\n";
                echo "Error Description: " . $this->helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            $validAccessToken = false;
        }

        $oAuth2Client = $this->facebookApi->getOAuth2Client();
        $this->tokenMetadata = $oAuth2Client->debugToken($this->accessToken);

        $this->tokenMetadata->validateAppId( $this->appId );
        $this->tokenMetadata->validateExpiration();

        if (! $this->accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $this->accessToken = $oAuth2Client->getLongLivedAccessToken($this->accessToken);
            } catch (Exception $e) {
                echo "Error getting long-lived access token\n\n";
                $validAccessToken = false;
            }
        }

        return $validAccessToken;
    }

    public function getFacebookAccessToken(){
        return $this->accessToken;
    }
}