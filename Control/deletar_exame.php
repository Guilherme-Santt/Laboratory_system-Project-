<?php
if(!isset($_SESSION)){
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("location: ../views/index_login.php");
    }    
}
include('../views/conexao.php');
$id = intval($_GET['id']);
$sql_code = "DELETE FROM exames WHERE exameid = '$id'";
$query_code = $mysqli->query($sql_code);
    if($query_code) 
        header("location: ../views/listagem_exames.php");
?>


