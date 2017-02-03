<?php
	$f = fopen('data.txt', 'r');
	$content = fread($f, filesize('data.txt'));
	fclose($f);
	echo $content;