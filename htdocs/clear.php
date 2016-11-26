<?php
session_start();
unset($_SESSION['searchcriteria']);
header('location:dash.php');

?>