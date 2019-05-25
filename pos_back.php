<?php
include('db.php');
if (isset($_POST['agregar'])) {
    $query = '';
    if($_SESSION['usuario']=='SANTIAGO'||$_SESSION['usuario']=='SAN BLAS'||$_SESSION['usuario']=='TOMATLAN'||$_SESSION['usuario']=='ADMINISTRADOR')
          {
            $query = "INSERT INTO TICKETTEMP (ID, NAME, PRICESELL, USUARIO) SELECT ID, NAME, PRICESELL, '".$_SESSION['usuario']."' FROM PRODUCTS2 WHERE ID='".$_POST['agregarProducto']."'";
          }
          else if($_SESSION['usuario']=='TUXPAN')
          {
            $query = "INSERT INTO TICKETTEMP (ID, NAME, PRICESELL, USUARIO) SELECT ID, NAME, PRICESELL2, '".$_SESSION['usuario']."' FROM PRODUCTS2 WHERE ID='".$_POST['agregarProducto']."'";
          }
          else if($_SESSION['usuario']=='RUIZ'||$_SESSION['usuario']=='VILLA HIDALGO')
          {
            $query = "INSERT INTO TICKETTEMP (ID, NAME, PRICESELL, USUARIO) SELECT ID, NAME, PRICESELL3, '".$_SESSION['usuario']."' FROM PRODUCTS2 WHERE ID='".$_POST['agregarProducto']."'";
          }
    
    if(!empty($_POST['cantidad']))
    {
        for($i=1; $i<= (int)$_POST['cantidad']; $i++)
        {
            
            $result_tasks = mysqli_query($conn, $query);    
            mysqli_fetch_assoc($result_tasks);
        }
    }  
    else
    {
        $result_tasks = mysqli_query($conn, $query);    
        mysqli_fetch_assoc($result_tasks);
    }
    header('Location: pos.php');
}
if (isset($_POST['eliminar'])) {
    $query = "DELETE FROM TICKETTEMP WHERE ID='".$_POST['eliminarProducto']."' AND USUARIO='".$_SESSION['usuario']."'";
    $result_tasks = mysqli_query($conn, $query);    
    mysqli_fetch_assoc($result_tasks);
    header('Location: pos.php');
}
if (isset($_POST['vender'])) {
    
    $query = "INSERT INTO LINEAS(PRODUCT, PRICESELL, FECHA, USUARIO) SELECT ID, PRICESELL, NOW(), '".$_SESSION['usuario']."' FROM TICKETTEMP WHERE USUARIO='".$_SESSION['usuario']."'";
    $result_tasks = mysqli_query($conn, $query);    
    mysqli_fetch_assoc($result_tasks);
    $query = "DELETE FROM TICKETTEMP WHERE USUARIO='".$_SESSION['usuario']."'";
    $result_tasks = mysqli_query($conn, $query);    
    mysqli_fetch_assoc($result_tasks);
    header('Location: pos.php');
}
?>