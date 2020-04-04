<?php
$ct = new city();
$ct->id = $_GET['id'];
$errCountryId = "";
$errName = "";

if ( isset( $_POST['submit'] ) ) {
    $ct->fillData();
    $error = 0;
    if ( $ct->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if($ct->countryId == ''){
        $error++;
        $errCountryId = 'Required';
    }
    if ( $error == 0 ) {
        $ct->id = $_GET['id'];
        if ($ct->Update()) {
            print $html->success("City Update");
            
        }else{
            print $html->error($ct->error);
        }
    }
}
else{
  
    $ct->SelectById();
}
$html->formStart();
$html->text( "name", $ct->name, $errName );
$cnt = new country();
$html->Select("countryId",$cnt->Select(),$ct->countryId,$errCountryId);
$html->submit( "submit", "update" );
$html->formEnd();
?>