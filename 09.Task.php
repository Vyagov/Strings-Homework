<?php
/* Да се състави програма, чрез която по въведен низ съдържащ букви,
цифри, знак минус '-' се извежда сборът на въведените числа като се
отчита знакът '-' пред съответното число. */

require_once 'readline.php';

do {
	$string = readline("Enter string that contains letters, digits and '-':" . PHP_EOL);
} while (empty($string));

$numberStr = '';
$numbers = [];
$len = strlen($string);

for ($i = 0; $i < $len; $i++) {

	if ($string[$i] == '-' || is_numeric($string[$i])) {
		$numberStr .= $string[$i];
		
	} else {

		if (!empty($numberStr)) {
			$numbers[] = $numberStr;
			$numberStr = '';
		}
	}
	
	if ($i + 1 < $len) {
		if (!empty($numberStr) && $string[$i + 1] == '-') {
			$numbers[] = $numberStr;
			$numberStr = '';
		}
	}
}

if (!empty($numberStr)) {
	$numbers[] = $numberStr;
	$numberStr = '';
}

$sum = 0;

foreach ($numbers as $value) {
	if ($value != '-') {
		echo $value, PHP_EOL;
		$sum += $value;
	}
}

echo 'Sum = ' . $sum;
