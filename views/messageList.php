<?php
include_once('../layout/header.php');
$utils = new DbUtils();
$messages = DbUtils::getMessagesByAdmin();
?>
<div class="container">
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
                                <h1 style="font-size: 30pt; font-weight: bold; margin-left:0px;">Messages</h1>
                            </sd>
                        </div>
                    <hr>
                    <?php if(isset($messages[0]))foreach($messages as $message){ ?>
                        <div class="container" style="font-size: 20px;">
                            <div class="row justify-content-center">
                                <div class="col-lg-1">
                                    <?php echo $message->messageid ?>
                                </div>
                                <div class="col-lg-1">
                                    <?php echo $message->email ?>
                                </div>
                                <div class="col-lg-1">
                                    <?php echo $message->name ?>
                                </div>
                                
                                <div class="col-lg-8">
                                    <?php echo $message->text ?>
                                </div>
                            </div>
                        </div>
                        <hr>
              <?php } 
              else { ?>
                <div style='text-align: center; margin-top: 30px; font-size: 20pt;'> Nothing to Show! </div>
              <?php } ?>







            </h2>
            <div class="additional-padding-medium"></div>
            <div class="row align-items-center">

                <div class="additional-padding-medium"></div>
            </div>
            <div class="additional-padding"></div>
        </div>
	</div>
    <?php
include('../layout/footer.php');
?>