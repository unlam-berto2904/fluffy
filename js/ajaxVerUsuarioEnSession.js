

app.controller("controladorDeUsuarioEnSesion", function($scope, $http){
    $scope.verUsuario = function(){
      $http.post("../controladores/verUsuarioEnSesionController.php", {'idUsuario':idUsuario})
      .success(function(data){
          $scope.usuario = data
        }
      )
    }

    
});