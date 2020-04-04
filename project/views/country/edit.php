<?php
$cnt = new country();
$cnt->id = $_GET['id'];
$errName = "";

if ( isset( $_POST['submit'] ) ) {
    $cnt->fillData();
    $error = 0;
    if ( $cnt->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if ( $error == 0 ) {
        if ($cnt->Update()) {
            print $html->success("Country Update");
        } else {
            print $html->error($cnt->error);
        }
    }
} else {
     $cnt->id = $_GET['id'];
     $cnt->SelectById();
}
$html->formStart();
$html->text( "name", $cnt->name, $errName );
$html->submit( "submit", 'update' );
$html->formEnd();
?>

