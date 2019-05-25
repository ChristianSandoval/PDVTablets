<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="es_MX">
  <head>
    <meta charset="UTF-8">
    <title>Punto de venta Conectiva</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="dist/css/tableexport.css" rel="stylesheet" type="text/css">
  </head>
  <body>

  <nav class="navbar navbar-dark bg-dark">  
      <div class="container">
        <a class="navbar-brand" href="index.php">Punto de venta Conectiva</a>
      </div>
  </nav>
  <form action="validarUsuario.php" method="POST"><br/><br/>
	<div class="row">
		<div class="col-md-4">&nbsp;
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<select name="usuarios" class="form-control">
					<?php $q1 = "SELECT NAME FROM USUARIOS ORDER BY NAME";
					$result_tasks = mysqli_query($conn, $q1);    
					while($row = mysqli_fetch_assoc($result_tasks)) { 
					echo '<option>'.$row['NAME'].'</option>';
					}
					?>
						</select><br/>
				</div>
			</div>
			<div class="row">
					<div class="col-md-12">
					<input type="password" id="clave" name="clave" class="form-control" />
					</div><br/><br/>
			</div>
			<div class="row">
					<div class="col-md-3">
					<button class="btn btn-secondary btn-lg text-white" name="entrar" id="entrar">Ingresar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">&nbsp;
		</div>
	</div>
</form>
<!-- BOOTSTRAP 4 SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
</body>
</html>