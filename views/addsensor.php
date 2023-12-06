<?php
include_once("../layout/header.php");
include_once("../components/proveAdmin.php");
?>

    <div class="background-login-light"></div>
            <section>
                <div class="container mt-5 pt-5">
                    <div class="row">
                        <div class="col-9 col-sm-7 col-md-6 m-auto">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16" style = "margin-left: 45%;">
                                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z"/>
                                </svg>
                                    <h1 class="text-center">Add Sensor</h1>
                                    <form method="POST" action="../utils/addUser.php">
                                        <fieldset>
                                            <div class="form-group" style = "margin-bottom: 10px;">
                                                <label for="sensortype">SensorType:</label>
                                                <select class = "form-control" placeholder="Sensortype" type = "name" name = "sensortype" required>
                                                    <option value = "" disabled selected>Select from Options</option>
                                                    <option value="y">Heat</option>
                                                    <option value="x">Humidity</option>
                                                </select>
                                            </div>
                                            <div class="form-group" style = "margin-bottom: 10px;">
                                                <label for="name">Name:</label>
                                                <input class="form-control" placeholder="Enter Name" type="name" name="name" required>
                                            </div>
                                            <div class="form-group" style = "margin-bottom: 10px;">
                                                <label for="minvalue" >Minimal Value:</label>
                                                <input class="form-control" placeholder="Enter Minvalue" type="name" name="minvalue" required>
                                            </div>
                                            <div class="form-group" style = "margin-bottom: 10px;">
                                                <label for="maxvalue">Maximal Value:</label>
                                                <input class="form-control" placeholder="Enter Maxvalue" type="name" name="maxvalue" required>
                                            </div>

                                            <button type="submit" name="register" class="button-submit btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Add</button>
                                        </fieldset>
                                    </form>
                                </div>

                    </div>
                </div>
            </section>

<?php
include_once("../layout/footer.php");
?>