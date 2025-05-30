<?php
require_once('base.inc.php');

if( $day <= 31 ) {

$game = $db->query("SELECT * FROM games WHERE id='$day'");
$game = $game->fetch_object();
$t1 =  $db->query("SELECT * FROM dahlias WHERE oid = $game->team1;");
$t1 = $t1->fetch_object();
$t2 =  $db->query("SELECT * FROM dahlias WHERE oid = $game->team2;");
$t2 = $t2->fetch_object();
$err = "";

if( $day > 1 )
    $last = getgame($day-1);
if( $day > 0 )
    $today = getgame($day);

$adjectives = [
     "an epic",
     "an exciting",
     "a breathtaking",
     "an edge-of-your-seat",
     "a polarizing",
     "a record-breaking",
     "a classic",
     "a spirited",
     "a high-stakes",
     "an all-out, wall-to-wall",
];

$adjective = $adjectives[array_rand($adjectives)];

$user = "";
if( array_key_exists('un', $_GET) )
    $user = $_GET['un'];

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

    if( $user->votes[$day-1] != '-' )
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
}

include('header.inc.php' );

if( $day > 31 )
{
    echo "<h2>All Done!</h2>\n";
    echo "<p>The competition is all over.  Thanks for playing!\n";
    exit();
}
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

// Ignore the enter key.

window.addEventListener('keydown',function(e){
    if( e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13)
    {
        if( e.target.nodeName=='INPUT' )
        {
            e.preventDefault();
            return false;
        }
    }
},true);
</script>

<?php if( $day > 1 && $day <= 31 ) { ?>
<h2>Yesterday</h2>
<p>
In yesterday's <?=$round ?> battle,
#<?=$last->winner->seed?> seed <b><?=$last->winner->name?></b> defeated
#<?=$last->loser->seed?> seed <b><?=$last->loser->name?></b> 
<?php
if( $last->wscore != $last->lscore )
{
    echo "by a score of $last->wscore to $last->lscore.";
}
else
{
    echo "by winning the tie breaker after a {$last->wscore}-{$last->lscore} tie.";
}
?>
<?php if( $day != 31 ) { ?>
<b>  <?=$last->winner->name?></b> will be advancing to the next round.
<?php 
    } 
} ?>

<h2>Competition Day <?=$day?></h2>
<p>Today's <?=$round?> matchup finds us with <?=$adjective?> battle between two
contenders in the <?=$game->division?>  Region.

<p>
Number <?=$t1->seed?> seed <?=$t1->name?> goes up against contender
number <?=$t2->seed?> seed <?=$t2->name?>.
<p>
<?=$t1->name?>:
<?=$t1->prose?>
<p>
<?=$t2->name?>:
<?=$t2->prose?>

<p>
Enter your username here:
<form method=POST action="/dahlia/game.php">
<input type=text name='username' value='<?=$user?>'>
<p>
<span style='color: red'><?=$err?></span>
<p>
Choose your favorite below by clicking the "Vote" button for your choice.

<br>
<table>
<td width=40%>
<?php display($t1,0,1); ?>
</td>
<td width=20% align=center valign=middle><h2>vs</h2></td>
<td width=40%>
<?php display($t2,0,1); ?>
</td>
</tr></table>
</form>

<h2>Back to Main Page</h2>
<p>If you'd like to go back to the main page or review the other brackets,
just <a href="/dahlia">click here</a>.

<?php include('footer.inc.php'); ?>
