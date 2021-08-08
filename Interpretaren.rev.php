
<table class='table'>
  <thead>
    <tr>
      <th scope="col">Nro. Transaccion</th>
      <th scope="col">Monto</th>
      <th scope="col">Identificador</th>
      <th scope="col">Fecha Pago</th>
      <th scope="col">Tipo Pago</th>
      <th scope="col">Promedio por transaccion</th>
      </tr>
    </thead>
    <tr>
<?php

//Abro archivo y lo asigno a $linea
$lineas = file("REND.REV-REVC8496.REV-20191125.txt");
//cuento tal de lineas
$totallineas=count($lineas);

$tipag = substr($lineas[0], 8,1);
$monfinal = substr($lineas[$totallineas-1], 25,14);
$cantreg = substr($lineas[$totallineas-1], 39,7);
$prom= $monfinal/$cantreg;
for($i=1;$i<$totallineas-1;$i++){
$ref = substr($lineas[$i], 52,16);
echo"
<td>$ref</td>";
$mon = substr($lineas[$i], 75,14);
echo"
<td>$mon</td>";
$iden = substr($lineas[$i], 4,21);
echo"
<td>$iden</td>";
$fech = substr($lineas[$i], 67,8);
echo"
<td>$fech</td>";
echo"
<td>$tipag</td>";
$prom=$mon/1;//Solo hay un monto en este archivo (se divide por 1)
echo"
<td>$prom</td></tr>";
}
echo "Monto total ".$monfinal."<br>";
echo "Cantidad registros ".$cantreg."<br>";
?>
</table>