<?php include '_partials/header.php'; ?>

	<?php 
		if ($info) {
			echo "<h2>{$info->first_name} {$info->last_name}</h2>";
			echo "<p>{$info->film_info}</p>";
			echo "<p><a href='index.php'>Back</a></p>";
		} else {
			echo "<p>No result available!</p>";
		}
	?>

<?php include '_partials/footer.php'; ?>