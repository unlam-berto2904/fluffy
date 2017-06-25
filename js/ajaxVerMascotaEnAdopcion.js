





// segundo controlador del modulo. Permite utilizar un nuevo ajax independiente del controlador anterior
app.controller("controladorEnAdopcion", function($scope, $http){
    $scope.verMascotasEnAdopcion = function(){
      $http.post("../controladores/verMascotasEnAdopcionController.php", {'desde':desdeAdopcion, 'cantidad':cantidad})
      .success(function(data){
          if(desdeAdopcion == 0){
            arrayAdopcion = data;
            $scope.enAdopcion = arrayAdopcion;
            desdeAdopcion = desdeAdopcion + cantidad;
          }else{
            arrayAdopcion = arrayAdopcion.concat(data);
            $scope.enAdopcion = arrayAdopcion;
                       
            desdeAdopcion = desdeAdopcion + cantidad;
          }
        }
      )
    }

    $scope.vaciarEnAdopcion = function(){
      desdeAdopcion = 0;
      arrayAdopcion = [];
    }
});