<?php
include('db.php');
if (isset($_POST['entrar'])) {
    $result = "SELECT CLAVE FROM USUARIOS WHERE NAME='".$_POST['usuarios']."'";
    $result_tasks = mysqli_query($conn, $result); 
    while($row = mysqli_fetch_assoc($result_tasks)) {
        if($row['CLAVE']==$_POST['clave'])
        {
            $_SESSION['usuario']=$_POST['usuarios'];
            header('Location: menu.php');
        }
        else { 
            header('Location: index.php');
        }
    }
}
?>