<?php
require_once('base.inc.php');
include("header.inc.php");
###
$_GET['region'] = 'North';
$_GET['brackets'] = 1;
###
$region = $_GET["region"];
$brackets = array_key_exists("brackets",$_GET);
$rows = $db->query("SELECT * FROM dahlias WHERE division='$region' ORDER BY seed;");

if( $brackets )
{
    $teams = array();
    while( $row = $rows->fetch_object() )
        $teams[$row->oid] = $row;
    
    $rows = $db->query("SELECT * FROM games WHERE division='$region' ORDER BY id;");
}
else
{
    $teams = [];
    while( $row = $rows->fetch_object() )
        $teams[] = $row;
}
?>
<ul>
<li><a href="region.php?region=North">North Region</a>
<li><a href="region.php?region=West">West Region</a>
<li><a href="region.php?region=South">South Region</a>
<li><a href="region.php?region=East">East Region</a>
</ul>

<a href="region.php?region=<?=$region?>&brackets=1">With brackets</a>

<h2><?=$region?> Region</h2>
<?php
if( $brackets )
{
    echo "<table><tr>\n";
    echo "<td class='one'>\n";
    for( $i = 0; $i < 4; $i++ )
    {
        $game = $rows->fetch_object();
        display( $teams[$game->team1] );
        display( $teams[$game->team2] );
    }
    echo "</td><td class='two'>\n";
    for( $i = 0; $i < 2; $i++ )
    {
        $game = $rows->fetch_object();
        if( $game->team1 > 0 )
            display( $teams[$game->team1] );
        else
            dummy();
        if( $game->team2 > 0 )
            display( $teams[$game->team2] );
        else
            dummy();
    }
    echo "</td><td class='three'>\n";
    $game = $rows->fetch_object();
    if( $game->team1 > 0 )
        display( $teams[$game->team1] );
    else
        dummy();
    if( $game->team2 > 0 )
        display( $teams[$game->team2] );
    else
        dummy();
    echo "</td></tr></table>\n";
}
else 
{
    foreach( $teams as $row )
    {
        display($row);
    }
}
?>

<?php include('footer.inc.php');

