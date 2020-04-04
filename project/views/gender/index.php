<h1>Gender Dashbord</h1>
<?php
$html->BlockLink('?controller=gender&view=create','create New');
$gn = new gender();
if(isset($_GET['id'])){
    print $gn->makeDelete($_GET['id']);
}
$html->Table( $gn->Select(), $controller );

