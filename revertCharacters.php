<?php

/**
 * Метод принимает строку и возвращает другую строку,
 * состоящую из слов в которых все символы в обратном порядке.  
 * @param string $string Строка в которой нужно перевернуть все слова
 * 
 * @return string|null
 */
function revertCharacters(string $string): string
{
    $wordsArray = explode(' ', $string);
    if ($wordsArray) {
        $wordsArray = array_map(function ($wordsArray): string {
            $arrayLetters = str_split($wordsArray);
            $arrayLetters = array_reverse($arrayLetters);
            return implode('', $arrayLetters);
        }, $wordsArray);
    }
    return implode(' ', $wordsArray);
}

if (isset($argv[1])) {
    echo revertCharacters($argv[1]);
}
