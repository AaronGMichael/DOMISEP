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
                                        <img src="../assets/icons/add-building.svg"></img>
                                    </div>
                                    <h1 class="text-center">Add Building</h1>
                                    <form method="POST" action="../utils/addBuilding.php">
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="name">Building Name : </label>
                                                <input class="form-control" placeholder="Building name" type="text" name="name" autofocus required>
                                            </div>
                                            <div class="form-group">
                                                <label for="size">Size : </label>
                                                <input class="form-control" placeholder="Size" type="number" step="0.01" name="size" autofocus required>
                                            </div>
                                            <div class="form-group">
                                                <label for="UploadPhoto">Photo Upload : </label>
                                                <!-- <input class="form-control" placeholder="Select Photo" type="file" name="photo" required> -->
                                                <input class="form-control" placeholder="Select Photo" type="string" name="photo">
                                            </div>
                                            <div class="form-group">
                                                <label for="Address">Address : </label>
                                                <input class="form-control"  placeholder="Enter Building Address" type="text" name="address" required>
                                            </div>
                                            <button type="submit" name="building" class="btn-primary mt-4 button-submit btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span>Add</button>
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