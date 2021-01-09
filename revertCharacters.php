<?php

namespace RevertCharacters;

/**
 * Метод принимает строку и возвращает другую строку,
 * состоящую из слов в которых все символы в обратном порядке.  
 * @param string $string Строка в которой нужно перевернуть все слова
 * 
 * @return string|null
 */
function revertCharacters(string $string): string
{
    $arrayOfWords = explode(' ', $string);
    if ($arrayOfWords) {
        $arrayOfWords = array_map(fn ($word) => revertOneWord($word), $arrayOfWords);
    }
    return implode(' ', $arrayOfWords);
}

/**
 * Метод возвращает перевернутое слово с учетом регистра и распространенных  знаков препинания 
 * @param mixed $word
 * 
 * @return string
 */
function revertOneWord(string $word): string
{
    $arrayOfSubWords = preg_split('#\w++\K\b|[^?,!;.\w]+#u', $word, -1, PREG_SPLIT_NO_EMPTY);
    array_walk($arrayOfSubWords, function (&$subWord) {
        $caseTemplate = getCaseTemplate($subWord);
        $arrayLetters = preg_split("//u", $subWord, -1, PREG_SPLIT_NO_EMPTY);
        $arrayLetters = array_reverse($arrayLetters);
        $subWord = implode('', $arrayLetters);
        $subWord = setCaseTemplateToString($subWord, $caseTemplate);
        return $subWord;
    });

    return  implode('', $arrayOfSubWords);
}

/**
 * Метод принимает строку , 
 * возвращает массив bool в качестве шаблона для UpperCase символов слова
 * @param string $string
 * 
 * @return string
 */
function getCaseTemplate(string $string): array
{
    $arrayOfCharacters = preg_split("//u", $string, -1, PREG_SPLIT_NO_EMPTY);
    return array_map(fn ($character) => (mb_strtoupper($character) === $character), $arrayOfCharacters);
}

/**
 * Метод применяет шаблон для UpperCase символов, к строке  
 * используется совместно с getCaseTemplate();
 * @param array $string
 * @param array $template 
 * 
 * @return array
 */
function setCaseTemplateToString(string $string, array $template): string
{
    $arrayOfCharacters = preg_split("//u", $string, -1, PREG_SPLIT_NO_EMPTY);
    array_walk($arrayOfCharacters, function (&$char, $key, $template) {
        if ($template[$key]) {
            $char = mb_strtoupper($char);
        } else {
            $char = mb_strtolower($char);
        }
    }, $template);
    return implode('', $arrayOfCharacters);
}

if (isset($argv[1])) {
    echo revertCharacters($argv[1]);
}
