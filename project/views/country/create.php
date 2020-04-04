<?php
$cnt = new country();
$errName = "";

if ( isset( $_POST['submit'] ) ) {
    $cnt->fillData();
    $error = 0;
    if ( $cnt->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if ( $error == 0 ) {
        if ($cnt->insert()) {
            print $html->success("Country Save");
            $cnt = new country();
        }else{
            print $html->error($cnt->error);
        }
    }
}
$html->formStart();
$html->text( "name", $cnt->name, $errName );
$html->submit( "submit", 'create' );
$html->formEnd();
?>

