<?php

$var1 = ", MAYLON, ANIBAL, ISABELA";
$var2 = "ANIBAL";

if (mb_strpos($var1, $var2) !== false) {
	echo 'A string 2 está presente na um';
}
