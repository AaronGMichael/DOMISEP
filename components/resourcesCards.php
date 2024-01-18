<h1>Resources Consumption <?php echo isset($numberofpeople) ? $numberofpeople>1 ? "($numberofpeople people)" : "($numberofpeople person)" : " "?></h1>
              <div class="additional-padding-small"></div>
              <?php $siteType = str_contains($_SERVER['REQUEST_URI'], 'building') ? 'building' : 'apartment'?>
              <ul class="cards_grid">
                  <li class="cards_item_grid">
                      <div class="card_grid">
                          <div class="card_image_container_grid">
                              <div class="card_image_grid"><img src="../assets/resources/water.png"></div>
                          </div>
                          <div class="card_content_grid">
                              <h2 class="card_title_grid">Water</h2>
                              <h2 class="card_text_grid">Usage: <b><?php echo ($sumWater > 0) ? $sumWater:0; ?> Liters</b></h2>
                              <a href="usageHistory.php?type=water&<?php echo $siteType?>id=<?php echo$currentId ?>">
                              <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                              </a>
                          </div>
                      </div>
                  </li>
                  <li class="cards_item_grid">
                      <div class="card_grid">
                          <div class="card_image_container_grid">
                              <div class="card_image_grid"><img src="../assets/resources/electricity.png"></div>
                          </div>
                          <div class="card_content_grid">
                              <h2 class="card_title_grid">Electricity</h2>
                              <h2 class="card_text_grid">Usage: <b><?php echo ($sumEle > 0) ? $sumEle:0; ?> kWh</b></h2>
                              <a href="usageHistory.php?type=electricity&<?php echo $siteType?>id=<?php echo$currentId ?>">
                              <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                              </a>
                          </div>
                      </div>
                  </li>

                  <?php if(str_contains($_SERVER['REQUEST_URI'], "apartment.php")) {?>
                  <li class="cards_item_grid">
                      <div class="card_grid">
                          <div class="card_image_container_grid">
                              <div class="card_image_grid">
                              <?php
                                switch ($numberofpeople) {
                                    case 1:
                                        echo '<img src="../assets/resources/one_person.png">';
                                        break;
                                    case 2:
                                        echo '<img src="../assets/resources/two_person.png">';
                                        break;
                                    case 3:
                                        echo '<img src="../assets/resources/three_person.png">';
                                        break;
                                    default:
                                        echo '<img src="../assets/resources/obesity.png">';
                                        break;
                                }
                                ?>
                              </div>
                          </div>
                          <div class="card_content_grid">
                              <h2 class="card_title_grid">Tenants</h2>
                              <h2 class="card_text_grid">Total: <?php echo isset($numberofpeople) ? $numberofpeople>1 ? "$numberofpeople" : "$numberofpeople" : " "?></h2>
                              <?php if($user->isUser()) { ?>
                                    <a href="addPersonToApartment.php">
                                    <button type="submit" name="sendHelp" class="button-submit">Add Person</button>
                                <?php } ?>
                          </div>
                      </div>
                  </li>
                  <?php } ?>
              </ul>