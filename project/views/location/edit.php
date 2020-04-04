<?php
$loc = new location();
$loc->id = $_GET['id'];
$errName = "";

if ( isset( $_POST['submit'] ) ) {
    $loc->fillData();
    $error = 0;
    if ( $loc->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if ( $error == 0 ) {
        $loc->id = $_GET['id'];
        if ($loc->Update()) {
            print $html->success("City Update");
            
        }else{
            print $html->error($loc->error);
        }
    }
}
else{
  
    $loc->SelectById();
}
$html->formStart();
$html->text( "name", $loc->name, $errName );
$ct = new city();
$html->Select("city",$ct->Select(),$loc->cityId);
$html->submit( "submit", "update" );
$html->formEnd();
?>