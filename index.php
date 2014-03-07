<?
include("header.php");
$p = $_GET['p'];
if(!isset($p)) 
$p="home";

include("pages/".$p.".php");
include("footer.php");
?>