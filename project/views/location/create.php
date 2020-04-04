<?php
$loc = new location();
$errCityId = "";
$errName = "";

if ( isset( $_POST['submit'] ) ) {
    $loc->fillData();
    $error = 0;
    if ( $loc->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if ( $loc->cityId == '' ) {
        $error++;
        $errCityId = 'Required';
    }
    if ( $error == 0 ) {
        if ( $loc->insert() ) {
            print $html->success("location Save");
            $loc = new location();
        } else {
            print $html->error($loc->error);
        }
    }
}
$html->formStart();
$html->text( "name", $loc->name, $errName );
$ct = new city();
$html->Select( "city", $ct->Select(), $loc->cityId, $errCityId );
$html->submit( "submit", 'create' );
$html->formEnd();
?>

