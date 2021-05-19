<?php
$text = '(– b + (b^2 – 4*a*c)^(0.5/ 2*a)';

function checkChar($text,$openSym,$closeSym)
{
    $textArr = str_split($text);
    $count1 = 0;
    $count2 = 0;
    $flag = true;
    foreach ($textArr as $item) {
        if ($item == $closeSym && $count1 == 0) {
            $flag = false;
            break;
        }
        if ($count1 < $count2) {
            $flag = false;
        }
        switch ($item) {
            case $openSym :
                $count1++;
                break;
            case $closeSym :
                $count2++;
                break;
        }
    }
    if ($count1 != $count2) {
        $flag = false;
    }
    return $flag;
}

function hasMatchedParenthesis($string) {
    $len = strlen($string);
    $stack = [];
    for ($i = 0; $i < $len; $i++) {
        switch ($string[$i]) {
            case '(': array_push($stack, 0); break;
            case ')':
                if (array_pop($stack) !== 0)
                    return false;
                break;
            case '[': array_push($stack, 1); break;
            case ']':
                if (array_pop($stack) !== 1)
                    return false;
                break;
            default: break;
        }
    }
    return (empty($stack));
}
