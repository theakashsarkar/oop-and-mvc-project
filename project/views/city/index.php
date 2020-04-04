<h1>City Dashbord</h1>
<?php
$search = "";
$country = "";
if(isset($_POST['btnSearch'])){
    $search = $_POST['search'];
    $country = $_POST['country'];
}
$html->BlockLink('?controller=city&view=create','Create Now');
$html->formStart();
$html->text('search',$search);
$cnt = new country();
$html->select('country',$cnt->Select(),$country);
$html->submit('btnSearch','search');
$html->formEnd();
$ct = new city();
$ct->serche = $search;
$ct->country = $country;
if ( isset( $_GET['id'] ) ) {
    print $ct->makeDelete($_GET['id']);
}

$html->Table($ct->Select(),$controller);