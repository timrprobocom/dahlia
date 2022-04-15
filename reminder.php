<?php
require_once('base.inc.php');

$qry = $db->query("SELECT name,email FROM users;" );
$subject = "Dahlia Duke-Out Reminder";
$headers = array(
    "From: Dahlia Duke-Out <timr@probo.com>",
    "Content-Type: text/plain"
);

$message = <<<END
Remember to vote in the Dahlia Duke-Out!  Today is day number $day,
and it promised to be an exciting battle.

Go to http://timr.4roberts.us/dahlia to get the link for today's vote.
END;

while( $row = $qry->fetch_object() )
{
    if( substr($row->name,0,3) != "Tim" )
        continue;
    $to = "$row->name <$row->email>";
    mail( $to, $subj, $msg, $headers );
}
?>
