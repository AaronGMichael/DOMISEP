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
            <div class="additional-padding-medium"></div>
            <div class="row align-items-center">
                <div class="col">
                    <svg class="center-svg" xmlns="http://www.w3.org/2000/svg" align=center width="250" height="250" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <div class="col">
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
                </div>
                <div class="additional-padding-medium"></div>
            </div>
                <div class="additional-padding"></div>
        </div>
	</div>
    <?php
include('../layout/footer.php');
?>