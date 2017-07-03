

//funcion ajax para consultar mascotas perdidas
app.controller("controladorPerdidos", function($scope, $http){
  $scope.verMascotasPerdidas = function(){
    	$http.post("../controladores/verMascotasPerdidasController.php", {'desde':desde, 'cantidad':cantidad})
    	.success(function(data){
          if(desde == 0){
            arrayPerdidos = data;
      		  $scope.perdidos = arrayPerdidos;
      		  desde = desde + cantidad;
          }else{
            arrayPerdidos = arrayPerdidos.concat(data);
            $scope.perdidos = arrayPerdidos;
            desde = desde + cantidad;
          }
        }
    	)}
  $scope.vaciarPerdidos = function(){
        desde = 0;
        arrayPerdidos = [];
  }  
});

  
/*
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
*/
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