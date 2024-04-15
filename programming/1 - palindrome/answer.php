<?php

// Test it online: https://onlinephp.io/c/f5c1e -> Output is 11 because PHP prints 1 for true and empty for false.

/**
 * Check if a word is a palindrome
 *
 * @param string $word - Any word
 * 
 * @return boolean
 */
function isPalindromeWord($word) {
    $wordLength = strlen($word);

    for ($i = 0; $i < $wordLength / 2; $i++) {
        if ($word[$i] !== $word[$wordLength - 1 - $i]) {
            return false;
        }
    }

    return true;
}

echo isPalindromeWord('HANNAH');  // true (HANNAH)
echo isPalindromeWord('DEYVID');  // false (DIVYED != DEYVID)
echo isPalindromeWord('ANA');  // true (ANA)
