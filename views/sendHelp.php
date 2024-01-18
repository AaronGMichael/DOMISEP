<?php
include_once('../layout/header.php');
?>

<div class="card border-0 shadow" style="margin:auto; width:80%; padding: 2em">
<form action="../utils/help.php" method="post">
<div class="container">
  <h1 style="margin-left: 0">How can we help you?</h1>
  <p style="margin-left: 1em">We will get back to you by email :)</p>
    <div class="form-group">
      <input name="userid" value="<?php echo $user->id?>" style="display:none">
      <textarea name="message" placeholder="Your Message" class="form-control" rows="10" style="border: solid 2px black;" required></textarea>
    </div>
    <button type="submit" class="btn btn-lg btn-dark btn-block">Submit Form</button>
</div>
</form>
</div>



<?php
include('../layout/footer.php');
?>



