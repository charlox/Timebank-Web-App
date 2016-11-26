<?php
session_start();
unset($_SESSION['memsearchcriteria']);
header('location:dash.php');

?>