<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:../index.php');
}
 
include_once('../utils/User.php');
 
$user = new User();
 
//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);
 
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Login using OOP Approach</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOMISEP - profile</title>
    <link rel="stylesheet" type="text/css" href="../css/style-top-navigation.css">    
    <link rel="stylesheet" type="text/css" href="../css/style-text.css">
    <link rel="stylesheet" type="text/css" href="../css/style-background.css">
    <link rel="stylesheet" type="text/css" href="../css/style-containers.css">
    <link rel="stylesheet" type="text/css" href="../css/style-grid-layout.css">
    <link rel="stylesheet" type="text/css" href="../css/style-buttons.css">
</head>
<body>
	<div class="background-image"></div>
        <header class="header">
            <a class="logo"><titlesmaller>DomISEP</titlesmaller></a>
            <ul class="navbar">
                <a href="home.html">Home</a>
                <a href="profile.html">Profile</a>
                <a href="settings.html">Settings</a>
                <a href="../utils/logout.php">Logout</a>
                <a></a>
            </ul>
        </header>
<div class="container">
<?php
		    	if(isset($_SESSION['messageLoggedIN'])){
		    		?>
		    			<div class="alert alert-info text-center">
					        <?php echo $_SESSION['messageLoggedIN']; ?>
					    </div>
		    		<?php
 
		    		unset($_SESSION['messageLoggedIN']);
		    	}
		    ?>
	<div class="additional-padding-big"></div>
        <div class="basic-container">
            <div class="additional-padding-little"></div>
            <h1>Profile</h1>
            <h2>
                Here we can provide you with all the informations we store about you. You can change almost everything, 
                besides name and surname. We hope that you will not get angry because of that...
            </h2>
                <sd>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <label><?php echo $row['fname']; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <label><?php echo $row['username']; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Password:</label>
                        <label><?php echo $row['password']; ?></label>
                    </div>
                </sd>
                <div class="additional-padding"></div>
        </div>
		<footer>Powered by <b>WebWizards</b></footer>
	</div>
</body>
</html>