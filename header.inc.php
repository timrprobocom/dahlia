<?php
header("Content-Type: text/html");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<html>
<head>
<link href="site.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source%20Serif%204">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
<div class='body'>
<h1><?=$title?></h1>
<hr>
