<?php include("db.php"); if(empty($_SESSION['usuario'])) header('Location: index.php');?>

<!DOCTYPE html>
<html lang="es_MX">
  <head>
    <meta charset="UTF-8">
    <title>Punto de venta Conectiva</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="bootstrap.min.css">
  </head>
  <body>

  <nav class="navbar navbar-dark bg-dark">  
      <div class="container">
        <a class="navbar-brand" href="menu.php">CONECTIVA - <?php echo $_SESSION['usuario'];?></a>
      </div>
  </nav><br>
<form action="pos_back.php" method="POST">
<input type="hidden" name="agregarProducto" id="agregarProducto" />
<input type="hidden" name="eliminarProducto" id="eliminarProducto" />
	<div class="row">
		<div class="col-md-4 table-responsive">
        <table style="width:100%;">
        <tr>
            <td style="width:30%;">
                <input type="number" id="monto" class="form-control" onkeyup="document.getElementById('cambio').innerHTML=parseFloat(document.getElementById('monto').value-parseFloat(document.getElementById('vender').innerHTML.replace('$','').replace(',','')));" />
            </td>
            <td style="width:40%;text-align:center;">
                <h2><span id="cambio"></span></h2>
            </td>
            <td style="text-align:right;width:30%;">
                <button class="btn btn-success btn-lg text-white" name="vender" id="vender"><?php
                $result = "SELECT CONCAT('$',FORMAT(IFNULL(SUM(PRICESELL),0),2)) AS TOTAL FROM TICKETTEMP WHERE USUARIO='".$_SESSION['usuario']."'";
                $result_tasks = mysqli_query($conn, $result); 
                while($row = mysqli_fetch_assoc($result_tasks)) {
                    echo $row['TOTAL'];
                }
                ?></button>
            </td>
        </table>
        <table class="table table-bordered table-striped">
			<thead>
			<tr>
            <th></th>
			<th>Producto</th>
			<th>Precio</th>
			</tr>
			</thead>
        <tbody>
        <?php
          $result = "SELECT ID, NAME, CONCAT('$',FORMAT(PRICESELL,2)) AS PRICESELL FROM TICKETTEMP WHERE USUARIO='".$_SESSION['usuario']."'";
          $result_tasks = mysqli_query($conn, $result);    
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><button class="btn btn-danger btn-block btn-lg text-white" name="eliminar" onclick="document.getElementById('eliminarProducto').value='<?php echo $row['ID'];?>'">X</button></td>
            <td><?php echo $row['NAME']; ?></td>
            <td><?php echo $row['PRICESELL']; ?></td>
					</tr>
					<?php }?>
        </tbody>
      </table>
        </div>
        <div class="col-md-8">
        <div class="row">
        <div class="col-md-10">&nbsp;</div><div class="col-md-2">
        <input type="number" name="cantidad" class="form-control" /></div>
        <?php
          $i=1;
          $query = '';
          if($_SESSION['usuario']=='SANTIAGO'||$_SESSION['usuario']=='SAN BLAS'||$_SESSION['usuario']=='TOMATLAN'||$_SESSION['usuario']=='ADMINISTRADOR')
          {
            $query = 'SELECT NAME, ID, CONCAT("$",FORMAT(PRICESELL,2)) AS PRICESELL FROM PRODUCTS2 ORDER BY ID';
          }
          else if($_SESSION['usuario']=='TUXPAN')
          {
            $query = 'SELECT NAME, ID, CONCAT("$",FORMAT(PRICESELL2,2)) AS PRICESELL FROM PRODUCTS2 ORDER BY ID';
          }
          else if($_SESSION['usuario']=='RUIZ'||$_SESSION['usuario']=='VILLA HIDALGO')
          {
            $query = 'SELECT NAME, ID, CONCAT("$",FORMAT(PRICESELL3,2)) AS PRICESELL FROM PRODUCTS2 ORDER BY ID';
          }
          $result_tasks = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <div class="col-md-6">
            <button class="btn btn-secondary btn-block btn-lg text-white" name="agregar" id="<?php echo $row['ID'];?>" onclick="document.getElementById('agregarProducto').value='<?php echo $row['ID'];?>'">
            <?php echo $row['NAME'];?><br><?php echo $row['PRICESELL']; ?></button><br/>
          </div>
          <?php }?>
        </div>
        </div>
    </div>
</form>
</body>
</html>