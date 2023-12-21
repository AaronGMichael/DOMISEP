<?php
include_once('../layout/header.php');
include_once("../model/devicetype.php");
include_once("../components/proveAdmin.php");
$utils = new DbUtils();
$deviceTypes = DbUtils::getDeviceTypeByAdmin();
$utils = new DbUtils(); 
$sensorTypeList = DbUtils::getSensorTypes();
?>
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
                                <div class="form-group">
                                    <label for="name">State : </label>
                                    <select class="form-control" name="devicestate">
                                        <option class="form-control"  value=0>Off</option>
                                        <option class="form-control" value=1>On</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="name">Device Type : </label>
                                    <select class="form-control" name="devicetype">
                                        <option selected disabled class="form-control" align="center">Select Device Types</option>
                                        <?php
                                        foreach ($deviceTypes as $deviceType) { ?>
                                            <option value="<?php echo $deviceType->devicetypeid ?>"><?php echo $deviceType->name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px;">
                                    <label for="maxvalue">Value:</label>
                                    <input class="form-control" placeholder="Enter Value" type="number" step="0.1" name="devicevalue" required>
                                </div>
                                <input style="display: none;" name="roomID" value="<?php echo $_GET['id'] ?>">
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
<?php
include('../layout/footer.php');
?>