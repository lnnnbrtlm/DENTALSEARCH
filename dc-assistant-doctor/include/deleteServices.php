<?php
session_start();
include 'connection.php';
include 'function.php';

//====================DELETE SERVICES======================================
if (isset($_POST['deletesubmit'])){
  $status = inactiveService($_POST['deleteService']);
  }
?>