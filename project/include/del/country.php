<?php
class country extends base {
    public $id;
    public $name;

    public function insert() {
        $sql = "INSERT INTO country(name) VALUES('" . $this->name . "')";
        return $this->execute( $sql );

    }
    public function Update() {

        $sql = "UPDATE country SET name ='" . $this->name . "' WHERE id =" . $this->id;
        return $this->execute( $sql );

    }
    public function Delete() {
        $sql = "DELETE FROM country  WHERE id =" . $this->id;
        return $this->execute( $sql );
    }
    public function SelectById() {
        $sql = "SELECT id,name FROM country  WHERE id =" . $this->id;
        return $this->fillObject( $sql );
    }
    public function Select() {
        $sql = "SELECT id,name FROM country";
        if ( $this->search != "" ) {
            $sql .= " WHERE name like '%" . $this->search . "%'";
        }
        return $this->executeTable( $sql );

    }
}