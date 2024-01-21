<?php
include_once('../layout/header.php');
$utils = new DbUtils();
$messages = DbUtils::getMessagesByAdmin();
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
                                <h1 style="font-size: 30pt; font-weight: bold; margin-left:0px;">Messages</h1>
                            </sd>
                        </div>
                    <hr>
                    <?php if(isset($messages[0]))foreach($messages as $message){ 
                        $messageCode = "message".$message->messageid;
                        $messageInfo = json_encode($message);
                        ?>
                        <div class="message" id="<?php echo $messageCode?>">
                            <div class="message-top">
                                <div class="message-text">
                                    <?php echo $message->text ?>
                                </div>
                                <button onclick='dismissMessage("<?php echo $messageCode?>",<?php echo $messageInfo?>)'><i class="fa-solid fa-check"></i></button>
                            </div>
                            <hr>
                            <div class="message-details">
                                    <div><a href='mailto:<?php echo $message->email?>?subject=Reply to request #<?php echo $message->messageid ?>'><i class="fa-solid fa-reply"> </i> Reply</a></div>
                                    <div> Member: <?php echo $message->name ?></div>  
                                    <div> <a href="../views/apartment.php?id=<?php echo $message->apartmentid ?>" >Apartment: <?php echo $message->apartmentname ?></a></div>  
                                    <div> <?php echo date('d-M-Y H:i', strtotime($message->datetime)) ?></div>  
                            </div>
                        </div>
              <?php } 
              else { ?>
                <div style='text-align: center; margin-top: 30px; font-size: 20pt;'> Nothing to Show! </div>
              <?php } ?>
            </div>
        </div>
	</div>
    <script src="../js/clearMessage.js">
    </script>
    <?php
include('../layout/footer.php');
?>