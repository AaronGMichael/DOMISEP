
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <div id="chart-container">
        <div id="noData">No Data To Show</div>
        <canvas id="graphCanvas">
            
        </canvas>
        <div class="datePickers">
          <div class="datePickerBox">
            <input type="text" class="datepicker" id="fromDate" placeholder="From Date">
          </div>
          <div class="datePickerBox">
            <input type="text" class="datepicker" id="toDate" placeholder="To Date">
          </div>
        <button onclick="showGraph()" type="submit">Show Graph<i class="fa-solid fa-angles-right"></i>
      </button>
        </div>
    </div>
  <script src="../js/datePicker.js">
  </script>
    <script src=<?php 
    if($graphType == "SensorData") echo "../js/chart.js";
    else if($graphType == "UsageHistory") echo "../js/chartHistory.js";
    ?>>
    </script>  
