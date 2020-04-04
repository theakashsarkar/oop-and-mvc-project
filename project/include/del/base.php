<?php
class base {
    public $error;
    public $dbConnected;
    public $search;

    public function __construct() {
        $this->dbConnected = mysqli_connect( "localhost", "root", "", "project" );
    }
    public function execute( $sql ) {
        return mysqli_query( $this->dbConnected, $sql );
        $this->error = mysqli_error( $this->dbConnected );
        return false;
    }
    public function fillObject( $sql ) {
        $table = mysqli_query( $this->dbConnected, $sql );
        while ( $row = mysqli_fetch_assoc( $table ) ) {
            foreach ( $row as $k => $v ) {
                $this->$k = $v;
            }
            return true;
        }
        $this->error = mysqli_error( $this->dbConnected );
        return false;
    }
    public function executeTable( $sql ) {
        $a = array();
        $table = $this->execute( $sql );
        while ( $row = mysqli_fetch_assoc( $table ) ) {
            $a[] = $row;
        }
        $this->error = mysqli_error( $this->dbConnected );
        return $a;
    }
    public function makeDelete( $value ) {
        $this->id = $value;
        if ( $this->Delete() ) {
            return 'Data Deleted';
        } else {
            $this->error;
        }
    }
    public function fillData() {
        foreach ( $_POST as $k => $v ) {
            if ( $k == "submit" ) {
                continue;

            }
            $this->$k = $v;

        }
    }

}