<?php
	//start session
	session_start();
 
	//redirect if logged in
	if(isset($_SESSION['user'])){
        $_SESSION['messageLoggedIN'] = "You're already logged in!";
		header('location:./views/home.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOMISEP - Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./css/style-login.css">
    <link rel="stylesheet" type="text/css" href="./css/style-text.css">
    <link rel="stylesheet" type="text/css" href="./css/style-containers.css">
    <link rel="stylesheet" type="text/css" href="./css/style-buttons.css">
    <link rel="stylesheet" type="text/css" href="./css/style-background.css">
</head>
<body>
<div class="container">
<?php
		    	if(isset($_SESSION['AccountCreated'])){
		    		?>
		    			<div class="alert alert-info text-center">
					        <?php echo $_SESSION['AccountCreated']; ?>
					    </div>
		    		<?php
 
		    		unset($_SESSION['AccountCreated']);
		    	}
		    ?>
	    <div class="background-image-login"></div>
    <div class="additional-padding"></div>
    <div class="login-container">
       
        <h4>DomISEP</h4>
        <h3>Nice to see you again!</h3>
        <?php
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div class="alert alert-danger text-center">
					        <?php echo $_SESSION['message']; ?>
					    </div>
		    		<?php
 
		    		unset($_SESSION['message']);
		    	}
		    ?>
        <form action="./utils/login.php" method="POST">
            <fieldset>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" placeholder="Username" type="text" name="username" autofocus required>                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>

            </fieldset>
            <a type="button" class="button-unvisible-top no-underline-hover" href="./views/register.php">You don't have an account? Register here</a>
            <button type="button" class="button-unvisible">Forgot the password?</button>
        </form>

        <footer>Powered by <b>WebWizards</b></footer>
    
    </div>
		    
		</div>
	</div>
</div>
            </body>
            </html>
