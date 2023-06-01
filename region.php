<?php
require_once('base.inc.php');
include("header.inc.php");
$region = $_GET["region"];
$seeds = array_key_exists("seeds",$_GET);
$rows = $db->query("SELECT * FROM dahlias ORDER BY seed;");

if( !$seeds )
{
    $teams = array();
    while( $row = $rows->fetch_object() )
        $teams[$row->oid] = $row;
    
    if( $region == 'final4' )
    {
        $rows = $db->query("SELECT * FROM games WHERE id >= 29 ORDER BY id;");
    }
    else
    {
        $also = substr($region,0,5);
        $rows = $db->query("SELECT * FROM games WHERE division IN ('$region','$also') ORDER BY id;");
    }
}
else
{
    $teams = [];
    while( $row = $rows->fetch_object() )
        $teams[] = $row;
}
?>
<ul>
<?php foreach( $regions as $rgn ) { ?>
<li><a href="region.php?region=<?=$rgn?>"><?=$rgn?> Region</a>
<?php } ?>
<li><a href="region.php?region=final4">Final Four</a>
<li><a href="index.php">Back to top</a>
</ul>
<p>
The number at the upper right of each box is the number of votes in that round.

<?php
if( $region == "final4" )
    echo "<h2>Final Four</h2?>\n";
else
    echo "<h2>$region Region</h2>\n";

if( !$seeds )
{
    echo "<table valign=top><tr>\n";
    if( $region != "final4" ) {
        echo "<td class='one'>\n";
        for( $i = 0; $i < 4; $i++ )
        {
            $game = $rows->fetch_object();
            display( $teams[$game->team1], $game->score1 );
            display( $teams[$game->team2], $game->score2 );
        }
    }
    echo "</td><td class='two'>\n";
    for( $i = 0; $i < 2; $i++ )
    {
        $game = $rows->fetch_object();
        if( $game->team1 > 0 )
            display( $teams[$game->team1], $game->score1 );
        else
            dummy();
        echo "&nbsp;";
        if( $game->team2 > 0 )
            display( $teams[$game->team2], $game->score2 );
        else
            dummy();
        echo "&nbsp;";
    }

    echo "</td><td class='three'>\n";
    $game = $rows->fetch_object();
    if( $game->team1 > 0 )
        display( $teams[$game->team1], $game->score1 );
    else
        dummy();
        echo "&nbsp;";
    if( $game->team2 > 0 )
        display( $teams[$game->team2], $game->score2 );
    else
        dummy();

    echo "</td><td class='four'>\n";
    if( ($game->score1 == 0) || ($day <= $game->id)  || ($day == 31 && $region == 'final4'))
        dummy();
    else if( $game->score1 >= $game->score2 )
        display( $teams[$game->team1] );
    else
        display( $teams[$game->team2] );
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

