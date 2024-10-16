<?php

/**
 * Problem 1:
 * Given a list of integers, find the minimum of their absolute values. 
 * Note:
 * 'Absolute values' means the non-negative value without regard to its sign. For example, the  * Absolute value of 123 is 123, and the Absolute value of -123 is also 123. 
 * 
 * Sample input 1:
 * 10 12 15 189 22 2 34
 * Sample output 1: 
 * 2
 * 
 * Sample input 2:
 * 10 -12 34 12 -3 123
 * Sample output 2:
 * 3
 */

function minAbsoluteValue($int_in_str)
{
    $str_to_ints = explode(" ", $int_in_str);
    $min_value = null;

    foreach ($str_to_ints as $integer) {

        // need check positive or negative value
        if ($integer >= 0) {
            $int_number = $integer;
        } else {
            $int_number = -$integer;
        }

        // now check minimum value
        if ($min_value === null || $int_number < $min_value) {
            $min_value = $int_number;
        }
    }
    return $min_value;
}

echo minAbsoluteValue('12 15 189 22 2 34');
echo "\n";
echo minAbsoluteValue('10 -12 34 12 -3 123');


// or

function minAbsoluteValue($int_in_str)
{
    $str_to_ints = explode(" ", $int_in_str);
    $min_abs_value = PHP_INT_MAX;

    foreach ($str_to_ints as $integer) {

        // need check positive or negetive value
        $abs_value = abs($integer);
        $abs_value = $integer < 0 ? -$integer : $integer;

        // now check minimum value
        if ($abs_value < $min_abs_value) {
            $min_abs_value = $abs_value;
        }
    }
    return $min_abs_value;
}

echo minAbsoluteValue('12 15 189 22 2 34');
echo "\n";
echo minAbsoluteValue('10 -12 34 12 -3 123');

/**
 * Problem 2:
 * Given a few paragraphs in a file, read the file and count how many words are there. 
 * For example, if there is a file with the following contents:
 * 
 * Nunc ex lorem, ullamcorper ut eleifend ac, pellentesque non dolor.  
 * 
 * You need to output: 10
 * 
 * Because there are 10 words. 
 * Note: There can be multiple paragraphs. You need to count all of the words from all of the paragraphs. 
 * You need to read the data from a file. 
 */

 function wordCount($string)
 {
     $trimmedString = trim($string);
 
     $wordStore = [];
 
     $currentWord = "";
 
     for ($i = 0; $i < strlen($trimmedString); $i++) {
         $char = $trimmedString[$i];
 
         if (preg_match('/[\s[:punct:]\n\r]/', $char)) {
 
             if ($currentWord !== "") {
                 $wordStore[] = $currentWord;
                 $currentWord = "";
             }
         } else {
             $currentWord .= $char;
         }
     }
 
     if ($currentWord !== "") {
         $wordStore[] = $currentWord;
     }
 
     $wordCount = count($wordStore);
     return $wordCount;
 }
 
 $str = "Nunc ex lorem, ullamcorper ut eleifend ac, pellentesque non dolor.";
 
 $wordCount = wordCount($str);
 
 // echo $str;
 echo "Total Word of above conversion or content is : $wordCount";
 echo "\n";
 // Solution by built-in-function
 echo "Solution by built-in-function str_word_count :" . str_word_count($str);

 /** 
  * Problem 3:
  * Given a sentence, keep the order of the words same, but reverse the characters of each word. 
 * For example, if the given sentence is: ‘I love programming’ 
 * The result should be: ‘I evol gnimmargorp’
 * 
 * Here the order of the words is the same as the given sentence, but the order of the characters in the words is reversed. 
 */

 function fixed_position_rev_word($string)
 {
     $words = explode(' ', $string);
     $reversed_words = [];
 
     foreach ($words as $word) {
         if (preg_match('/[\s[:punct:]\n\r]/', $word)) { //here I need to work with ('), because when found like this "can't" word, it will not be "t'cant".
             $reversed_words[] = $word;
         } else {
             $reversed_words[] = strrev($word);
         }
     }
 
     $rev_str = implode(' ', $reversed_words);
 
     return $rev_str;
 }
 
 // $str = "I didn't complete this assignment.";
 /** here is a problem with (') when short form like can't*/
 
 $str = 'I love programming';
 echo fixed_position_rev_word($str);
 
 /**
  * Problem 4:
  * Print the following pattern based on the given number n (can be any number). 
  * Sample input: 5 
  * Sample output: 
  *        *
  *      ***
  *    *****
  *  *******
  * *********
  */
  
/**
 * Create a triangle pattern.
 */

function triangleShapePrint($n)
{
    for ($i = 0; $i < $n; $i++) {

        $spaces = $n - $i - 1;
        for ($j = 0; $j < $spaces; $j++) {
            echo " ";
        }

        $stars = 2 * $i + 1;
        for ($k = 0; $k < $stars; $k++) {
            echo "*";
        }
        echo "\n";
    }
}

$n = 5;
echo triangleShapePrint($n);

/**
 * Problem 5:
 * Given an integer n, find the sum of the digits of the integer.
 * 
 * Sample input 1:
 * 62343
 * Sample output 1: 
 * 18
 * 
 * Sample input 2:
 * 1000
 * Sample output 2: 
 * 1
 */

/**
 * Calculate the sum of the digits of an integer.
 */
function sumOfIntegerDigits(int $int): int
{
    $intDigits = str_split((string) $int);
    $digitSum = 0;

    foreach ($intDigits as $intDigit) {
        $digitSum += (int) $intDigit;
    }

    return $digitSum;
}

$int = 62343;
// $int = 1000;
$sum = sumOfIntegerDigits($int);

echo "The sum of the digits of $int is: $sum";
