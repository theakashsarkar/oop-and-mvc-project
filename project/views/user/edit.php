<?php
$u = new users();
$u->id = $_GET['id'];
$errName = "";
$errContact = "";
$errEmail = "";
$errPassword ="";
$errDob = "";
$errGenderId="";
$errAddress = "";
$errCityId ="";
$errType = "";
$errCreateIp = ""; 

if ( isset( $_POST['submit'] ) ) {
    $u->fillData();
    $error = 0;
    if ( $u->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if ( $u->contact == '' ) {
        $error++;
        $errContact = 'Required';
    }
    if ( $u->email == '' ) {
        $error++;
        $errContact = 'Required';
    }
    if ( $u->password == '' ) {
        $error++;
        $errPassword = 'Required';
    }
    if ( $u->dob == '' ) {
        $error++;
        $errDob = 'Required';
    }
    if ( $u->genderId == '' ) {
        $error++;
        $errGenderId = 'Required';
    }
    if ( $u->address == '' ) {
        $error++;
        $errAddress = 'Required';
    }
    if ( $u->cityId == '' ) {
        $error++;
        $errAddress = 'Required';
    }
    if ( $u->type == '' ) {
        $error++;
        $errType = 'Required';
    }
    if ( $u->createIp == '' ) {
        $error++;
        $errCreateIp = 'Required';
    }
    if ( $error == 0 ) {
        if ( $u->Update() ) {
            print $html->success("users Save");
        
        } else {
            print $html->error($u->error);
        }
    }
}
else{
    $u->SelectById();
}
$html->formStart();
$html->text( "name", $u->name, $errName );
$html->text( "contact", $u->contact, $errContact );
$html->text( "email", $u->email, $errEmail );
$html->password( "password", $u->password, $errPassword );
$html->Date( "dob", $u->dob, $errDob );
$g = new gender();
$html->Select( "genderId", $g->Select(), $u->genderId, $errGenderId );
$html->textArea( "address", $u->address, $errAddress );
$ct = new city();
$html->Select( "cityId",$ct->Select(), $u->cityId, $errCityId);
$html->text("images",$u->images);
$html->text("type",$u->type,$errType);
$html->text("DateTime",$u->dateTime);
$html->text("createIp",$u->createIp,$errCreateIp);
$html->submit( "submit", 'update' );
$html->formEnd();
?>
