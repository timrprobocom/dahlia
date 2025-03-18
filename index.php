<?php
require_once("base.inc.php");
include('header.inc.php');

$game = -1;
if( $day > 1 )
    $last = getgame($day-1);
if( $day > 0 )
    $today = getgame($day);

$first = date("F j", $start);
$final = date("F j", $start+30*86400);
?>
<img class=right src="300/dahl-001.png">
<h3>Introduction</h3>

<p>
If the NCAA can have March Madness, then the Portland Dahlia Society can have
a "Dahlia Duke-Out".  This is a contest run strictly for fun to decide a
"People's Choice" winner from the 32 entries with the highest test garden scores
in the "Best of 2024" list.
Starting <?=$first?>, two entries from the list will be pitted against each
other.  You, the people, will vote on which one you like.  The winners of the
first round will then be pitted against each other, until we run through the
Elite Eight, the Final Four, and the Championship round on <?=$final?>.
<p>
The winner will be presented with the warm thoughts and admiration of the community.
<p>
Voting runs from 6 AM until 2 AM.  In order to vote, you must register
and get a username.  We do that to restrict the voting to one vote 
per person, because the stakes are so high.

<p>
If you have any questions or issues, please <a href="mailto:timr@probo.com">contact
the webmaster</a>.

<h3>Registration</h3>
To register your chosen username, which is the "ticket" to being able to vote, please
<a href="register.php">click here</a>,


<?php if( $day > 1 && $day <= 31 ) { ?>
<h3>Yesterday</h3>
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

<h3>Voting</h3>
<?php if( $day < 1 ) {
    echo "<p>Voting will begin on " . date('l, F j', $start) . ".\n";
} else if( $day > 31 ) {
    $last = getgame(31); 
    echo "<p>The competition is all over for this year.  Thanks for playing!\n";
}
else
{
    if( $round != "Championship" ) {
        $round .= " " . $last->game->division . " region";
    }
    echo "<p>Today is day $day.\n";
    echo "<p>To vote in today's game, <a href='game.php'> click here </a>.\n";
}
?>

<h3>Regions</h3>
<p>
The four regions are arbitrarily named after the four compass
quadrants, NW, NE, SW, and SE.  To view the list of "teams"
and their seeds, click these:

<ul>
<?php foreach( $regions as $region ) { ?>
<li><a href="region.php?region=<?=$region?>"><?=$region?> Region</a>
<?php } ?>
<li><a href="region.php?region=final4">Final Four</a>
</ul>

<h3>Methodology</h3>
<p>
If you're curious about how we set this up, here is a summary.
<p>
We started with the 75 entries in the Americal Dalia Society's "Best of
2024" list.  It turns out 75 is not a convenient number for a
bracket scheme, without having some "wild card" games.  In addition, we
didn't want this nonsense to last more than a month.  If you have N teams in
a single-elimination tournament, you need to have N-1 games to decide a winner.
That meant 64 was too many (two months), so we settled on 32.
<p>
So, we sorted the ADS "best of" list by their Trial Garden and Seedling
Bench Scores.  We took the top 32 entries, and those are the "teams" in our 
tournament.  To make it a little like March Madness, we divided the set up into 
four "regions".  The top four entries by score became the number 1 seeds in 
the four regions.  The next four entries by score became the number 2 seeds,
and so on.
<p>
The NCAA uses a very specific scheme to decide the first matchups.  They
want to make sure to give the top seeds as much chance as possible, so they
don't pit number 1 against number 2 right away.  Instead, their first 
round matches the number 1 seed with the number 8 seed,  number 2 plays 
number 7, number 3 plays number 6, and number 4 plays number 5.  We have
adopted the same system here.
<p>
In case of a tie, the entry with the better (lower) seed will be deemed
the winner.

<h3>Photo Credits</h3>
<img class=left src="150/dahl-logo.png">
The photos used on this web site came from the ADS New Introductions
announcement.  The photos are thanks to:
<p>
<table style="margin-left:100px"><tr>
<td valign=top width=40%>
Eric Anderson<br>
Alan Arrington<br>
Teresa Bergman<br>
Thomas Bloomquist<br>
Steve &amp; Sandy Boley<br>
Robert Eagle<br>
Jan Gawthrop<br>
Glenn Gitts
</td>
<td valign=top width=40%>
Ted Kennedy<br>
Peter Kruger<br>
Brittiny Lepage<br>
Wayne Lobaugh<br>
Michelle McDowell<br>
Steve Meggos<br>
April Morley<br>
Tammy Opalka<br>
Lou Paradise
</td>
<td valign=top width=40%>
Heather Ramsay<br>
Jerry Schoenauer<br>
Theresa Schroeder<br>
Diana Shandro<br>
Laia Solen<br>
Cammi Waggoner<br>
Colin Walker<br>
Connie Young-Davis
</td></tr></table>
<br><br>

<?php include('footer.inc.php');
