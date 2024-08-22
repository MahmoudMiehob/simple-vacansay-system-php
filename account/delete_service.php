<?php 
ob_start();
include '../database/dbconnect.php';
session_start();


$service_id = $_POST["service_id"];

$stmt = $conn->prepare("DELETE FROM services WHERE id = ?");
$stmt->bind_param("i", $service_id);
$stmt->execute();

header("Location: servieces.php");
?>
