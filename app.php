<?php 

$start = microtime(true);
require './lib/fileHelper.php';
require './lib/wordHelper.php';
try {
  //Grab & open the file from STDIN.
  $inputFile = new fileHelper('php://stdin', 'r');
  $inputFile->open();

  /*Create a wordHelper, loop through the lines in the file 
  and determine the sequences for the word.*/
  $wordHelper = new wordHelper();
  while ($word = $inputFile->readLine()) {
    $wordHelper->determineSequences($word);
  }
  $inputFile->close();
  $wordHelper->removeDupes();
  $wordHelper->sort();

  //Create & open output files in /tmp.
  $outputUnique = new fileHelper('/tmp/unique.txt', 'w');
  $outputUnique->open();

  $outputFullWords = new fileHelper('/tmp/fullwords.txt', 'w');
  $outputFullWords->open();

  $words = $wordHelper->getWordArray();
  // Loop through and write to the approriate output file.
  foreach ($words as $unique => $full) {
    $outputUnique->write($unique . "\n");
    $outputFullWords->write($full[0] . "\n");
  }
  //Close files. 
  $outputUnique->close();
  $outputFullWords->close();

} catch (exception $e) {
  echo $e->getMessage();
}
echo "Finished in " . (microtime(true) - $start) . "\n";
