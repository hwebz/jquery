<?php
	$f = fopen('data.txt', 'w');
	$data = $_POST['name'].','.$_POST['content'];
	fwrite($f, $data);
	fclose($f);
	echo 'Comment has been made';