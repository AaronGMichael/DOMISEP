<?php
include_once("../layout/header.php");
?>

<div>
<?php 
$build = isset($_GET['buildingid']) ? true : false;
$graphType = "UsageHistory";
include_once("../components/graphs.php");?>
</div>
    <div id="DIVID">
    <button type="submit" name="login" onclick="addCompare()">Add To Compare</button>
    </div>

<?php
include('../layout/footer.php');
?>

<script src="../js/appendToChart.js">
</script>
