<?php
/* FlashCMS Configuration Setting
*   Copyright © 2017-2018 FlashCMS
*/

// Database Connection
define("DB_TYPE", 1);
define("DB_HOST", "0.0.0.0:3306");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "flashcms");
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);