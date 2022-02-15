<?php
require_once("base.inc.php");
include('header.inc.php');

$game = -1;
if( $day > 1 )
    $last = getgame($day-1);
if( $day > 0 )
    $today = getgame($day);
?>
<img class=right src="300/dahl-0000.png">
<h3>Introduction</h3>

<p>
If the NCAA can have March Madness, then the American Dahlia Society can have
a "Dahlia Duke-Out".  This is a contest run strictly for fun to decide a
"People's Choice" winner from the 32 top entries in the 2022 New Introductions
list.  Starting March 1, two entries from the list will be pitted against each
other.  You, the people, will vote on which one you like.  The winners of the
first round will then be pitted against each other, until we run through the
Elite Eight, the Final Four, and the Championship round on March 31.
<p>
The winner will be presented with a prestigious but meaningless "People's
Choice" trophy.

<p>
Voting runs from 6 AM until 2 AM.  In order to vote, you must register
and get a username.  We do that to restrict the voting to one vote 
per person, because the stakes are so high.  To get your username,
<a href="register.php">click here</a>,

<p>
If you have any questions or issues, please <a href="mailto:timr@probo.com">contact
the webmaster</a>.

<p>Today is day <?=$day?>.

<?php if( $day > 0 ) { ?>
<h3>Yesterday</h3>
<p>
In yesterday's <?=$last->game->division?> region battle,
#<?=$last->winner->seed?> seed <b><?=$last->winner->name?></b> defeated
#<?=$last->loser->seed?> seed <b><?=$last->loser->name?></b> by a score of 
<?=$last->wscore?> to <?=$last->lscore?>.  
<b><?=$last->winner->name?></b> will be advancing to the next round.
<?php } ?>

<h3>Voting</h3>
<p>
To vote in today's game, <a href="game.php"> click here </a>.

<h3>Regions</h3>
<p>
The four regions are arbitrarily named after the four compass
quadrants, NW, NE, SW, and SE.  To view the list of "teams"
and their seeds, click these:

<ul>
<?php foreach( $regions as $region ) { ?>
<li><a href="region.php?region=<?=$region?>"><?=$region?> Region</a>
<?php } ?>
</ul>

<h3>Methodology</h3>
<p>
If you're curious about how we set this up, here is a summary.
<p>
We started with the 85 entries in the Americal Dalia Society's 2022 New 
Introductions list.  It turns out 85 is not a convenient number for a
bracket scheme, without having some "wild card" games.  In addition, we
didn't want this nonsense to last more than a month.  If you have N teams in
a single-elimination tournament, you need to have N-1 games to decide a winner.
That meant 64 was too many (two months), so we settled on 32.
<p>
So, we sorted the ADS new introductions list by their Trial Garden Score. 
We took the top 32 entries, and those are the "teams" in our tournament.
To make it a little like March Madness, we divided the set up into four
"regions".  The top four entries by score became the number 1 seeds in 
the four regions.  The next four entries by score became the number 2 seeds,
and so on.
<p>
The NCAA uses a very specific scheme to decide the first matchups.  They
want to make sure to give the top seeds as much chance as possible, so they
don't pit number 1 against number 2 right away.  Instead, their first 
round matches the number 1 seed with the number 8 seed,  number 2 plays 
number 7, number 3 plays number 6, and number 4 plays number 5.  We have
adopted the same system here.

<h3>Photo Credits</h3>
<img class=left src="150/dahl-logo.png">
The photos used on this web site came from the ADS New Introductions
announcement.  The photos are thanks to:
<p>
<table width=50% style="margin-left:100px"><tr>
<td valign=top width=40%>
Teresa Bergman<br>
Claudia Biggs<br>
Michael Burns<br>
Tony Evangelista<br>
Brad Freeman<br>
Rich Gibson<br>
Debbie Hatt<br>
Ted Kennedy<br>
Eugene Kenyan
</td><td valign=top>
Wayne Lobaugh<br>
Dick Parshall<br>
Heather Ramsay<br>
Bob Romano<br>
Bob Schroeder<br>
John Spangenberg<br>
Linda Taylor</br>
Cammi Waggoner
</td></tr></table>
</div>

<?php include('footer.inc.php');
