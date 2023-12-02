<?php 
include_once('../layout/header.php');
?>

            <div class="basic-container">
                <h1  style="font-size: 30pt"><b>Name of the Room</b></h1>
                <h2>Now you have entered the room page. Here you can see all the devices and sensors and menage them.</h2>
                <div class="additional-padding-small"></div>
                
                <h1>Sensors</h1>

                <ul class="cards_grid">
                    <li class="cards_item_grid">
                        <div class="card_grid">
                            <div class="card_image_container_grid">
                                <div class="card_image_grid"><img src="../assets/sensors/humidity.png"></div>
                            </div>
                            <div class="card_content_grid">
                                <h2 class="card_title_grid">Humidity</h2>
                                <h2 class="card_text_grid">Value: <b>56%</b></h2>
                                <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                            </div>
                        </div>
                    </li>
                    <li class="cards_item_grid">
                        <div class="card_grid">
                            <div class="card_image_container_grid">
                                <div class="card_image_grid"><img src="../assets/sensors/temperature.png"></div>
                            </div>
                            <div class="card_content_grid">
                                <h2 class="card_title_grid">Thermometer</h2>
                                <h2 class="card_text_grid">Value: <b>21.4°C</b></h2>
                                <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                            </div>
                        </div>
                    </li> 
                    <li class="cards_item_grid">
                        <div class="card_grid">
                            <div class="card_image_container_grid">
                                <div class="card_image_grid"><img src="../assets/sensors/fire-sensor.png"></div>
                            </div>
                            <div class="card_content_grid">
                                <h2 class="card_title_grid">Smoke Sensor</h2>
                                <h2 class="card_text_grid"><b>Safe</b></h2>
                                <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                            </div>
                        </div>
                    </li>
                    <?php if($user->isAdmin()) readfile('../components/addSensor.html'); ?>

                </ul>

                <div class="additional-padding-small"></div>

                <h1>Devices</h1>
                <ul class="cards_grid">
                    <li class="cards_item_grid">
                        <div class="card_grid">
                            <div class="card_image_container_grid">
                            <div class="card_image_grid"><img src="../assets/devices/air-purifier.png"></div>
                            </div>
                            <div class="card_content_grid">
                                <h2 class="card_title_grid">Air-Purifier</h2>
                                <h2 class="card_text_grid"><b>OFF</b></h2>
                                <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                            </div>
                        </div>
                    </li>
                    <li class="cards_item_grid">
                        <div class="card_grid">
                            <div class="card_image_container_grid">
                            <div class="card_image_grid"><img src="../assets/devices/desk-lamp.png"></div>
                            </div>
                            <div class="card_content_grid">
                                <h2 class="card_title_grid">Desk Lamp</h2>
                                <h2 class="card_text_grid"><b>ON</b></h2>
                                <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                            </div>
                        </div>
                    </li>
                    <li class="cards_item_grid">
                        <div class="card_grid">
                            <div class="card_image_container_grid">
                            <div class="card_image_grid"><img src="../assets/devices/light-bulb.png"></div>
                            </div>
                            <div class="card_content_grid">
                                <h2 class="card_title_grid">Light</h2>
                                <h2 class="card_text_grid"><b>ON</b></h2>
                                <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                            </div>
                        </div>
                    </li>
                    <li class="cards_item_grid">
                        <div class="card_grid">
                            <div class="card_image_container_grid">
                            <div class="card_image_grid"><img src="../assets/devices/window.png"></div>
                            </div>
                            <div class="card_content_grid">
                                <h2 class="card_title_grid">Window</h2>
                                <h2 class="card_text_grid"><b>Closed</b></h2>
                                <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                            </div>
                        </div>
                    </li>
                    <?php if($user->isAdmin())readfile('../components/addDevice.html'); ?>
                </ul>
                <div class="additional-padding-small"></div>

            </div>
        </div>
    </div>
</div>

<?php
include('../layout/footer.php');
?>