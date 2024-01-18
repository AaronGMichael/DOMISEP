<?php
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
                    <div class="row align-items-center">
                        <div class="col">
                            <sd style="text-align: left;">
                                <h1>Profile</h1>
                            </sd>
                        </div>
                        <div class="col">
                            <sd style="text-align: right;">
                            <div class="form-group">
                                <a href="addPersonToApartment.php"><button type="submit" name="sendHelp" class="button-submit-profile">Add Person</button></a>
                                <a href="../assets/guide/usermanual.pdf" target="_blank" rel="noreferrer noopener" download><button type="submit" name="downloadManual" class="button-submit-profile"><i class="fa-solid fa-download"> </i> User Manual</button></a>
                                <?php if($user->isAdmin()) {echo '
                                    <a href="addsensortype.php"><button type="submit" name="type_sensor" class="button-submit-profile">Add Sensor Type</button></a>
                                    <a href="adddevicetype.php"><button type="submit" name="type_device" class="button-submit-profile">Add Device Type</button></a>
                                    <a href="messageList.php"><button type="submit" name="type_device" class="button-submit-profile">Check messages</button></a>
                                ';}
                                else {
                                    echo '
                                    <a href="sendHelp.php"><button type="submit" name="sendHelp" class="button-submit-profile">Request Help</button></a>
                                ';
                                } ?>
                            </div>
                            </sd>
                        </div>
            <h2>
                This is the information we have about you!
            </h2>
            <div class="additional-padding-medium"></div>
            <div class="row align-items-center">
                <div class="col" style = "width: 300px;">
                    <img src="../assets/man.png" style = "width: 100%; height:auto;">
                </div>
                <div class="col">
                    <sd style="text-align: left;">
                        <div class="form-group">
                            <label for="name">User ID:</label>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail Adress:</label>
                        </div>
                    </sd>
                </div>
                <div class="col">
                    <sd style="text-align: right;">
                        <div class="form-group">
                            <label><?php echo $user->id; ?></label>
                        </div>
                        <div class="form-group">
                            <label><?php echo $user->username; ?></label>
                        </div>
                        <div class="form-group">
                            <label><?php echo $user->firstName; ?></label>
                        </div>
                        <div class="form-group">
                            <label><?php echo $user->name; ?></label>
                        </div>
                        <div class="form-group">
                            <label><?php echo $user->email; ?></label>
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
