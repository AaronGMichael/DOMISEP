<?php
include_once("../layout/header.php");
include_once("../components/proveAdmin.php");
$utils = new DbUtils();
$userList = DbUtils::getUserIDs();
?>

    <div class="background-login-light"></div>
            <section>
                <div class="container mt-5 pt-5" >
                    <div class="row" style = "margin-top: -30px;" >
                        <div class="col-9 col-sm-7 col-md-6 m-auto">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <div style="display: flex; align-items: center; justify-content: center;">
                                        <img src="../assets/icons/add-apartment.svg"></img>
                                    </div>
                                    <h1 class="text-center">Add Apartment</h1>
                                    <form method="POST" action="../utils/addApartment.php">
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="name">Apartment Name : </label>
                                                <input class="form-control" placeholder="Appartment name" type="text" name="apartmentname" autofocus required>
                                            </div>
                                            <div class="form-group">
                                                <label for="UploadPhoto">Photo Upload : </label>
                                                <input class="form-control" placeholder="Select Photo" type="file" name="apartmentphoto">
                                            </div>
                                            <div class="form-group">
                                                <label for="Address">Apartment Number: </label>
                                                <input class="form-control"  placeholder="Enter Apartment Number" type="number" name="number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Address">Number Of People: </label>
                                                <input class="form-control"  placeholder="Enter Number Of People" type="number" name="numberofpeople" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="sensortype">User Account:</label>
                                                <select class = "form-control" placeholder="Sensortype" type = "name" name = "userID" required>
                                                    <option value = "" disabled selected>Select from Options</option>
                                                    <?php foreach($userList as $theUser){ ?>
                                                        <option value="<?php echo $theUser["id"] ?>"><?php echo $theUser["name"]?> / <?php echo $theUser["username"]?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <input style="display: none;" name="buildingID" value="<?php echo $_GET['id']?>">
                                            <button type="submit" name="register" class="btn-primary mt-4 button-submit btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span>Add</button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <h6 class="text-white">© 2023 WebWizards</span>
                        </div>
                    </div>
                </div>
            </section>

<?php
include_once("../layout/footer.php");
?>