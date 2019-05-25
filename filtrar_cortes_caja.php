<?php
include('db.php');
if (isset($_POST['filtrar'])) {
  $codigo = $_POST['codigo'];
  $fechaInicial = $_POST['fecha_Inicial'];
  $fechaFinal = $_POST['fecha_Final'];
  $sucursales = $_POST['sucursales'];
  $query = "SELECT LOCATIONS.NAME AS SUCURSAL, " .
  "CLOSEDCASH.HOSTSEQUENCE, " .
  "CLOSEDCASH.DATESTART, " .
  "IFNULL(CLOSEDCASH.DATEEND,'') AS DATEEND, " .
  "CASE WHEN PAYMENTS.PAYMENT='cash' THEN 'EFECTIVO' WHEN PAYMENTS.PAYMENT='magcard' THEN 'TARJETA' " .
  " WHEN PAYMENTS.PAYMENT='cheque' THEN 'DEPOSITO' WHEN PAYMENTS.PAYMENT='debt' THEN 'CREDITO' " .
  " WHEN PAYMENTS.PAYMENT='debtpaid' THEN 'PAGOCREDITO' WHEN PAYMENTS.PAYMENT='cashin' THEN '(ENTRADA)EFE' " .
  " WHEN PAYMENTS.PAYMENT='cashout' THEN '(SALIDA)EFE' ".
  " WHEN PAYMENTS.PAYMENT='cashrefund' THEN 'DEVOLUCION' ".
  " ELSE '' END AS PAYMENT, " .
  "CONCAT('$',FORMAT(SUM(PAYMENTS.TOTAL),2)) AS TOTAL " .
  "FROM CLOSEDCASH, PAYMENTS, RECEIPTS, LOCATIONS " .
  "WHERE CLOSEDCASH.MONEY = RECEIPTS.MONEY AND PAYMENTS.RECEIPT = RECEIPTS.ID AND LOCATIONS.ID=CLOSEDCASH.ACTIVECASH ";
  if($codigo!='')
  {
	    $query .= " AND CLOSEDCASH.HOSTSEQUENCE = '".$codigo."'";
  }
  if($sucursales!='-1')
  {
	  $query .= " AND LOCATIONS.ID = '".$sucursales."'";
  }
  $query .= " AND RECEIPTS.DATENEW BETWEEN '".$fechaInicial."' AND '".$fechaFinal." 23:59:59'";
  $query .= " GROUP BY CLOSEDCASH.HOST, CLOSEDCASH.HOSTSEQUENCE, CLOSEDCASH.MONEY, CLOSEDCASH.DATESTART, CLOSEDCASH.DATEEND, PAYMENTS.PAYMENT ";
  $query .= " ORDER BY CLOSEDCASH.HOST, CLOSEDCASH.HOSTSEQUENCE";
  
  $_SESSION['query'] = $query;
  $_SESSION['codigo'] = $codigo;
  $_SESSION['sucursales'] = $sucursales;
  header('Location: cortes_caja.php');
}
?>