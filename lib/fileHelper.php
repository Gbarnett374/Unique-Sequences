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

  public function open()
  {
    $this->file = fopen($this->location, $this->option);

    if (!$this->isValidResource()) {
      throw new Exception("Not a valid resource.");
    }
  }

  public function readLine()
  {
    return $line = fgetcsv($this->file);
  }

  public function write($data)
  {
    if (!fwrite($this->file, $data)) {
      throw new Exception("Unable to write the file.");
    }
  }

  public function close()
  {
    if (!fclose($this->file)) {
      throw new Exception("Unable to close the file");
    }
  }

  public function getFileResource()
  {
    return $this->file;
  }
  
  protected function isValidResource()
  {
    return is_resource($this->file) ? true : false;
  }
}