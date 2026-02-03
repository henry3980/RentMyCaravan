<?php
# Iestyn's code
session_start();

session_unset();

session_destroy();

header("Location: ../loginPage.php");

?>