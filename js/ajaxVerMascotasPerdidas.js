//Inicialización de variables para comienzo de busqueda en BD y limite de resultasdos en la query
var desde = 0;
var cantidad = 1;
var desdeAdopcion = 0;
// definicion del modulo
var app = angular.module("miModulo", []);

//funcion ajax para consultar mascotas perdidas
app.controller("controlador", function($scope, $http){
  $scope.verMascotasPerdidas = function(){
    	$http.post("../controladores/verMascotasPerdidasController.php", {'desde':desde, 'cantidad':cantidad})
    	.success(function(data){
          if(desde == 0){
      		  $scope.perdidos = data;
      		  desde = desde + cantidad;
          }else{
            $scope.perdidos = $scope.perdidos.concat(data);
            desde = desde + cantidad;
          }
        }
    	)}
});

var array = [];

// segundo controlador del modulo. Permite utilizar un nuevo ajax independiente del controlador anterior
app.controller("controladorAdopcion", function($scope, $http){
    $scope.verMascotasEnAdopcion = function(){
      $http.post("../controladores/verMascotasEnAdopcionController.php", {'desde':desdeAdopcion, 'cantidad':cantidad})
      .success(function(data){
          if(desde == 0){
              array = data;
            $scope.enAdopcion = array;
            desdeAdopcion = desdeAdopcion + cantidad;
          }else{
            array = array.concat(data);
            $scope.enAdopcion = array;
                       
            desdeAdopcion = desdeAdopcion + cantidad;
          }
        }
      )
    }

    $scope.vaciarEnAdopcion = function(){
      desdeAdopcion = 0;
      array = [];
    }
});

/*
var app = angular.module("myapp",[]);  
 app.controller("controlador", function($scope, $http){  
      $scope.loadProvincia = function(){  
           $http.get("load_provincia.php")  
           .success(function(data){  
                $scope.provincias = data;  
           })  
      }  
      $scope.loadLocalidad = function(){  
           $http.post("load_localidad.php", {'idProvincia':$scope.provincia})  
           .success(function(data){  
                $scope.localidades = data;  
           });  
      }  
 });  */