<?php
require_once('base.inc.php');
$region = $_GET["region"];
$rows = $db->query("SELECT * FROM dahlias WHERE division='$region' ORDER BY seed;");
include("header.inc.php");
?>
<ul>
<li><a href="region.php?region=North">North Region</a>
<li><a href="region.php?region=West">West Region</a>
<li><a href="region.php?region=South">South Region</a>
<li><a href="region.php?region=East">East Region</a>
</ul>

<h2><?=$region?> Region</h2>
<?php
while( $row = $rows->fetch_object() )
{
    display($row);
}
?>

<?php include('footer.inc.php');

