<?php
require_once('base.inc.php');

$game = $db->query("SELECT * FROM games WHERE id='$day'");
$game = $game->fetch_object();
$t1 =  $db->query("SELECT * FROM dahlias WHERE oid = $game->team1;");
$t1 = $t1->fetch_object();
$t2 =  $db->query("SELECT * FROM dahlias WHERE oid = $game->team2;");
$t2 = $t2->fetch_object();

function process()
{
    global $db;
    global $day;
    global $game;

# Which team did they vote for?
    $team = $_REQUEST['team'];

    if( $team == $game->team1 )
        $which = 1;
    else if( $team == $game->team2 )
        $which = 2;
    else
        return "Internal error; team number not from today.";

# Have they voted today?

    $qry = $db->prepare("SELECT * FROM users WHERE username=?;");
    $qry->bind_param( "s", $_REQUEST['username'] );
    $qry->execute();
    $user = $qry->get_result()->fetch_object();
    if( $user->votes[$day] != '-' )
        return "Sorry, you have already voted today.";

    $votes = $user->votes;
    $votes[$day-1] = $which;

    $qry = $db->prepare("UPDATE users SET votes=? WHERE username=?;");
    $qry->bind_param( "ss", $votes, $_REQUEST['username'] );
    $qry->execute();
    $qry->get_result();

    $db->query("UPDATE games SET score{$which}=score{$which}+1 WHERE id=$day;");
    header("Location: /dahlia/");
    exit;
}

if( array_key_exists( "team", $_REQUEST ) )
    $err = process();

include('header.inc.php' );
?>
<script>
function vote( day, team )
{
    var form = $("form:first");
    var new1 = $("<input type=hidden name='day' value='"+day+"'>")
    form.append( new1 )
    var new2 = $("<input type=hidden name='team' value='"+team+"'>")
    form.append( new2 )
    form.submit();
    return false;
}
</script>

<h2>Competition Day <?=$day?></h2>
<p>Today's <?=$round?> matchup finds us with an {adjective} battle between two
contenders in the <?=$game->division?>  Region.

<p>
Number <?=$t1->seed?> seed <?=$t1->name?> goes up against contender
number <?=$t2->seed?> seed <?=$t2->name?>.  You may click on the bloom image
to see a larger picture of the flower.
<p>
Enter your username here:
<form method=POST action="/dahlia/game.php">
<input type=text name='username'>
<p>
<span style='color: red'><?=$err?></span>
<p>
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
</form>

<?php include('footer.inc.php'); ?>
