<?php
require_once("base.inc.php");

$err = "";
$name = "";
$email = "";

if( array_key_exists('button',$_REQUEST) )
{
    // Make sure the username is unique.

    if( is_user($_REQUEST['username']) )
    {
        $err = "That username is already taken.";
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'] ;
        return;
    }
    $qry = $db->prepare("INSERT INTO users (username,name,email) VALUES (?,?,?);");
    $qry->bind_param("sss", 
        $_REQUEST['username'],
        $_REQUEST['name'],
        $_REQUEST['email']);
    $qry->execute();

    # Send acknowledgement.

    $subject = "Dahlia Duke-Out Registration";
    $headers = 
        "From: Dahlia Duke-Out <timr@probo.com>\r\n" .
        "Content-Type: text/plain\r\n";

    $message = <<<END
<p>
Thanks for registering for the Dahlia Duke-Out!  Your sign-up is complete, with username "$_REQUEST[username]".

You may vote every day starting at 6:00 AM.

<p>
Please remember to check your spam folders for the reminder messages.
The messages come with the organizer&apo;s email address, which is probably unknown to
your email reader.
END;

    $to = "$_REQUEST[name] <$_REQUEST[email]>";
    mail( $to, $subject, $message, $headers );

    header('Location: /dahlia/index.php');
    exit();
}

include('header.inc.php');
?>
<img class=right src="300/dahl-0002.png">
<h3>Registration</h3>

<p>
To register for the <?=$title?>, you just need to have a username.  The
username can be whatever you want, as long as it is not already taken.
We also need your email address, so we can notify you of any issues. 
Your email would probably make a good username, since you can remember
it easily.

<p>
<span style='color: red'><?=$err?></span>
<form method=POST action=/dahlia/register.php>
<table>
<tr><th>Your name:</th>
    <td><input type=text name=name value="<?=$name?>"></td></tr>
<tr><th>Your email:</th>
    <td><input type=text name=email value="<?=$email?>"></td></tr>
<tr><th>Username:</th>
    <td><input type=text name=username></td></tr>
<tr><th></th>
    <td><input type=submit name=button value="Submit"></td></tr>
</table>
</form>

<a href="/dahlia/">Back to the top</a>

<?php include('footer.inc.php');
