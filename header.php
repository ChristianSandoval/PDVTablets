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
        <a class="navbar-brand" href="menu.php">CONECTIVA - <?php echo $_SESSION['usuario'];?></a>
      </div>
  </nav><br>