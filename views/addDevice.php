<?php
include_once('../layout/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device</title>
</head>

<body>
    <div class="background-login-light"></div>
    <section>
        <div class="container mt-1 pt-1">
            <div class="row">
                <div class="col-9 col-sm-7 col-md-6 m-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <!-- <h1 class="text-center">DomISEP</h1> -->
                            <form method="POST" action="../utils/addDevice.php">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="name">Device Name : </label>
                                        <input class="form-control" placeholder="Device name" type="text" name="devicename" autofocus required>
                                    </div>
                                    <button type="submit" name="addbtn" class="btn-primary mt-4 button-submit btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span>Add</button>
                                </fieldset>
                            </form>
                            <!-- <a type="button" class="button-unvisible" href="../index.php">You have an account? Login here</a> -->
                        </div>
                    </div>
                    <h6 class="text-white mt-3">© 2023 WebWizards</span>
                </div>
            </div>
            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <div class="alert alert-info text-center">
                    <?php echo $_SESSION['message']; ?>
                </div>
            <?php

                unset($_SESSION['message']);
            }
            ?>
        </div>
    </section>
    </div>
</body>

</html>
<?php
include('../layout/footer.php');
?>