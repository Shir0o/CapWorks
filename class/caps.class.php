<?php

class Caps {

  static protected $database;

  static protected $table_name = 'caps';
  static protected $db_columns = ['id', 'brewer', 'name', 'type', 'country', 'color', 'othercolor', 'textcolor', 'rimcolor', 'text', 'opening'];

  public $id;
  public $brewer;
  public $name;
  public $type;
  public $country;
  public $color;
  public $othercolor;
  public $textcolor;
  public $rimcolor;
  public $text;
  public $opening;

  static public function set_database($database) {
    self::$database = $database;
  }

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) exit("Query failed");

    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = self::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static protected function instantiate($record) {
    $object = new self;
    foreach ($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }

    return $object;
  }

  static public function find_all() {
    $sql = "SELECT * FROM caps";

    return self::find_by_sql($sql);
  }
}

 ?>
