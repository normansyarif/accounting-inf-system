<?php

/**
 * Description of connect
 *
 * @author Norman Syarif
 */

$host = 'localhost';
$user = 'nord4259_admin';
$pass = 't6bmz9bkGbnq';
$db = 'nord4259_sia';

$mysqli = new mysqli($host, $user, $pass, $db);

if($mysqli->connect_errno) {
	echo 'gagal konek'.$mysqli->connect_error;
}

?>