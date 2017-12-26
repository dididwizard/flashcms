	// Change define() into Variable :
					ob_start();
					echo DB_HOST;
					$DB_HOST = ob_get_contents();
					ob_end_clean();
					ob_start();
					echo DB_USER;
					$DB_USER = ob_get_contents();
					ob_end_clean();
					ob_start();
					echo DB_PASS;
					$DB_PASS = ob_get_contents();
					ob_end_clean();
					ob_start();
					echo DB_NAME;
					$DB_NAME = ob_get_contents();
					ob_end_clean();
					$dbc1 = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

				//////////////////////
				date ("d/m/Y H:i:s", filemtime("../files/$entry"))

				/*
		if(strpos($file, ".")) return str_replace(".", "a", $file);
		if(strpos($file, "-")) return str_replace("-", "b", $file);
		if(strpos($file, "_")) return str_replace("_", "c", $file);
		if(strpos($file, "@")) return str_replace("@", "d", $file);
		if(strpos($file, "#")) return str_replace("#", "e", $file);
		if(strpos($file, "$")) return str_replace("$", "f", $file);
		if(strpos($file, "%")) return str_replace("%", "g", $file);
		if(strpos($file, "^")) return str_replace("^", "h", $file);
		if(strpos($file, "&")) return str_replace("&", "i", $file);
		if(strpos($file, "(")) return str_replace("(", "j", $file);
		if(strpos($file, ")")) return str_replace(")", "k", $file);
		if(strpos($file, "{")) return str_replace("{", "l", $file);
		if(strpos($file, "}")) return str_replace("}", "m", $file);
		if(strpos($file, "[")) return str_replace("[", "n", $file);
		if(strpos($file, "]")) return str_replace("]", "o", $file);
		if(strpos($file, "+")) return str_replace("+", "p", $file);
		if(strpos($file, "=")) return str_replace("=", "q", $file);
		if(strpos($file, ";")) return str_replace(";", "r", $file);
		if(strpos($file, "'")) return str_replace("'", "s", $file);
		if(strpos($file, ",")) return str_replace(",", "t", $file);
		if(strpos($file, "~")) return str_replace("~", "u", $file);
		if(strpos($file, "`")) return str_replace("`", "v", $file);
		if(strpos($file, "!")) return str_replace("!", "w", $file);
		else return $file;
		$convChars = new convChars();
		$convChars->changeChars1("a");
		$convChars->changeChars2("b");
		$convChars->changeChars3("c");
		$convChars->changeChars4("d");
		$convChars->changeChars5("e");
		$convChars->changeChars6("f");
		$convChars->changeChars7("g");
		$convChars->changeChars8("h");
		$convChars->changeChars9("i");
		$convChars->changeChars10("j");
		$convChars->changeChars11("k");
		$convChars->changeChars12("l");
		$convChars->changeChars13("m");
		$convChars->changeChars14("n");
		$convChars->changeChars15("o");
		$convChars->changeChars16("p");
		$convChars->changeChars17("q");
		$convChars->changeChars18("r");
		$convChars->changeChars19("s");
		$convChars->changeChars20("t");
		$convChars->changeChars21("u");
		$convChars->changeChars22("v");
		$convChars->changeChars23("w");
		$convChars->returnChars();*/
