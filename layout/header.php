<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user'])){
	header('location:../index.php');
}

include('../utils/DbUtils.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/> 
    <link rel="stylesheet" type="text/css" href="../css/style-text.css">
    <link rel="stylesheet" type="text/css" href="../css/style-backgrounds.css">
    <link rel="stylesheet" type="text/css" href="../css/style-buttons.css">
    <link rel="stylesheet" type="text/css" href="../css/style-containers.css">
    <link rel="stylesheet" type="text/css" href="../css/style-layout.css">
    <link rel="stylesheet" type="text/css" href="../css/style-forms.css">
    <link rel="stylesheet" type="text/css" href="../css/new_style.css">
</head>
<style>
    a {
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
                <?php 
                $page = $_SERVER['REQUEST_URI'];
                $currentId =isset($_GET['id'])? $_GET["id"]:0;
                if($user->isAdmin() && str_contains($page, "home")) echo "<a class='add' href='../views/addbuilding.php'><img style='width:22px; height: 22px; margin-top: -5px;' src='../assets/icons/add-button.svg'/></a>";
                if($user->isAdmin() && str_contains($page, "building")) echo "<a class='add' href='../views/addapartment.php?id=$currentId'><img style='width:22px; height: 22px; margin-top: -5px;' src='../assets/icons/add-button.svg'/></a>";
                if($user->isAdmin() && str_contains($page, "apartment")) echo "<a class='add' href='../views/addroom.php?id=$currentId'><img style='width:22px; height: 22px; margin-top: -5px;' src='../assets/icons/add-button.svg'/></a>";
                if($user->isAdmin() && str_contains($page, "profile")) echo "<a class='add' href='../views/register.php'><img style='width:22px; height: 22px; margin-top: -5px;' src='../assets/icons/add-button.svg'/></a>";
                ?>
                <a href=<?php echo $user->isAdmin() ? "../views/home.php": "../views/apartment.php"?>><img style='width:28px; height: 28px; margin-top: -5px;' src='../assets/icons/home1.svg'/></a>
                <a href="../views/profile.php"><img style='width:22px; height: 22px; margin-top: -5px;' src='../assets/icons/profile.svg'/></a>
                <?php if($user->isAdmin()) echo "<a class='add' href='../views/messageList.php'><img style='width:22px; height: 22px; margin-top: -5px;' src='../assets/icons/message.svg'/></a>" ?>
                <a href="../utils/logout.php"><img style='width:22px; height: 22px; margin-top: -5px;' src='../assets/icons/log-out.png'></a>
                </b>
            </div>
        </ul>
    </header>
    <div class="additional-padding-big">
    <?php
                                    if(isset($_SESSION['message'])){
                                        ?>
                                            <div id='alertBanner' class="alert alert-danger text-cen                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ter">
                                                <?php echo $_SESSION['message']; ?>
                                            </div>
                                        <?php
                    
                                        unset($_SESSION['message']);
                                    }
                                    if(isset($_SESSION['welcome'])){
                                        ?>
                                            <div id='alertBanner' class="alert alert-success text-center">
                                                <?php echo $_SESSION['welcome']; ?>
                                            </div>
                                        <?php
                    
                                        unset($_SESSION['welcome']);
                                    }
                                    if(isset($_SESSION['AccountCreated'])){
                                        ?>
                                            <div id='alertBanner' class="alert alert-success text-center">
                                                <?php echo $_SESSION['AccountCreated']; ?>
                                            </div>
                                        <?php
                    
                                        unset($_SESSION['AccountCreated']);
                                    }
                                    
                                ?>
    </div>
    <!-- <div class="additional-padding-small"></div> -->
