<?php


class News {
    public $id;
    public $name;
    public $date_create;
    public $image;
    public $description;


    public static function find_all_news() {
        return self::find_this_query("SELECT * FROM news");
    }

    public static function find_news_by_id($news_id) {
        global $database;
        $the_result_array = self::find_this_query("SELECT * FROM news WHERE id = $news_id LIMIT 1");
        return  !empty($the_result_array) ? array_shift($the_result_array) : false ;
        return $found_news;
    }

    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self::instantation($row);
        }
        return $the_object_array;
    }

    public static function instantation($fthe_record) {
        $the_object = new self;
        foreach ($fthe_record as $the_attribute => $value) {
            if($the_object->has_the_attrubte($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    private function has_the_attrubte($the_attribute){
        $object_propertis = get_object_vars($this);
        return array_key_exists($the_attribute, $object_propertis);
    }

    public function  create() {
        global $database;
        $sql = "INSERT INTO news (name, date_create, image, description)";
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->name) . "', '";
        $sql .= $database->escape_string($this->date_create) . "', '";
        $sql .= $database->escape_string($this->image) . "', '";
        $sql .= $database->escape_string($this->description) . "')";
        if($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }
    }
    public function update() {
        global $database;
        $sql = "UPDATE news SET ";
        $sql .= "name= '" . $database->escape_string($this->name) ."',";
        $sql .= "description= '" . $database->escape_string($this->description) ."',";
        $sql .= "image= '" . $database->escape_string($this->image) ."',";
        $sql .= "date_create= '" . $database->escape_string($this->date_create) ."' ";
        $sql .= " WHERE id= " . $database->escape_string($this->id) ;

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
    public function delete() {
        global $database;
        $sql = "DELETE FROM news";
        $sql .= " WHERE id=" . $database->escape_string($this->id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
    public function redirect($New_Location){
        header("Location:".$New_Location);
        exit;
    }
    public static function pagination($limit, $offset) {
        return self::find_this_query("SELECT * FROM news LIMIT $limit OFFSET $offset");
    }
}
?>