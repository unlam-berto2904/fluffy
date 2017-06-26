
  
 app.controller("controladorEnCita", function($scope, $http){  
      $scope.traerCitas = function(){  
           $http.post("../controladores/verMascotasEnCitasController.php", {'desde':desdeCita, 'cantidad':cantidad})  
           .success(function(data){  
                if(desdeCita == 0){
                  arrayCita = data;
                  $scope.mascotas = arrayCita;
                  desdeCita = desdeCita + cantidad;
                }else{
                  arrayCita = arrayCita.concat(data);
                  $scope.mascotas = arrayCita;
                  desdeCita = desdeCita + cantidad;
                }
           })  
      }

      $scope.vaciarCita = function(){
        desdeCita = 0;
        arrayCita = [];
  }   
       
 });  