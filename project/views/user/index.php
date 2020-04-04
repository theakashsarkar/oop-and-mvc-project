<h1>Users Dashbord</h1>
<?php
$html->BlockLink('?controller=user&view=create','Create Now');
$u = new users();
if ( isset( $_GET['id'] ) ) {
    print $u->makeDelete($_GET['id']);
}

$html->Table($u->Select(),$controller);