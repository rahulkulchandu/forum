<?php
echo "Please wait logging out....";
session_start();
session_unset();
session_destroy();
header("location:/forum/index.php");
exit;

?>