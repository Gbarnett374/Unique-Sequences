<?php

class wordHelper
{
  protected $wordArray;

  function __construct()
  {
    $this->wordArray = [];
  }

  public function determinePermutations($word)
  {
    if (!$this->validLine($word)) {
      throw new Exception("Not a valid line, based on requirements.");
    }
    if (!$this->validLength($word[0], 3)) {
      return false;
    }

    for ($i = 0; $i < (strlen($word[0]) -1); $i++) {
      // echo $wordSegment;
      $wordSegment = strtolower(substr(trim($word[0]), $i, 4));
      if (!$this->validLength($wordSegment, 3)) {
        break;
      }
      $this->wordArray[$wordSegment][] = $word[0];
    }
  }

  protected function validLine($line)
  {
    return !empty($line) ? true : false;
  }

  protected function validLength($word, $length)
  {
    return strlen($word) > $length ? true : false;
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