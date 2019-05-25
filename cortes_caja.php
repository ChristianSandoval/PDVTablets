<?php
include('header.php');?>
<form action="filtrar_cortes_caja.php" method="POST">
	<div class="row">
		<div class="col-md-2">
          <div class="form-group">
            <input type="text" name="codigo" class="form-control" placeholder="#Corte" autofocus
			<?php if (isset($_SESSION['codigo'])) { echo "value='".$_SESSION['codigo']."'"; } ?>
			>
          </div>
		</div>
		<div class="col-md-2">
			<div  class="form-group">
			<input id="fecha_Inicial" name="fecha_Inicial" class="form-control datepicker date" type="text" data-date-format="dd-mm-yyyy" readonly name="fechaInicial"/>
			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
		</div>

		<div class="col-md-2">
				<div class="form-group">
				<input id="fecha_Final" name="fecha_Final" class="form-control datepicker date" type="text" data-date-format="dd-mm-yyyy" readonly name="fechaFinal"/>
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
		</div>
</div>

		<div class="col-md-2">
		  <div class="form-group">
		  <select name="sucursales" class="form-control">
		  <option value="-1">TODAS LAS SUCURSALES</option>
		  <?php $q1 = "SELECT ID, NAME FROM LOCATIONS ORDER BY NAME";
        $result_tasks = mysqli_query($conn, $q1);    
          while($row = mysqli_fetch_assoc($result_tasks)) { 
		     echo '<option value="'.$row['ID'].'"';
			 if (isset($_SESSION['sucursales'])) { 
			 if($_SESSION['sucursales']==$row['ID']) echo ' selected';
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
  <div class="col-md-12">
  <?php if (isset($_SESSION['query'])) { ?>
		<table class="table table-bordered">
        <thead>
          <tr>
            <th>SUCURSAL/#</th>
            <th>FECHAS</th>
						<th>PAGO/TOTAL</th>
          </tr>
        </thead>
        <tbody>
        <?php  $query = $_SESSION['query'];
          $result_tasks = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['SUCURSAL']; ?>/<?php echo $row['HOSTSEQUENCE']; ?></td>
						<td><?php echo $row['PAYMENT']; ?>/<?php echo $row['TOTAL']; ?></td>
						<td><?php echo $row['DATESTART']; ?>/<?php echo $row['DATEEND']; ?></td>
					</tr>
					<?php }?>
					</tbody>
      </table>
			<?php session_unset(); }?>
    </div>
  </div>

<?php
include('footer.php');?>