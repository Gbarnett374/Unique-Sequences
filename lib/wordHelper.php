<?php

class wordHelper
{
  protected $wordArray;

  function __construct()
  {
    $this->wordArray = [];
  }
/* Dertermine the sequences for a word. 
   The array is keyed by the determined sequence. 
   Original fullwords are pushed to the array.*/
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

  protected function validLength($word, $length)
  {
    return strlen(trim($word)) > $length ? true : false;
  }

  public function removeDupes()
  {
    foreach ($this->wordArray as $k => $v) {
      if (count(array_count_values($this->wordArray[$k])) > 1) {
        unset($this->wordArray[$k]);
      }
    }
  }

  public function sort()
  {
    ksort($this->wordArray);
  }

  public function getWordArray()
  {
    return $this->wordArray;
  }
}