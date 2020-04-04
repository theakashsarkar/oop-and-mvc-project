<?php
$ct = new city();
$errCountryId = "";
$errName = "";

if ( isset( $_POST['submit'] ) ) {
    $ct->fillData();
    $error = 0;
    if ( $ct->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if ( $ct->countryId == '' ) {
        $error++;
        $errCountryId = 'Required';
    }
    if ( $error == 0 ) {
        if ( $ct->insert() ) {
            print $html->success("city Save");
            $ct = new city();
        } else {
            print $html->error($ct->error);
        }
    }
}
$html->formStart();
$html->text( "name", $ct->name, $errName );
$cnt = new country();
$html->Select( "countryId", $cnt->Select(), $ct->countryId, $errCountryId );
$html->submit( "submit", 'create' );
$html->formEnd();
?>

