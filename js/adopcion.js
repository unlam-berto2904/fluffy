
var desde = 0;
var cantidad = 1;
var array = [{'uno':'uno'}];

var app = angular.module("verEnAdopcion", []);
app.controller("controladorAdopcion", function($scope, $http){
  	$scope.verMascotasEnAdopcion = function(){
    	$http.post("../controladores/verMascotasEnAdopcionController.php", {'desde':desde, 'cantidad':cantidad})
    	.success(function(data){
          if(desde == 0){
          		array = data;
      		  $scope.enAdopcion = array;
      		  desde = desde + cantidad;
          }else{
          	//array = array.concat(data);
          	//$scope.enAdopcion = array;
            //$scope.enAdopcion = $scope.enAdopcion.concat(data);

            $scope.enAdopcion = data;
            desde = desde + cantidad;
          }
        }
    	)
    }

    $scope.vaciarEnAdopcion = function(){
    	desde = 0;
    	array = [{'uno':'uno'}];
    }
});