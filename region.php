<?php
require_once('base.inc.php');
$region = $_GET["region"];
$rows = $db->query("SELECT * FROM dahlias WHERE division='$region' ORDER BY seed;");
include("header.inc.php");
?>
<ul>
<li><a href="region.php?region=Beaverton">Beaverton Region</a>
<li><a href="region.php?region=Tigard">Tigard Region</a>
<li><a href="region.php?region=Gresham">Gresham Region</a>
<li><a href="region.php?region=Clackamas">Clackamas Region</a>
</ul>

<h2><?=$region?> Region</h2>
<?php
while( $row = $rows->fetchArray() )
{
    display($row);
}
?>

<?php include('footer.inc.php');

