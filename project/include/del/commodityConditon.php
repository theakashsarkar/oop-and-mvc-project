<?php
class commodityConditon extends base {
    public $id;
    public $name;
    public $description;
    public $rating;

    public function Insert() {
        $sql = "INSERT INTO commodityConditon(name,description,rating)  VALUES('" . $this->name . "','" . $this->description . "','.$this->rating.')";
        return $this->execute( '$sql' );
    }
    public function Update() {
        $sql = "UPDATE commodityConditon SET  name='" . $this->name . "', description='" . $this->description . "', rating ='" . $this->rating . "' WHERE id =" . $this->id;
        return $this->execute( '$sql' );
    }
    public function Delete() {
        $sql = "DELETE FROM commodityConditon  WHERE id =" . $this->id;
        return $this->execute( $sql );
    }
    public function SelectById() {
        $sql = "SELECT id,name,description,rating FROM commodityConditon  WHERE id =" . $this->id;
        return $this->fillObject( $sql );
    }
    public function Select() {
        $sql = "SELECT id,name,description,rating FROM commodityConditon";
        if ( $this->search != "" ) {
            $sql .= " WHERE name like '%" . $this->search . "%'";
        }
        return $this->executeTable( $sql );

    }
}