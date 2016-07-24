<?php
/* Да се състави програма, чрез която се въвеждат 2 редици от знаци (думи).
Ако в двете редици участва един и същи знак, да се изведе на екрана
първата редица хоризонтално, а втората вертикално, така че да се
пресичат в общия си знак.
Ако редиците нямат общ знак да се изведе само уведомително съобщение. */

require_once 'readline.php';

do {
	echo 'Enter two strings.', PHP_EOL;

	$firstStr = readline('First string: ');
	$secondStr = readline('Second string: ');
} while(empty($firstStr) || empty($secondStr));

function stringToArray($str) {
	$len = mb_strlen($str);
	for ($i = 0; $i < $len; $i++) {
		$arr[] = mb_substr($str, $i, 1);
	}
	return $arr;
}

$firstArr = stringToArray($firstStr);
$secondArr = stringToArray($secondStr);
$generalChar = false;

$lenF = count($firstArr);
$lenS = count($secondArr);

$i = 0;
$j = 0;

while ($i < $lenF) {
	
	if ($j == $lenS) {
		$j = 0;
		$i++;
	}
	
	if ($firstArr[$i] == $secondArr[$j]) {
		$generalChar = true;
		$indexF = $i;
		$indexS = $j;
		break;
	}
	$j++;
}

if ($generalChar) {
	
	for ($i = 0; $i < $lenS; $i++) {

		for ($j = 0; $j < $lenF; $j++) {

			if ($j == $indexF) {
				echo $secondArr[$i];
			}
				
			if ($firstArr[$j] == $secondArr[$i] && $j == $indexF) {
				echo '';
			} else {
				echo $i == $indexS ? $firstArr[$j] : ' ';
			}
		}
		echo PHP_EOL;
	}
} else {
	echo 'The strings do not have general chars.';
}
