<?php
include_once('../layout/header.php');
$utils = new DbUtils();
$currentId =  $user->isAdmin()? $_GET["id"] : DbUtils::getApartmentByUser($user->id)->getId();
$people = DbUtils::getPersonDetailsInApartment($currentId);
?>
<div class="container">
    <link rel="stylesheet" href="../css/style-message.css">
<?php
		    	if(isset($_SESSION['messageLoggedIN'])){
		    		?>
		    			<div class="alert alert-info text-center">
					        <?php echo $_SESSION['messageL oggedIN']; ?>
					    </div>
		    		<?php
 
		    		unset($_SESSION['messageLoggedIN']);
		    	}
		    ?>
                <div class="basic-container">
                    <div class="row align-items-center">
                            <sd style="text-align: left;">
                                <h1 style="font-size: 30pt; font-weight: bold; margin-left:0px;">People</h1>
                            </sd>
                        </div>
                    <hr>
                    <div class="container" style="font-size: 20px;">
                        <div><b>Main User:</b></div>
                        <?php $firstPerson = array_shift($people)?>
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <?php echo $firstPerson["name"] ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $firstPerson["firstName"] ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $firstPerson["username"] ?>
                                </div>
                                
                                <div class="col-lg-3">
                                    <?php echo $firstPerson["email"] ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="container" style="font-size: 20px;">
                        <div><b>Other Residents:</b></div>
                    <?php foreach($people as $person){ 
                        // var_dump($person);
                        ?>
                        <div class="row justify-content-center">
                                <div class="col-lg-4">
                                    <?php echo $person["name"] ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php echo $person["firstName"] ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php echo $person["email"] ?>
                                </div>
                            </div>
              <?php } ?>
              <hr>
                        </div>
            </div>
        </div>
	</div>
    <script src="../js/clearMessage.js">
    </script>
    <?php
include('../layout/footer.php');
?>