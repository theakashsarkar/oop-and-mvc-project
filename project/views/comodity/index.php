<h1>Comodinty Dashbord</h1>
<?php
$search = "";
if(isset($_POST['btnSearch'])){
    $search = $_POST['search'];
}
$html->BlockLink('?controller=comodity&view=create','Create Now');
$html->formStart();
$html->text('search',$search);
$html->submit('btnSearch','search');
$html->formEnd();
$com = new commodityConditon();
$com ->search = $search;
if ( isset( $_GET['id'] ) ) {
    print $com->makeDelete($_GET['id']);
}
$html->Table( $com->Select(), $controller );