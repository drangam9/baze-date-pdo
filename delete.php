<?php
require_once ("dbConnection.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "CALL DeleteUser($id)");

header('Location: tables.php');
