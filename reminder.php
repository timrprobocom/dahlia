<?php
require_once('base.inc.php');

$special = '';
if( $day == 0 || $day > 31 )
    exit;
else if( $day == 25 )
    $special = "Today starts the Elite Eight round -- we're getting closer to the finish!\n";
else if( $day == 29 )
    $special = "We've now entered the Final Four.  There's a menu item on the main page to see the Final Four brackets.\n";
else if( $day == 31 )
    $special = "This is it -- the big championship matchup!\n";

$qry = $db->query("SELECT * FROM users;" );
$subject = "Dahlia Duke-Out Reminder";
$headers = 
    "From: Dahlia Duke-Out <timr@probo.com>\r\n" .
    "Content-Type: text/plain\r\n";

$message = <<<END
Remember to vote in the Dahlia Duke-Out!  Today is day number $day,
and it promises to be another exciting battle.

$special
Go to http://timr.4roberts.us/dahlia/game.php?un=XXXXX to vote on
today's contest.
END;

while( $row = $qry->fetch_object() )
{
    $to = "$row->name <$row->email>";
    $user = str_replace( " ", "%20", $row->username );
    $m1 = str_replace( "XXXXX", $user, $message );
    mail( $to, $subject, $m1, $headers );
}
?>
