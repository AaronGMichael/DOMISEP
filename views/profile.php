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
                        <div class="col-lg-3">
                            <sd style="text-align: left;">
                                <h1 style="font-size: 30pt; font-weight: bold">Profile</h1>
                            </sd>
                        </div>
                        <div class="col-lg-9">
                            <sd style="text-align: right;">
                            <div class="form-group">
                            <?php if($user->isAdmin()) {echo '
                                    <a href="addsensortype.php"><button type="submit" name="type_sensor" class="button-submit-profile-reversed">Add Sensor Type</button></a>
                                    <a href="adddevicetype.php"><button type="submit" name="type_device" class="button-submit-profile-reversed">Add Device Type</button></a>
                                ';}
                                else {
                                    echo '
                                    <a href="sendHelp.php"><button type="submit" name="sendHelp" class="button-submit-profile">Request Help</button></a>
                                ';
                                } ?>
                                <a href="addPersonToApartment.php"><button type="submit" name="sendHelp" class="button-submit-profile-reversed">Add Person</button></a>
                                <a href="<?php echo $user->isUser() ? "../assets/guide/UsermanualUsers.pdf": "../assets/guide/adminmanual.pdf"?>" target="_blank" rel="noreferrer noopener" download><button type="submit" name="downloadManual" class="button-submit-profile-reversed" onclick="return download()"><i class="fa-solid fa-download"> </i> User Manual</button></a>

                            </div>
                            </sd>
                        </div>
            <h2 style="    text-align: left;
                margin-left: 2%;
                font-size: 24pt;
                padding-top: 0px;
                padding-bottom: 20px;
                margin-bottom: -10px;
                color: #000;">
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
    <script src="../js/userManual.js"></script>
    <?php
include('../layout/footer.php');
?>
