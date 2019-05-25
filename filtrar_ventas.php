<?php
include('db.php');
if (isset($_POST['filtrar'])) {
  $nombre = $_POST['nombre'];
  $sucursales = $_POST['sucursales'];
  
  $fechaInicial = $_POST['fecha_Inicial'];
  $fechaFinal = $_POST['fecha_Final'];
  $query = "SELECT PRODUCTS2.NAME AS NOMBRE, COUNT(*) AS CANTIDAD, CONCAT('$',FORMAT(SUM(LINEAS.PRICESELL), 2)) AS IMPORTE, LINEAS.USUARIO AS SUCURSAL FROM LINEAS INNER JOIN PRODUCTS2 ON LINEAS.PRODUCT=PRODUCTS2.ID"
  ." WHERE 1=1";
  
  if($nombre!='')
  {
	  $query .= " AND PRODUCTS2.NAME LIKE '%".$nombre."%'";
  }
  if($sucursales!='-1'&&$_SESSION['usuario'] =='ADMINISTRADOR')
  {
	  $query .= " AND LINEAS.USUARIO = '".$sucursales."'";
  }
  if($_SESSION['usuario'] !='ADMINISTRADOR')
  {
	  $query .= " AND LINEAS.USUARIO = '".$_SESSION['usuario']."'";
  }
  if($fechaInicial!=''&&$fechaFinal!='')
  {
    $query .= " AND LINEAS.FECHA BETWEEN '".$fechaInicial."' AND '".$fechaFinal." 23:59:59'";
  }
  $query .= " GROUP BY PRODUCTS2.NAME,LINEAS.USUARIO ORDER BY PRODUCTS2.ID, LINEAS.USUARIO";
  $_SESSION['query'] = $query;
  $_SESSION['nombre'] = $nombre;
  $_SESSION['sucursales'] = $sucursales;
  $_SESSION['fechaInicial'] = $fechaInicial;
  $_SESSION['fechaFinal'] = $fechaFinal;
  header('Location: ventas.php');
}
?>