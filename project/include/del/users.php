<?php
class users extends base {
    public $id;
    public $name;
    public $contact;
    public $email;
    public $password;
    public $dob;
    public $genderId;
    public $address;
    public $cityId;
    public $images;
    public $type;
    public $dateTime;
    public $createIp;

    public function Insert() {
        $sql = "INSERT INTO users(name, contact, email, password, dob, genderId, address, cityId, images, type, dateTime, createIp)
        VALUES ('" . $this->name . "', '" . $this->contact . "',
         '" . $this->email . "', password('" . $this->password . "')," . $this->dob . ",
         " . $this->genderId . ", '" . $this->address . "', " . $this->cityId . ",
          '" . $this->images . "', '" . $this->type . "', '" . $this->dateTime . "', 
          '" . $this->createIp . "')";
        return $this->execute( $sql );
        print $sql;
    }
    public function Update() {
        $sql = "UPDATE users SET name ='" . $this->name . "',
        contact ='" . $this->contact . "',
        email ='" . $this->email . "',
        password = password('" . $this->password . "',
        dob =" . $this->dob . ",
        genderId =" . $this->genderId . ",
        address ='" . $this->address . "',
        cityId =" . $this->cityId . ",
        images ='" . $this->images . "',
        type ='" . $this->type . "',
        dateTime ='" . $this->dateTime . "',
        createIp = '" . $this->createIp . "' WHERE id =" . $this->id;
        return $this->execute( $sql );
    }
    public function Delete() {
        $sql = "DELETE FROM users WHERE id =" . $this->id;
    }
    public function SelectById() {
        $sql = "SELECT id,name, contact, email, password, dob, genderId, address, cityId, images, type, dateTime, createIp FROM users  WHERE id =" . $this->id;
        return $this->fillObject( $sql );
    }
    public function Select() {
        $sql = "SELECT u.id,u.name, u.contact, u.email, u.password, u.dob, g.name AS gender, u.address, ct.name AS cityId,cn.name AS country, u.images, u.type, u.dateTime, u.createIp
        FROM users AS u LEFT JOIN gender AS g ON u.genderId = g.id LEFT JOIN city AS ct ON u.cityId = ct.id LEFT JOIN country AS cn ON ct.countryId = cn.id";
        if ( $this->search != "" ) {
            $sql .= " WHERE (u.name like '%" . $this->search . "%' u.contact like '%" . $this->search . "%' u.email like '%" . $this->search . "%' u.addresse like '%" . $this->search . "%')";
        }
        if ( $this->genderId > 0 ) {
            $sql .= "AND g.id =" . $this->genderId;
        }
        if ( $this->cityId ) {
            $sql .= "AND ct.id =" . $this->cityId;
        }
        return $this->executeTable( $sql );

    }

}