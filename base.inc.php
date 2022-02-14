<?php
$db = new mysqli('db.timr.probo.com','timrprobocom','web7cal','dahlias');
$title = "Dahlia Duke-out";
$start = mktime(6,0,0,2,4,2022);
$today = time();
$day = intdiv(($today-$start), 86400);

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

function display($row, $vote=0)
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
       <span class=name>$row->seed. $row->name</span><br><br>
    Description: $row->pedigree</br>
    Orignator: $row->originator</br>
    Score: $row->tgscore<br>
STOP;
    if( $row->dudley )
        echo "Dudley Award\n";
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
?>
