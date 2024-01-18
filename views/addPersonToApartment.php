<?php
include_once("../layout/header.php");
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
                                    <h1 class="text-center">Add Person</h1>
                                    <form method="POST" action="../utils/addPerson.php">
									<fieldset>
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
										<?php if($user->isAdmin()) {?>
											<div class="form-check form-switch" style="padding-bottom: 5px;">
  												<input class="form-check-input" name="apartmentValue" type="checkbox" id="flexSwitchCheckChecked">
  												<label class="form-check-label" for="flexSwitchCheckChecked">Link Person to Apartment?</label>
											</div>
										<?php } else {?>
											<input name="apartmentLink" style="display:none;" value="<?php 
												$utils = new DbUtils();
												echo DbUtils::getApartmentByUser($user->id)->getId()?>">
										<?php } ?>
										<button type="submit" name="register" class="button-submit btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Register</button>
									</fieldset>
								</form>
                                </div>
                            </div>
                        </div>
                    </div>
					<h6 class="text-white" style="text-align: center; margin-top: 10px;">WebWizards © 2023</span>                        </div>
                </div>
            </section>
			<script src="../js/addApartmentListListener.js"></script>
