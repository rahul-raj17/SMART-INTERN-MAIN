<?php
session_start();
session_unset();
session_destroy();
// echo "<br> you are logged out";
// echo "<br><a href='signin.php'>clicked to login again</a>";
// echo "<br><a href='index.php'>go to home </a>"
header("location:signin.php");
exit();
?>