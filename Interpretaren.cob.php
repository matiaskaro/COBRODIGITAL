<table class='table'>
  <thead>
    <tr>
      <th scope="col">Nro. Transaccion</th>
      <th scope="col">Monto 1er Venc</th>
      <th scope="col">Monto 2er Venc</th>
      <th scope="col">Monto 3er Venc</th>
      <th scope="col">Identificador</th>
      <th scope="col">Fecha Pago 1er Venc</th>
      <th scope="col">Fecha Pago 2er Venc</th>
      <th scope="col">Fecha Pago 3er Venc</th>
      <th scope="col">Tipo Pago</th>
      <th scope="col">Promedio por transaccion</th>
    </tr>
    </thead>
    <tr>

<?php
//Abro archivo y lo asigno a $lineas
$lineas = file("REND.COB-COBC8496.COB-20191125.TXT.2019");
$totallineas=count($lineas);
$tipag = substr($lineas[0], 8,1);
$monfinal = substr($lineas[$totallineas-2], 24,14);
$cantreg = substr($lineas[$totallineas-2], 39,7);
for($i=1;$i<$totallineas-2;$i++){
    
$ref = substr($lineas[$i], 52,16);
echo"
<td>$ref</td>";
$mon = substr($lineas[$i], 75,14);
echo"
<td>$mon</td>";
$mon2 = substr($lineas[$i], 98,14);
echo"
<td>$mon2</td>";
$mon3 = substr($lineas[$i], 120,14);
echo"
<td>$mon3</td>";
$iden = substr($lineas[$i], 4,21);
$pr=$mon+$mon2+$mon3;
$prom=$pr/3;
echo"
<td>$iden</td>";
$fech = substr($lineas[$i], 67,8);
echo"
<td>$fech</td>";
$fech2 = substr($lineas[$i], 89,8);
echo"
<td>$fech2</td>";
$fech3 = substr($lineas[$i], 111,8);
echo"
<td>$fech3</td>";
echo"
<td>$tipag</td>";
echo"
<td>$prom</td></tr>";
}
//estadisticos
echo "Monto total ".$monfinal."<br>";
echo "Cantidad registros ".$cantreg."<br>";
?>
</table>