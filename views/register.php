<?php
include_once("../layout/header.php");
include_once("../components/proveAdmin.php");
?>

    <div class="background-login-light"></div>
            <section>
                <div class="container mt-5 pt-5" >
                    <div class="row" style = "margin-top: -30px;" >
                        <div class="col-9 col-sm-7 col-md-6 m-auto">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <div style="display: flex; align-items: center; justify-content: center;">
                                        <img src="../assets/icons/user.png" style="height:5em;"></img>
                                    </div>
                                    <h1 class="text-center">Add Account</h1>
                                    <form method="POST" action="../utils/addUser.php">
									<fieldset>
										<div class="form-group">
											<label for="username">Username:</label>
											<input class="form-control" placeholder="Username" type="text" name="username" autofocus required>
										</div>
										<div class="form-group">
											<label for="password">Password:</label>

											<input class="form-control" placeholder="Password" type="password" name="password" required>
										</div>
										<div class="form-group">
											<label for="email">E-mail Adress:</label>
											<input class="form-control" placeholder="Email" type="name" name="email" required>
										</div>
										<div class="form-group">
											<label for="name">Last Name:</label>
											<input class="form-control" placeholder="Name" type="name" name="name" required>
										</div>
										<div class="form-group">
											<label for="firstname">First Name:</label>
											<input class="form-control" placeholder="Firstname" type="name" name="firstname" required>
										</div>
										<div class="form-group">
											<label for="accessrights">Access Rights:</label>
											<select class = "form-control" placeholder="Accessrights" type = "name" name = "accessrights" required>
												<option value = "" disabled selected>Select</option>
												<option value="101">User</option>
												<option value="100">Admin</option>
												<option value="99">Owner</option>
											</select>
										</div>
										<button type="submit" name="register" class="button-submit btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Register</button>
									</fieldset>
								</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php
include_once("../layout/footer.php");
?>