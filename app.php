<?php 

$start = microtime(true);
require './lib/fileHelper.php';
require './lib/wordHelper.php';
try {
  $inputFile = new fileHelper('php://stdin', 'r');
  $inputFile->open();

  $wordHelper = new wordHelper();
  while ($word = $inputFile->readLine()) {
    $wordHelper->determinePermutations($word);
  }
  $inputFile->close();
  $wordHelper->removeDupes();
  $wordHelper->sort();

  $outputUnique = new fileHelper('/tmp/unique.txt', 'w');
  $outputUnique->open();

  $outputFullWords = new fileHelper('/tmp/fullwords.txt', 'w');
  $outputFullWords->open();

  $words = $wordHelper->getWordArray();

  foreach ($words as $unique => $full) {
    $outputUnique->write($unique . "\n");
    $outputFullWords->write($full[0] . "\n");
  }
} catch (exception $e) {
  echo $e->getMessage();
}
echo "Finished in " . (microtime(true) - $start) . "\n";
