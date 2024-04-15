/**
 * Check if a word is a palindrome
 *
 * @param {String} word - Any word
 * @returns {Boolean}
 */
function isPalindromeWord(word) {
  for (let i = 0; i < word.length / 2; i++) {
    if (word[i] !== word[word.length - 1 - i]) {
      return false;
    }
  }

  return true;
}

console.log(isPalindromeWord("HANNAH")); // true (HANNAH)
console.log(isPalindromeWord("DEYVID")); // false (DIVYED != DEYVID)
console.log(isPalindromeWord("ANA")); // true (ANA)
