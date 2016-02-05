<?php
/**
 * Created by PhpStorm.
 * User: XTreme.ws
 * Date: 30.01.2016
 * Time: 0:09
 */
session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit;
?>