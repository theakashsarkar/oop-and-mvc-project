<?php
$gn = new gender();
$errName = "";
$errDescription = "";
if ( isset( $_POST['submit'] ) ) {
    $gn->fillData();
    $error = 0;
    if ( $gn->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if ( $error == 0 ) {
        if ( $gn->insert() ) {
            print $html->success( "gender Save" );
            $gn = new gender();
        } else {
            print $html->error( $gn->error );
        }
    }
}
$html->formStart();
$html->text( "name", $gn->name, $errName );
$html->textArea( "Description", $gn->description);
$html->submit( "submit", 'create' );
$html->formEnd();
?>