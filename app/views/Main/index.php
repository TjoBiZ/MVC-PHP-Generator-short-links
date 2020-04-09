<section>
	<h1>The generator a short links</h1>
	<div class="row">
		<form id="generatorslinks" class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
					<label for="textarea2">Please, write your link:</label>
				</div>
			</div>
			<div class="center-align">
				<button id="sentlink" class="waves-effect waves-light btn-large" type="submit" name="action">Submit</button>
			</div>
		</form>
	</div>

	<div class="showlinks row">
		<div class="col s6 center-align link">Your full link:</div>
		<div class="col s6 center-align shortlink">Your short link:</div>
		<div class="col s6 center-align linkresult"></div>
		<div class="col s6 center-align shortlinkresult"></div>
	</div>
<?php
	if (DEBUG) {
		echo $shortlink . PHP_EOL; //This variable can use in template
		echo $link . PHP_EOL; //This variable can use in template
	}
	?>
</section>