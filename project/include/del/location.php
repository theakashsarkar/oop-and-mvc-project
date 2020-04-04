<?php

class location extends base {
    public $id;
    public $name;
    public $cityId;

    public function insert() {
        $sql = "INSERT INTO `location` ( `name`, `cityId`) VALUES('".$this->name."','".$this->cityId."') ";
        return $this->execute( $sql );
        print $sql;
    }
    public function Update() {
        $sql = "UPDATE  location SET name='" . $this->name . "', cityId='" . $this->cityId . "' WHERE id =" . $this->id;
        return $this->execute($sql);
    }
    public function Delete(){
       $sql ="DELETE FROM location WHERE id =".$this->id;
       return $this->execute($sql);
    }
    public function SelectById(){
        $sql = "SELECT id,name,cityId FROM location WHERE id =".$this->id;
        $this->fillObject($sql);
    }
    public function Select(){
        $sql = "SELECT loc.id,loc.name,ct.name AS city FROM location AS loc LEFT JOIN city AS ct ON loc.cityId = ct.id WHERE ct.id > 0";
        return $this->executeTable($sql);
        
    }

}