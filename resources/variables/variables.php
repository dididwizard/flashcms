<?php
/*
* Store Variable Data
* Use This in Theme
*/

error_reporting(0);

$sql1 = mysqli_query($dbc, "SELECT * FROM site");
$sql2 = mysqli_query($dbc, "SELECT * FROM options");
while($site = mysqli_fetch_array($sql1) AND $options = mysqli_fetch_array($sql2)){

/* Basic Site Info */
$TITLE = $site['title'];
$DESCRIPTION = $site['description'];
$KEYWORDS = $site['keywords'];
$AUTHOR = $site['author'];

/* Theme & Resource Path */
$THEME = "themes/".$site['theme']."/";
$PATH = getResourcePath($THEME); //Get Full Path of CSS, JS or other Resource in Theme Folder


/* Posts */

// Get Post Title

$POST_TITLE = getUrlVar($_SERVER['REQUEST_URI']);

$GET_POST_LIST = mysqli_query($dbc, "SELECT * FROM posts");
$GET_POST = mysqli_query($dbc, "SELECT * FROM posts WHERE title='$POST_TITLE'");

}
?>