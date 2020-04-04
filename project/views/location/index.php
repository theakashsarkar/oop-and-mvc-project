<h1>Location  Dashbord</h1>
<?php
$search = "";
$city = "";
if(isset($_POST['btnSearch'])){
    $search = $_POST['search'];
    $city = $_POST['city'];
}
$html->BlockLink('?controller=location&view=create','Create Now');
$html->formStart();
$html->text('search',$search);
$ct = new city();
$html->select('city',$ct->Select(),$city);
$html->submit('btnSearch','search');
$html->formEnd();
$loc = new location();
$loc->serche = $search;
$loc->city = $city;
if ( isset( $_GET['id'] ) ) {
    print $loc->makeDelete($_GET['id']);
}

$html->Table($loc->Select(),$controller);