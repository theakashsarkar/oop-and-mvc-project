<?php
$dbconnect = mysqli_connect( "localhost", "root", "", "project" );
include 'include/htmlHelper.php';
include 'include/del/base.php';
include 'include/del/city.php';
include "include/del/country.php";
include 'include/del/gender.php';
include 'include/del/users.php';
include 'include/del/location.php';
include 'include/del/commodityConditon.php';
$html = new htmlHelper();
$controller = "home";
$view = "index";
$layout = "adminLayout";

if ( isset( $_GET['controller'] ) ) {
    $controller = $_GET['controller'];
}
if ( isset( $_GET['view'] ) ) {
    $view = $_GET['view'];
}
function pageTitle() {
    global $controller, $view;
    print '<span class="pageTitle"><b>' . ucwords( $controller ) . '</b>|<i>' . ucwords( $view ) . '</i></span>';
}
include 'views/layout/' . $layout . '.php';
function renderBody() {
    global $controller, $html, $view, $layout,$dbconnect;
    $fp = 'views/' . $controller . '/' . $view;
    pageTitle();
    if ( file_exists( $fp . '.php' ) ) {

        include $fp . '.php';
    } else if ( file_exists( $fp . '.html' ) ) {
        include $fp . '.html';
    } else {
        include 'views/warning.php';
    }
}
?>
