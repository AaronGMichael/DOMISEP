<?php 
include_once('../layout/header.php');
$utils = new DbUtils();
$currentId =  $user->isAdmin()? $_GET["id"] : DbUtils::getApartmentByUser($user->id)->getId();
$rooms = DbUtils::getRoomByAdmin($currentId);
$apartmentName = DbUtils::getApartmentName($currentId);
$sumWater = DbUtils::sumUpWater($currentId);
$sumEle = DbUtils::sumUpElectricity($currentId);
$numberofpeople = DbUtils::getPeopleInApartment($currentId);
?>
          <div class="basic-container">
              <h1 style="font-size: 30pt"><b><?php echo $apartmentName?></b></h1>
              <?php include('../components/resourcesCards.php'); ?>
              <div class="additional-padding-small"></div>
              <h1>Choose a Room</h1>
              <h2>Which room do you want to manage?</h2>
              
              <!-- <ul class="cards"> -->
              <div class="d-flex flex-row flex-nowrap overflow-auto">
                <?php if(isset($rooms[0])) foreach($rooms as $room){ ?>
                    <?php $light = DbUtils::light($room->roomid);
                            $temp = DbUtils::temperature($room->roomid); 
                            $hum = DbUtils::humidity($room->roomid); 
                            $air = DbUtils::airCondition($room->roomid);
                             ?>
                  <li class="cards_item">
                      <div class="card" style="min-width: 300px;">
                          <div class="card_image_container">
                              <div class="card_image"><img src="<?php echo $room->photo; ?>"></div>
                          </div>
                          <div class="card_content">
                              <h1 class="card_title"><?php echo $room->name?></h1>

                              <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="card mb-1">
                                            <div class="card-body d-flex flex-column align-items-start">
                                                <h2 class="card-text  mb-0" style = "font-size: 12px;"><img src="../assets/resources/light.png" class="mr-2" style="max-width: 25px; margin-right: 5px;">
                                                    <b><?php echo str_contains($light,"ata") ? ' - ' :$light ?> </b>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card mb-1">
                                            <div class="card-body d-flex flex-column align-items-start">
                                                <h2 class="card-text small mb-0"><img src="../assets/resources/temperature.png" class="mr-2" style="max-width: 25px;">
                                                  <b><?php echo ($temp == null) ? " - " : $temp->value . "" . ((DbUtils::getSensorType1($temp->sensorid)->unit == "Celsius") ? "°C" : DbUtils::getSensorType1($temp->sensorid)->unit); ?></b>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card mb-1">
                                            <div class="card-body d-flex flex-column align-items-start">
                                                <h2 class="card-text small mb-0"><img src="../assets/resources/humidity.png" class="mr-2" style="max-width: 25px;">
                                                  <b><?php echo ($hum == null) ? " - " : $hum->value . ((DbUtils::getSensorType1($hum->sensorid)->unit == null) ? "%" : DbUtils::getSensorType1($hum->sensorid)->unit);?></b>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card mb-1">
                                            <div class="card-body d-flex flex-column align-items-start">
                                                <h2 class="card-text small mb-0"><img src="../assets/resources/air-con.png" class="mr-2" style="max-width: 25px;">
                                                    <b><?php echo ($air != "No data") ? $air : "-"; ?></b>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="room.php?id=<?php echo "$room->roomid" ?>">
                                <button type="submit" name="go-to-building" class="button-submit">View Details</button>
                            </a>





                              <!-- <div class="row align-items-center">
                                <div class="col">
                                  <h2 class="card_text">Light<img src="../assets/resources/light.png" class="mr-2" style="max-width: 25px;">:<br><b><?php echo $light?> </b></h2>
                                  <h2 class="card_text">Temperature<img src="../assets/resources/temperature.png" class="mr-2" style="max-width: 25px;">: <b><?php if($temp == NULL) echo "<br> - ";
                                        else {$sensortype = DbUtils::getSensorType1($temp->sensorid);
                                        echo $temp->value  . " " . $sensortype->unit;} ?> </b></h2>
                                </div>
                                <div class="col">
                                  <h2 class="card_text">Humidity<img src="../assets/resources/humidity.png" class="mr-2" style="max-width: 25px;">:<br><b> <?php if($hum == NULL) echo " - ";
                                        else{$sensortype = DbUtils::getSensorType1($hum->sensorid);
                                         echo $hum->value  . "" . $sensortype->unit;} ?></b></h2>
                                  <h2 class="card_text">Air Condition<img src="../assets/resources/air-con.png" class="mr-2" style="max-width: 25px;">: <b><?php echo ($air != "No data") ? $air: "<br> -"; ?></b></h2>
                                </div>
                              </div>
                              <a href="room.php?id=<?php echo "$room->roomid"?>">
                                <button type="submit" name="go-to-building" class="button-submit">View Details</button>
                              </a>
                          </div> -->
                      </div>
                  </li>
                  <?php } else echo "No Rooms to Display" ?>
              
              </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../layout/footer.php');
?>
