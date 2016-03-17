<?php

class wordHelper
{
  protected $wordArray;

  function __construct()
  {
    $this->wordArray = [];
  }
/**
  * Determines the sequences in a word.
  * Stores the sequence in the key of the array, and the orignal word as the value.
  * @param array $word  word from the file to be parsed.
*/
  public function determineSequences($word)
  {
    if (!$this->validLength($word[0], 3)) {
      return false;
    }

    for ($i = 0; $i < (strlen($word[0]) -1); $i++) {
      $wordSegment = strtolower(substr(trim($word[0]), $i, 4));
      if (!$this->validLength($wordSegment, 3)) {
        break;
      }
      $this->wordArray[$wordSegment][] = $word[0];
    }
  }
/**
 * Removes white space and checks that a word is a valid length.
 * @param  string $word   the word, or sequence of characters. 
 * @param  int    $length the length the string must be greater than.
 * @return bool   
 */
  protected function validLength($word, $length)
  {
    return strlen(trim($word)) > $length ? true : false;
  }
/**
 * Removes dupes from the array. 
 */
  public function removeDupes()
  {
    foreach ($this->wordArray as $k => $v) {
      if (count(array_count_values($this->wordArray[$k])) > 1) {
        unset($this->wordArray[$k]);
      }
    }
  }
/**
 * Sorts the wordArray alphabetically. 
 */
  public function sort()
  {
    ksort($this->wordArray);
  }
/**
 * Returns the array stored in the wordArray Property.
 * @return array  contains the sequences in the keys, and the orignal words as the values.
 */
  public function getWordArray()
  {
    return $this->wordArray;
  }
}