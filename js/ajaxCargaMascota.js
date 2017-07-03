//var app = angular.module("traer", []);
app.controller("controlador", function($scope,$http){
	$scope.cargar=function(){
		$http.get("../controladores/cargarTipoAnimalesParaRegistroDeMascotaController.php").success(function(data){
			$scope.tipoAnimales=data;
		});

	$scope.cargarRaza=function(){
		$http.post("../controladores/cargarTipoRazaParaRegistroDeMascotaController.php", {'id_animal':$scope.tipoAnimal})
		.success(function(data){
			$scope.tipoRazas=data;
		});


}
}});