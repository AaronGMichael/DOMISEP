<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user'])){
	header('location:../index.php');
}


 
include_once('../utils/DbUtils.php');
//fetch user data
$user = serialize($_SESSION['user']);
$user = unserialize($user);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title>DOMISEP</title>
    <link rel="stylesheet" type="text/css" href="../css/style-top-navigation.css">    
    <link rel="stylesheet" type="text/css" href="../css/style-text.css">
    <link rel="stylesheet" type="text/css" href="../css/style-background.css">
    <link rel="stylesheet" type="text/css" href="../css/style-buttons.css">
    <link rel="stylesheet" type="text/css" href="../css/style-containers.css">
    <link rel="stylesheet" type="text/css" href="../css/style-layout.css">
    <link rel="stylesheet" type="text/css" href="../css/style-assets.css">
</head>
<style>
    a{
        text-decoration: none;
    }
    a:hover {
      text-decoration: none;
    }
</style>
<body>
    <header class="header-left">   
        <titlesmaller>DomISEP</titlesmaller>       
    </header>
    <header class="header">
        <ul class="navbar">
            <div class="container-nav">
                <b>
                <a href="../views/home.php">Home</a>
                <a href="../views/profile.php">Profile</a>
                <a href="../utils/logout.php">Logout</a>
                <?php 
                $page = $_SERVER['REQUEST_URI'];
                if($user->isAdmin() && str_contains($page, "home")) echo "<a class='add' href='../utils/logout.php'>Add Building<img style='width:10px; height: 10px;' href='../assets/icons/plus-circle.svg'/></a>"
                
                ?>
                </b>
            </div>
        </ul>
    </header>
    <div class="additional-padding-big"></div>
    <div class="additional-padding-small"></div>
