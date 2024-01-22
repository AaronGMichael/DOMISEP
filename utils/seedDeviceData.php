<?php 
include_once('DbUtils.php');
if(isset($_POST['DeviceID'])){
    $utils = new DbUtils();
    $startDate = new DateTime('-1 year'); // Get the date one year ago
    $endDate = new DateTime(); // Get today's date

    // Loop through each day from one year ago until today
    while ($startDate <= $endDate) {
        // Format the date to match your database date format (YYYY-MM-DD)
        $formattedDate = $startDate->format('Y-m-d');
        // Prepare and execute the SQL query to insert data into the database
        for ($i = 1; $i <= 5; $i++) {
            $randomTime = mt_rand(0, 86399); // Total seconds in a day (24 * 60 * 60 - 1)
            $formattedTime = gmdate('H:i:s', $randomTime);
            DBUtils::writeDeviceMeasurement(rand(5,60), "$formattedDate $formattedTime", $_POST["DeviceID"]);
        }

        // Move to the next day
        $startDate->modify('+1 day');
    }
    $success = DBUtils::writeDeviceMeasurement(rand(5,60), date('Y-m-d H:i:s'), $_POST["DeviceID"]);
    echo "seeded";
}
?>