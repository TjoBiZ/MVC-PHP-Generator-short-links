<section>
	<h1>The generator a short links</h1>
	<div class="row">
		<form class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
					<label for="textarea2">Please, write your link:</label>
				</div>
			</div>
			<div class="center-align">
				<button  class="waves-effect waves-light btn-large" type="submit" name="action">Submit</button>
			</div>
		</form>
	</div>

	<div class="showlinks row">
		<div class="col s6 center-align link">Your full link:</div>
		<div class="col s6 center-align shortlink">Your short link:</div>
		<div class="col s6 center-align link"><?php echo $link; ?></div>
		<div class="col s6 center-align shortlink"><?php echo $shortlink; ?></div>
	</div>
<?php
	if (DEBUG) {
		echo $shortlink . PHP_EOL;
		echo $link . PHP_EOL;
	}
	?>
</section>