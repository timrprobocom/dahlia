<?php
require_once('base.inc.php');
include("header.inc.php");
$region = $_GET["region"];
$brackets = array_key_exists("brackets",$_GET);
$rows = $db->query("SELECT * FROM dahlias WHERE division='$region' ORDER BY seed;");

if( $brackets )
{
    $teams = array();
    while( $row = $rows->fetch_object() )
        $teams[$row->oid] = $row;
    
    if( $region == 'North' || $region == 'Wesst' )
        $also = 'Northwest';
    else
        $also = 'Southeast';
    $rows = $db->query("SELECT * FROM games WHERE division IN ('$region','$also') ORDER BY id;");
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
    echo "<table valign=top><tr>\n";
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
        echo "&nbsp;";
        if( $game->team2 > 0 )
            display( $teams[$game->team2] );
        else
            dummy();
        echo "&nbsp;";
    }

    echo "</td><td class='three'>\n";
    $game = $rows->fetch_object();
    if( $game->team1 > 0 )
        display( $teams[$game->team1] );
    else
        dummy();
        echo "&nbsp;";
    if( $game->team2 > 0 )
        display( $teams[$game->team2] );
    else
        dummy();

    echo "</td><td class='four'>\n";
    $game = $rows->fetch_object();
    if( $region == 'North' || $region == 'South' )
        $want = $teams[$game->team1];
    else
        $want = $teams[$game->team2];
    if( $want > 0 )
        display( $teams[$want] );
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

