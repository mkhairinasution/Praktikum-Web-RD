<?php

	global $con;

	$con = mysqli_connect('localhost','root','','NasutionKopi');

	if(!$con)
	{
		echo 'Tidak dapat terhubung ke database';
		die();
	}