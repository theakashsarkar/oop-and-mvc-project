<?php
$com = new commodityConditon();
$errName = "";
$errDescription = "";
$errRating = "";

if ( isset( $_POST['submit'] ) ) {
    $com->fillData();
    $error = 0;
    if ( $com->name == '' ) {
        $error++;
        $errName = 'Required';
    }
    if ( $com->description == '' ) {
        $error++;
        $errDescription = 'Required';
    }
    if ( $com->rating == '' ) {
        $error++;
        $errRating = 'Required';
    }
    if ( $error == 0 ) {
        if ($cnt->Insert()) {
            print $html->success("comodity Save");
            $com = new commodityConditon();
        }else{
            print $html->error($com->error);
        }
    }
}
$html->formStart();
$html->text( "name", $com->name, $errName );
$html->textArea("description",$com->description,$errDescription);
$html->text('Rating',$com->rating,$errRating);
$html->submit( "submit", 'create' );
$html->formEnd();
?>

