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
    fwrite($this->file, $data);
  }

  public function close()
  {
    fclose($this->file);
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