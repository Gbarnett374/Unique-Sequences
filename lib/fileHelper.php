<?php
class fileHelper
{
  protected $location;
  protected $option;
  protected $file;

  function __construct($location, $option)
  {

    $this->location = $location;
    $this->option   = $option;
  }
/**
 * Opens a file.
 */
  public function open()
  {
    $this->file = fopen($this->location, $this->option);

    if (!$this->isValidResource()) {
      throw new Exception("Not a valid resource.");
    }
  }
/**
 * Reads a single line from a file.
 * @return array contains the line of data.
 */
  public function readLine()
  {
    return $line = fgetcsv($this->file);
  }
/**
 * Writes data to a file.
 * @param  string $data the word or sequence to be written to the file.
 */
  public function write($data)
  {
    if (!fwrite($this->file, $data)) {
      throw new Exception("Unable to write the file.");
    }
  }
/**
 * Closes the file. 
 */
  public function close()
  {
    if (!fclose($this->file)) {
      throw new Exception("Unable to close the file");
    }
  }
/**
 * Returns the file property.
 * @return Resource the handle on the file.
 */
  public function getFileResource()
  {
    return $this->file;
  }
/**
 * Checks to make sure the file is of type Resource.
 * @return boolean
 */
  protected function isValidResource()
  {
    return is_resource($this->file) ? true : false;
  }
}