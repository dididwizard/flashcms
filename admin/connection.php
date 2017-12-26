<?php
$config = simplexml_load_file("../data/config.xml");

define("DB_HOST", $config->Database->host);
define("DB_USER", $config->Database->user);
define("DB_PASS", $config->Database->pass);
define("DB_NAME", $config->Database->name);
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);