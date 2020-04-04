<?php
$gn = new gender();
$errName = "";
$gn->id = $_GET['id'];
if ( isset( $_POST['submit'] ) ) {
    $gn->fillData();
    $error = 0;
    if ( $gn->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if ( $error == 0 ) {
        $gn->id = $_GET['id'];
        if ($gn->Update()) {
            print $html->success("gender Update");
            
        }else{
            print $html->error($gn->error);
        }
    }
}
else{
    
    $gn->SelectById();
}
$html->formStart();
$html->text( "name", $gn->name, $errName );
$html->textArea("Description",$gn->description);
$html->submit( "submit", "update" );
$html->formEnd();
?>