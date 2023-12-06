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
                                        <img src="../assets/icons/add-device.svg" style="" ></img>
                                    </div>
                                    <h1 class="text-center">Add DeviceType</h1>
                                    <form method="POST" action="../utils/addUser.php">
                                        <fieldset>
                                            <div class="form-group" style = "margin-bottom: 10px;">
                                                <label for="sensortype">DeviceType:</label>
                                                <select class = "form-control" placeholder="Devicetype" type = "name" name = "devicetype" required>
                                                    <option value = "" disabled selected>Select from Options</option>
                                                    <option value="air-purifier / on-off">Air-Purifier / On-Off</option>
                                                    <option value="desk-lamp / on-off">Desk-Lamp / On-Off</option>
                                                    <option value="light / on-off">Light / On-Off</option>
                                                    <option value="window / closed-open">Window / Closed-Open</option>

                                                </select>
                                            </div>
                                            <button type="submit" name="register" class="button-submit btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Add</button>
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