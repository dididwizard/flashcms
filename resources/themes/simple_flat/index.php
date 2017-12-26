<!DOCTYPE html>
<html lang="en-US">
<head>
	<title><?php echo $TITLE;?></title>
	<meta name="viewport" content="width=device-width initial-scale=1">
	<meta name="description" content="<?php echo $DESCRIPTION;?>">
	<meta name="keywords" content="<?php echo $KEYWORDS;?>">
	<link rel="stylesheet" href="<?php echo $PATH;?>css/style.css">
	<link rel="stylesheet" href="<?php echo $PATH;?>fa/css/font-awesome.min.css">
</head>
<body>
<nav id="top-nav">
	<div id="top-link">
		<a href="javascript:void(0)"><i class="fa fa-user"></i>&nbsp;&nbsp;About Me</a>
		<a href="javascript:void(0)"><i class="fa fa-book"></i>&nbsp;&nbsp;Guest Book</a>
		<a href="javascript:void(0)"><i class="fa fa-inbox"></i>&nbsp;&nbsp;Feedback</a>
	</div>
	<div id="social-link">
		<a href="javascript:void(0)" id="fb-link"><i class="fa fa-facebook"></i></a>
		<a href="javascript:void(0)" id="tw-link"><i class="fa fa-twitter"></i></a>
		<a href="javascript:void(0)" id="gp-link"><i class="fa fa-google-plus"></i></a>
	</div>
	</nav>
	<header>
	<?php echo $TITLE;echo "\n"?>
	</header>
	<nav id="menu-nav">

</nav>
<div class="main-content">
	<div class="post-list">
		<?php
		while($POST = mysqli_fetch_array($GET_POST_LIST)){
		echo '
		<div class="post">
			<div class="post-title"><a href="'.postUrl($POST['title']).'">'.$POST['title'].'</a></div>
			<div class="post-author"><i class="fa fa-user"></i>&nbsp;&nbsp;'.$POST['author'].'</div>
			<div class="post-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;'.$POST['date'].'</div>
			<div class="post-category"><i class="fa fa-tag"></i>&nbsp;&nbsp;'.$POST['category'].'</div>
		</div>
		';
		}
		?>

	</div>
</div>
<footer>
	Copyright © <?php echo "".date('Y').""; ?><br />
	<span><?php echo $TITLE?></span><br />
	<span>Simple Flat By Didid</span>
</footer>
<script src="<?php echo $PATH ;?>script/jquery.min.js"></script>
</body>
</html>