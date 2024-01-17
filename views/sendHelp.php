<?php
include_once('../layout/header.php');
?>

<form action="../utils/help.php" method="post">
<div class="container">
  <h1>How can we help you?</h1>
    <div class="form-group">
      <input name="userid" value="<?php echo $user->id?>" style="display:none">
      <input name="message" placeholder="Your Message" class="form-control" rows="10" required></input>
    </div>
    <button type="submit" class="btn btn-lg btn-dark btn-block">Submit Form</button>
</div>
</form>



<?php
include('../layout/footer.php');
?>



