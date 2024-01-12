<?php
session_start();
$first_name = $_POST['name'];
$last_name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone'];
$address = $_POST['address'];
include_once '../../connect/open.php';

$sql = "INSERT INTO customers(first_name, last_name, email, password, phone_number, address) VALUES 
            ('$first_name', '$last_name', '$email', '$password', '$phone_number', '$address')";
mysqli_query($connect, $sql);
include_once '../../connect/close.php';
$_SESSION['ad-create'] = 1;
header('Location: index.php');