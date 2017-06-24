//Inicialización de variables para comienzo de busqueda en BD y limite de resultasdos en la query
var desde = 0;
var cantidad = 3;

// Funcion ajax de Angularjs
var app = angular.module("verPerdidos", []);
app.controller("controlador", function($scope, $http){
  $scope.verMascotasPerdidas = function(){
	$http.post("../controladores/verMascotasPerdidasController.php", {'desde':desde, 'cantidad':cantidad})
	.success(function(data){
		$scope.perdidos = data;
		desde = desde + cantidad;
    }
	)}
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