<?php
include_once("../layout/header.php");
if(isset($_GET['buildingid'])) include_once("../components/proveAdmin.php");
?>
<script>
    var admin = "<?php echo json_encode($user->isAdmin())?>";
</script>

<div>
<?php 
$build = isset($_GET['buildingid']) ? true : false;
$graphType = "UsageHistory";
include_once("../components/graphs.php");?>
</div>
    <div id="DIVID" class="datePickers">
        <button type="submit" class="addToCompare" name="login" onclick="addCompare()">Add To Compare <i class="fa-solid fa-plus"></i></button>
    </div>

<?php
include('../layout/footer.php');
?>

<script src="../js/appendToChart.js">
</script>
