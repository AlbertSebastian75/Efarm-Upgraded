<?php
    session_start();
  	unset($_SESSION['supplier_id']);
  	header('Location: ../index.php');
?>