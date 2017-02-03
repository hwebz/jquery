<?php include '_partials/header.php'; ?>

<h1>Search Actors By Last Name</h1>
<form id="actor-selection" action="index.php" method="post">
	<select name="q" id="q">
		<?php 
			$alphabet = str_split('abcdefghiklmnopqrstuyvwxyz');
			foreach($alphabet as $letter) {
				echo "<option value='{$letter}'>{$letter}</option>";
			}
		?>
	</select>
	<input type="submit" value="Search">
</form>


<ul class="actors_list">
	<?php if (isset($actors)) : ?>
		<?php foreach($actors as $a) {
			echo "<li data-actor-id='{$a->actor_id}' ><a href='actor.php?actor_id={$a->actor_id}'>{$a->first_name} {$a->last_name}</a></li>";
		} ?>
	<?php endif; ?>
</ul>

<script id="actor_list_template" type="text/x-handlebars-template">
	{{#each this}}
		<li data-actor-id="{{actor_id}}">
			<a href="actor.php?actor_id={{actor_id}}">{{fullName this}}</a>
		</li>
	{{/each}}
</script>

<div class="actor_info">
	<script id="actor_info_template" type="text/x-handlebars-template">
		<p>{{info}}</p>
		<span class="close">X</span>
	</script>
</div>

<?php include '_partials/footer.php'; ?>