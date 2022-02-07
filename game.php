<?php
require_once('base.inc.php');

$game = $db->query("SELECT * FROM games WHERE id='$day'");
$game = $game->fetch_object();
$t1 =  $db->query("SELECT * FROM dahlias WHERE oid = $game->team1;");
$t1 = $t1->fetch_object();
$t2 =  $db->query("SELECT * FROM dahlias WHERE oid = $game->team2;");
$t2 = $t2->fetch_object();

?>
<?php include('header.inc.php'); ?>

<h2>Competition Day <?=$day?></h2>
<p>Today's <?=$round?> matchup finds us with an {adjective} battle between two
contenders in the <?=$game->division?>  Region.

<p>
Number <?=$t1->seed?> seed <?=$t1->name?> goes up against contender
number <?=$t2->seed?> seed <?=$t2->name?>.  You may click on the bloom image
to see a larger picture of the flower.

Choose your favorite below by clicking the "Vote" button for your choice.
<br><br><br>
<table><tr><td width=40%>
<?php display($t1,1); ?>
</td>
<td width=20% align=center valign=middle><h2>vs</h2></td>
<td width=40%>
<?php display($t2,1); ?>
</td>
</tr></table>

<?php include('footer.inc.php'); ?>
