<h1>Resources Consumption</h1>
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
                              <h2 class="card_text_grid">Usage: <b><?php echo ($sumWater > 0) ? $sumWater:0; ?>/Liters</b></h2>
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
                              <h2 class="card_text_grid">Usage: <b><?php echo ($sumEle > 0) ? $sumEle:0; ?>/kWh</b></h2>
                              <a href="usageHistory.php?type=electricity&<?php echo $siteType?>id=<?php echo$currentId ?>">
                              <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                              </a>
                          </div>
                      </div>
                  </li>
              </ul>