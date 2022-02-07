<?php
require_once("base.inc.php");
include('header.inc.php');

$name = "";
$email = "";

if( array_key_exists('button',$_REQUEST) )
{
    // Make sure the username is unique.

    $qry = $db->prepare("SELECT * FROM users WHERE username=?");
    $qry->bind_param("s", $_REQUEST['username']);
    $qry->execute();
    if( $qry->num_rows > 0 )
    {
        $err = "That username is already taken.";
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'] ;
    }
    else
    {
        $qry = $db->prepare("INSERT INTO users VALUES (?,?,?);");
        $qry->bind_param("s", $_REQUEST['name']);
        $qry->bind_param("s", $_REQUEST['email']);
        $qry->bind_param("s", $_REQUEST['username']);
        $qry->execute();
        header('Location: /dahlia/index.php');
        exit();
    }
}

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
<form method=POST action=/dahlia/register.php>

<table>
<tr><th>Your name:</th>
    <td><input type=text name=name value="$name"></td></tr>
<tr><th>Your email:</th>
    <td><input type=text name=email value="$email"></td></tr>
<tr><th>Username:</th>
    <td><input type=text name=username></td></tr>
<tr><th></th>
    <td><input type=submit name=button></td></tr>
</form>

<?php include('footer.inc.php');
