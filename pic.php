<?php

$db = new mysqli('db.timr.probo.com','timrprobocom','web7cal','dahlias');
$nbr = substr($_SERVER->PATH_INFO,1);
$row = $db->query("SELECT * FROM dahlias WHERE oid=$nbr;")->fetch_object;
?>
<body>
<table>
<tr><td>Name:</td><td><?=$row->name?></td></tr>
<tr><td>Orig:</td><td><?=$row->originator?></td></tr>
<tr><td>Seed:</td><td><?=$row->division.' '.$row->seed?></td></tr>
<tr><td>Pic:</td><td><img src='/dahlia/75/<?=$row->image?>'></td></tr>
</tr>
</table>
</body>
