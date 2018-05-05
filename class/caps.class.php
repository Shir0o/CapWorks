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
      if(!$result)
          exit("Query failed");

      $object_array = [];
      while($record = $result->fetch_assoc())
          $object_array[] = self::instantiate($record);


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

  static public function find_by_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . $id . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  public function attributes() {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  public function update() {
    // $attribute_pairs = [];
    // $attribute_pairs[0] = "brewer='" . $this->brewer . "'";
    // $attribute_pairs[1] = "name='" . $this->name . "'";

    $attributes = $this->attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE CAPS SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "'";
    $sql .= " LIMIT 1;";
    $result = self::$database->query($sql);

    $firephp = FirePHP::getInstance(true);
    $firephp->log($sql);

    return $result;
  }

  public function update_by_sql($sql) {
      $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "'";
      $sql .= " LIMIT 1;";
      $result = self::$database->query($sql);

      return $result;
  }

  public function select_by_sql($sql) {
      $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "'";
      $sql .= " LIMIT 1;";
      $result = self::$database->query($sql);
      if(!$result)
          exit("Query failed");

      return $result->fetch_assoc();
}

  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}

 ?>
