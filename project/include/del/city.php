<?php
class city extends base {
    public $id;
    public $name;
    public $countryId;

    public function insert() {
        $sql = "INSERT INTO city(name,countryId) VALUES('" . $this->name . "','" . $this->countryId . "')";
        return $this->execute( $sql );

    }
    public function Update() {

        $sql = "UPDATE city SET name ='" . $this->name . "', countryId='" . $this->countryId . "' WHERE id =" . $this->id;
        return $this->execute( $sql );

    }
    public function Delete() {
        $sql = "DELETE FROM city  WHERE id =" . $this->id;
        return $this->execute( $sql );
    }
    public function SelectById() {
        $sql = "SELECT id,name,countryId FROM city  WHERE id =" . $this->id;
        $this->fillObject( $sql );

    }
    public function Select() {
        $sql = "SELECT ct.id,ct.name,cn.name AS country FROM city AS ct LEFT JOIN country AS cn ON ct.countryId = cn.id WHERE ct.id > 0";
        return $this->executeTable($sql);
        if($this->search != ""){
            $sql .= "and ct.name like '%".$this->search."%'";
        }
        if($this->countryId > 0){
            $sql .= "and cn.id =".$this->countryId;
        }
    }
}