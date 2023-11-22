<?php
	//start session
	session_start();
 
	//redirect if logged in
	if(isset($_SESSION['user'])){
        $_SESSION['messageLoggedIN'] = "You're already logged in!";
		header('location:./views/profile.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOMISEP - Login</title>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="./css/style-login.css">
    <link rel="stylesheet" type="text/css" href="./css/style-text.css">
    <link rel="stylesheet" type="text/css" href="./css/style-containers.css">
    <link rel="stylesheet" type="text/css" href="./css/style-buttons.css">
    <link rel="stylesheet" type="text/css" href="./css/style-backgrounds.css">
</head>
<style>
    a:hover {
      text-decoration: none;
    }
</style>
<body>
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
        <div class="background-login-light"></div>
        <section>
            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-9 col-sm-7 col-md-6 m-auto">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                <h1 class="text-center">DomISEP</h1>
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
                                        <button type="submit" name="login" class="button-submit"> Login</button>

                                    </fieldset>
                                    <a type="button" class="button-unvisible" href="./views/register.php">You don't have an account? Register here</a>
                                    <a type="button" class="button-unvisible" href="#">Forgot the password?</button>
                                </form>
                            </div>
                        </div>
                        <h6 class="text-white">© 2023 WebWizards</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
