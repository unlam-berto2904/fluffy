<?php

include("Conectarbd.php");
include("dompdf-master/dompdf_config.inc.php");

$html = "<html><head></head><body>";
$html .= "<img src='logo-tiomusa.png'><br><br><br>";
$html .= "<center><u>Especialidades</u></center>";
$html .= "<center><table>";


$sql = "select especialidades.idEspecialidad, especialidades.descripcionEspecialidad from especialidades";
$con = New conectarBD();
$reg = $con->ConsultaSelect($sql);
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>Descripcion</th>";
$html .=  "</tr>";

while($fila = mysqli_fetch_assoc($reg)) {
    $html .=  "<tr>";
    $html .=  "<td>" . $fila["idEspecialidad"]. "</td>";
    $html .=  "<td>" . $fila["descripcionEspecialidad"]. "</td>";
    $html .=  "</tr>";
}
$html .=  "</table>";
$html .= "</center></body></html>";

$mipdf = new DOMPDF();
$mipdf->set_paper("A4", "portait");
$mipdf->load_html(utf8_decode($html));
$mipdf->render();
$mipdf->stream("Especialidades.pdf")
?>
