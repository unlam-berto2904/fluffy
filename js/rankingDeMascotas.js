$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    mostrarRankingValoraciones();

});
// Load the Visualization API and the corechart package.
function mostrarRankingValoraciones() {
  $.ajax({
    url:base_url+"/fluffy/controladores/obtenerRankingValoracionesMascotasController.php",
    type:"POST",
    data:'',
    success: function (result) {
      var parsed = JSON.parse(result);
      var tipoAnimal = ["Perros","Gatos"];
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          for (var i = 0; i < tipoAnimal.length; i++) {

          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Mascota');
          data.addColumn('number', 'Valoraciones');
          data.addRows(parsed[i].length);
          $.each(parsed[i], function(index, value1) {
            data.setCell(index, 0, value1.nombreMascota);
            data.setCell(index, 1, parseInt(value1.valoraciones));
          })

          var options = {'title':'Mascotas:' + tipoAnimal[i],
          'width':500,
          'height':500,
          is3D: true,
          backgroundColor: 'rgb(121, 102, 141)'
         };

          var chartPie = new google.visualization.PieChart(document.getElementById(tipoAnimal[i]));
          chartPie.draw(data, options);
        }
      }
    }
  });
}
