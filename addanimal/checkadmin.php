<?php
if ($_SESSION["accounttype"] != "admin") {
    header("Location: ../myaccount/myaccount.php");
}
?>
