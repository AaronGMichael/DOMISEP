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
include_once('../layout/header.php');
?>
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
	</div>
    <?php
include('../layout/footer.php');
?>