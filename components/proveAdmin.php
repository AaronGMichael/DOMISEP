<?php
if($user->isUser()){
    $_SESSION['message'] = 'You are not allowed there';
    header('location:../views/apartment.php');
}
?>