<table class='table'>
  <thead>
    <tr>
      <th scope="col">Nro. Transaccion</th>
      <th scope="col">Monto 1er Venc</th>
      <th scope="col">Identificador</th>
      <th scope="col">Fecha Pago 1er Venc</th>
      <th scope="col">Forma de Pago</th>
      <th scope="col">Promedio por transaccion</th>
    </tr>
    </thead>
    <tr>

<?php

$lineas = file("888ENTES5723_308.txt.2021");
$totallineas=count($lineas);
//$tipag = substr($lineas[0], 8,1);
$monfinal = substr($lineas[$totallineas-1], 15,13);
$cantreg = substr($lineas[$totallineas-1], 7,8);
//$prom= $monfinal/$cantreg;
for($i=1;$i<$totallineas-2;$i++){
    
$ref = substr($lineas[$i], 40,8);
echo"
<td>$ref</td>";
$mon = substr($lineas[$i], 77,11);
echo"
<td>$mon</td>";
$iden = substr($lineas[$i], 58,10);
//$pr=$mon+$mon2+$mon3;
//$prom=$pr/3;
echo"
<td>$iden</td>";
$fech = substr($lineas[$i], 224,6);
echo"
<td>$fech</td>";
$tipag = substr($lineas[$i], 245,2);
echo"
<td>$tipag</td>";
$prom=$mon/1;//En este archivo hay un monto por transaccion
echo"
<td>$prom</td></tr>";
}
echo "Monto total ".$monfinal."<br>";
echo "Cantidad registros ".$cantreg."<br>";
?>
</table>