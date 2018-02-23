<?php

class Caps {

  static public $database;

  static public function set_database($database) {
    self::$database = $database;
  }

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

}

 ?>
