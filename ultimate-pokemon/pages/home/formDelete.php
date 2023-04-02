<?php

require_once "../../settings/config.php";

$pokemon = Wallet::find($_GET['id']);
$pokemon->delete();
header("location:index.php");



