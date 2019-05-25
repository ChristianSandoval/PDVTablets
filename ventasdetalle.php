<?php
include('header.php');?>

<form action="filtrar_ventasdetalle.php" method="POST">
	<div class="row">
		<div class="col-md-2">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
			<?php if (isset($_SESSION['nombre'])) { echo "value='".$_SESSION['nombre']."'"; } ?>
			>
          </div>
		</div>
		
		<div class="col-md-2">
		<div  class="form-group">
    <input id="fecha_Inicial" name="fecha_Inicial" class="form-control" type="date"
		<?php if (isset($_SESSION['fechaInicial'])) { echo "value='".$_SESSION['fechaInicial']."'"; } ?>
		 />
		</div>
		</div>

		<div class="col-md-2">
		<div class="form-group">
    <input id="fecha_Final" name="fecha_Final" class="form-control" type="date" 
		<?php if (isset($_SESSION['fechaFinal'])) { echo "value='".$_SESSION['fechaFinal']."'"; } ?>
		/>
</div>
</div>

		<div class="col-md-2">
		  <div class="form-group">
		  <select name="sucursales" class="form-control" <?php if($_SESSION['usuario']!="ADMINISTRADOR") echo "disabled='disabled'";?>>
		  <option value="-1">TODAS LAS SUCURSALES</option>
		  <?php $q1 = "SELECT NAME FROM USUARIOS ORDER BY NAME";
        $result_tasks = mysqli_query($conn, $q1);    
          while($row = mysqli_fetch_assoc($result_tasks)) { 
		     echo '<option ';
			 if (isset($_SESSION['sucursales'])) { 
			 if($_SESSION['sucursales']==$row['NAME']) echo ' selected';
			 }
			 echo '>'.$row['NAME'].'</option>';
		  }
		  ?>
			</select>
          </div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<input type="submit" name="filtrar" class="btn btn-success" value="Buscar">
			</div>
		  </div>
		</div>
	</div>  
</form>
<div class="row">
  <div class="col-md-12 table-responsive">
      <table class="table table-bordered table-striped">
			<thead>
			<tr>
			<th>Fecha</th>
			<th>Nombre</th>
			<th>Importe</th>
			<th>Sucursal</th>
			</tr>
			</thead>
        <tbody>
  <?php if (isset($_SESSION['query2'])) { 
          $query2 = $_SESSION['query2'];
          $result_tasks = mysqli_query($conn, $query2);    
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['FECHA']; ?></td>
						<td><?php echo $row['NOMBRE']; ?></td>
						<td><?php echo $row['IMPORTE']; ?></td>
						<td><?php echo $row['SUCURSAL']; ?></td>
					</tr>
					<?php }}?>
        </tbody>
      </table>
    </div>
  </div>

<!-- Llamar a los complementos javascript-->
<script src="jquery-1.12.4.min.js"></script>
<script src="FileSaver.min.js"></script>
<script src="Blob.min.js"></script>
<script src="xls.core.min.js"></script>
<script src="dist/js/tableexport.js"></script>
<script>
$("table").tableExport({
	formats: ["xlsx"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
	position: 'top',  // Posicion que se muestran los botones puedes ser: (top, bottom)
	bootstrap: false,//Usar lo estilos de css de bootstrap para los botones (true, false)
	fileName: "Reporte",    //Nombre del archivo 
});
</script>
<?php
include('footer.php');?>