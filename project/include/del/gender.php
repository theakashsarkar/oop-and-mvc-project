<?php

class gender extends base {
    public $id;
    public $name;
    public $description;

    public function insert() {
        $sql = "INSERT INTO gender(name,description) VALUES('" . $this->name . "','" . $this->description . "')";
        return $this->execute( $sql );
    }
    public function Update() {
        $sql = "UPDATE gender SET name='" . $this->name . "',description ='" . $this->description . "' WHERE id =". $this->id;
        return $this->execute( $sql );
    }
    public function Delete(){
        $sql = "DELETE FROM gender WHERE id=".$this->id;
        return $this->execute($sql);
    }
    public function SelectById() {
        $sql = "SELECT id,name,description FROM gender  WHERE id =" . $this->id;
        return $this->fillObject( $sql );
    }
    public function Select() {
        $sql = "SELECT id,name,description  FROM gender";
        return $this->executeTable( $sql );

    }
}