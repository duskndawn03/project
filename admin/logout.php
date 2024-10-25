<?php
session_start();

// Destroy all sessions
session_unset();
session_destroy();

// Redirect to login page
header("Location: https://ipework.free.nf/admin/");
exit();
?>
