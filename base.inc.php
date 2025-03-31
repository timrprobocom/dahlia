<?php
$db = new mysqli('db.timr.probo.com','timrprobocom','web7cal','dahlias');
$title = "2025 Dahlia Duke-out";
$start = mktime(6,0,0,4,15,2025);
$today = time();
if( $today < $start )
    $day = 0;
else
    $day = intdiv(($today-$start), 86400)+1;
$regions = [ "Northwest", "Southwest", "Northeast", "Southeast" ];

if( $day <= 16 )
    $round = "First Round";
else if( $day <= 24 )
    $round = "Sweet Sixteen";
else if( $day <= 28 )
    $round = "Elite Eight";
else if( $day <= 30 )
    $round = "Final Four";
else 
    $round = "Championship";

function display($row, $score=0, $vote=0)
{
    global $day;
    echo <<<STOP
<table class=bulb>
  <tr>
    <td align=center valign=middle width=25%>
       <a href='/dahlia/full/$row->image'>
         <img src='/dahlia/75/$row->image'>
       </a>
    </td>
    <td>
       <span class=name>$row->seed. $row->name</span>
STOP;
    if( $score )
        echo "<span class=name style='float: right'>$score</span>";
    $bscore = max($row->tgscore,$row->benchscore);
    echo <<<STOP
    <br>
    Description: $row->pedigree</br>
    Orignator: $row->originator</br>
    Score: $bscore<br>
STOP;
    $awards = [];
    if( $row->dudley )
        $awards[] = "Dudley";
    if( $row->hart )
        $awards[] = "Hart";
    if( $row->gulliksen )
        $awards[] = "Gullikson";
    if( !empty($awards) )
        echo "Awards: " . implode(", ", $awards);
    echo "</td>\n";
    if( $vote )
    {
        echo "    <td width=20%>\n";
        echo "      <button onClick='return vote($day,$row->oid)' class='bigbtn'>Vote!</button>\n";
        echo "    </td>\n";
    }
    echo " </tr>\n";
    echo "</table>\n";
}

function dummy()
{
    echo <<<STOP
<table class=bulb>
  <tr>
    <td align=center valign=middle width=25%>
       &nbsp;
    </td>
    <td>
       &nbsp;
    </td>
  </tr>
</table>
STOP;
}

function is_user($username)
{
    global $db;
    $qry = $db->prepare("SELECT name FROM users WHERE username=?;");
    $qry->bind_param("s", $username);
    $qry->execute();
    return $qry->get_result()->num_rows == 1;
}

function getgame($day)
{
    global $db;
    $info = new stdClass();
    $info->day = $day;
    $game = $db->query("SELECT * FROM games WHERE id=$day");
    $game = $game->fetch_object();
    $info->game = $game;
    if( $game->team1 == 0 )
        return FALSE;
    $t1 =  $db->query("SELECT * FROM dahlias WHERE oid = $game->team1;");
    $t1 = $t1->fetch_object();
    $t2 =  $db->query("SELECT * FROM dahlias WHERE oid = $game->team2;");
    $t2 = $t2->fetch_object();
    if( ($game->score1 > $game->score2) || 
        (($game->score1 == $game->score2) && ($t1->seed <= $t2->seed) ) )
    {
        $info->winner = $t1;
        $info->loser = $t2;
    }
    else
    {
        $info->winner = $t2;
        $info->loser = $t1;
    }
    $info->wscore = max($game->score1, $game->score2);
    $info->lscore = min($game->score1, $game->score2);
    return $info;
}
?>
