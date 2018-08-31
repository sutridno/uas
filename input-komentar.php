<?php 

include 'rf-admin/application/controller/database.php';

if (isset($_POST['input_komentar'])) {
	$id_artikel	= $mysqli->real_escape_string($_POST['input_komentar']);
	$nama		= $mysqli->real_escape_string($_POST['nama']);
	$email		= $mysqli->real_escape_string($_POST['email']);
	$komentar	= $mysqli->real_escape_string($_POST['komentar']);

	$input_komentar = $mysqli->query("INSERT INTO tbl_komentar VALUES (NULL, '$id_artikel', '$nama', '$email', '$komentar', CURRENT_TIMESTAMP)");

	echo $mysqli->error;

	if ($input_komentar === TRUE) {
		header('location:view-artikel.php?id_artikel='.$id_artikel);
	}

}