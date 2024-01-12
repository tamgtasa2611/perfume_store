<?php
session_start();
$id = $_POST['id'];
$first_name = $_POST['name'];
$last_name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone'];
$address = $_POST['address'];
include_once '../../connect/open.php';

$sql = "UPDATE customers SET first_name = '$first_name', last_name= '$last_name',email = '$email', password = '$password',
                     phone_number = '$phone_number', address = '$address'
                     WHERE id = '$id'";
mysqli_query($connect, $sql);
include_once '../../connect/close.php';
$_SESSION['ad-edit'] = 1;
header('Location: index.php');