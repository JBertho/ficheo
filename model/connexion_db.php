<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=ficheo;charset=utf8', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getmessage());
}