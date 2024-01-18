x<?php
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
                            <sd style="text-align: left;">
                                <h1 style="font-size: 30pt; font-weight: bold; margin-left:0px;">Messages</h1>
                            </sd>
                        </div>
            <h2 style="    text-align: left;
                margin-left: 2%;
                font-size: 24pt;
                padding-top: 0px;
                padding-bottom: 20px;
                margin-bottom: -10px;
                color: #000;">
                    Welcome to the Messages Page, where you can view and interact with messages from users. It is better not to ignore their asks.
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