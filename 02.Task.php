<?php
/* Да се състави програма, чрез която от клавиатурата се въвеждат
последователно две думи с дължина 10-20 знака.
Програмата да размени първите им 5 знака и да изведе дължината на
по-дългата, както и новото им съдържание. */

require_once 'readline.php';

do {
	$firstStr = readline("Enter first string:" . PHP_EOL);
	$lenFirst = mb_strlen($firstStr);
} while ($lenFirst < 5 || $lenFirst > 20);

do {
	$secondStr = readline("Enter second string:" . PHP_EOL);
	$lenSecond = mb_strlen($secondStr);
} while ($lenSecond < 5 || $lenSecond > 20);

$firstStr5Char = mb_substr($firstStr, 0, 5);
$secondStr5Char = mb_substr($secondStr, 0, 5);

$firstStr = str_replace($firstStr5Char, $secondStr5Char, $firstStr);
$secondStr = str_replace($secondStr5Char, $firstStr5Char, $secondStr);

echo "The new strings are:\n$firstStr\n$secondStr\n";

if ($lenFirst == $lenSecond) {
	echo "The strings are equal - $lenFirst chars.";
} else {
	echo "The longer string is: ";
	echo $lenFirst > $lenSecond ? "$lenFirst chars - $firstStr" : "$lenSecond chars - $secondStr";
}


