<h1>Country Dashbord</h1>
<?php
$search = "";
if(isset($_POST['btnSearch'])){
    $search = $_POST['search'];
}
$html->BlockLink('?controller=country&view=create','Create Now');
$html->formStart();
$html->text('search',$search);
$html->submit('btnSearch','search');
$html->formEnd();
$cnt = new country();
$cnt ->search = $search;
if ( isset( $_GET['id'] ) ) {
    print $cnt->makeDelete($_GET['id']);
}
$html->Table( $cnt->Select(), $controller );