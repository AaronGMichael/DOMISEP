<?php 
include_once('../layout/header.php');
$utils = new DbUtils();
$devices = DbUtils::getDeviceByAdmin($_GET["id"]);
$sensors = DbUtils::getSensorByAdmin($_GET["id"]);
$roomName = DbUtils::getRoomName($_GET["id"]);
?>

            <div class="basic-container">
                <h1  style="font-size: 30pt"><b><?php echo $roomName?></b></h1>
                <h2>Now you have entered the room page. Here you can see all the devices and sensors and menage them.</h2>
                <div class="additional-padding-small"></div>
                
                <h1>Sensors</h1>

                <ul class="cards_grid">
                <?php if(isset($sensors[0])) foreach($sensors as $sensor){ ?>
                    <?php $sensortype = DbUtils::getSensorType($sensor->sensortypeid); ?>
                    <li class="cards_item_grid">
                        <div class="card_grid">
                            <div class="card_image_container_grid">
                                <div class="card_image_grid"><img src="<?php echo $sensortype->photo; ?>"></div>
                            </div>
                            <div class="card_content_grid">
                                <h2 class="card_title_grid"><?php echo $sensortype->name?></h2>
                                <h2 class="card_title_grid"><?php echo $sensor->name?></h2>
                                <?php $mesurement = DbUtils::getLatestMesurement($sensor->sensorid); ?>
                                <h2 class="card_text_grid">Value: <b><?php 
                                        if($mesurement == NULL) echo "No data";
                                        else echo $mesurement->value . "" . $sensortype->unit;?></b></h2>
                            <a href="viewchart.php?id=<?php echo $sensor->sensorid?>">
                                <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                            </a>
                            </div>
                        </div>
                    </li>
                    <?php } else if(!$user->isAdmin())echo "Not connected to any Sensors"; ?>
                    <?php if($user->isAdmin()) {
                        $link = "sensor";
                        include '../components/addRoomModule.php'; }
                        unset($link);
                    ?>

                </ul>

                <div class="additional-padding-small"></div>

                <h1>Devices</h1>
                <ul class="cards_grid">
                <?php if(isset($devices[0])) foreach($devices as $device){ ?>
                     <?php $devicetype = DbUtils::getDeviceType($device->devicetypeid); ?>
                    <li class="cards_item_grid">
                        <div class="card_grid">
                            <div class="card_image_container_grid">
                            <div class="card_image_grid"><img src="<?php echo $devicetype->photo; ?>"></div>
                            </div>
                            <div class="card_content_grid">
                                <h2 class="card_title_grid"><?php echo strlen($devicetype->name)>13 ? $devicetype->name : $devicetype->name."<br><br>" ?></h2>
                                <h2 class="card_title_grid"><?php echo $device->name ?></h2>
                                <h2 class="card_text_grid"><b><?php echo $device->getState()?></b></h2>
                                <div class="checkbox-container">
                                    <link
                                        rel="stylesheet"
                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
                                    />
                                    <input type="checkbox"<?php echo $device->getState() === 'ON'? "checked" :''?>/>
                                </div>
                            <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                            </div>
                        </div>
                    </li>
                    <?php } else if(!$user->isAdmin())echo "Not connected to any Devices"; ?>
                    <?php if($user->isAdmin()) {
                        $link = "Device";
                        include '../components/addRoomModule.php'; }
                        unset($link);
                    ?>
                </ul>
                <div class="additional-padding-small"></div>

            </div>
        </div>
    </div>
</div>

<?php
include('../layout/footer.php');
?>