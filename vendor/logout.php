<?php

    session_start();
  	unset($_SESSION['vendorid']);
  	unset($_SESSION['fullname']);
  	header('Location: ../index.php');

?>