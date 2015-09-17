<?php
/**
 * Changelog
 */

$parallax_one = wp_get_theme( 'parallax-one' );

?>
<div class="parallax-one-tab-pane" id="changelog">

	<div class="prallax-one-tab-pane-center">
	
		<h1>Parallax One <?php if( !empty($parallax_one['Version']) ): ?> <sup id="parallax-one-theme-version"><?php echo esc_attr( $parallax_one['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	$parallax_one_changelog_file = @fopen(get_template_directory().'/CHANGELOG.md', 'r');
	if($parallax_one_changelog_file) {
		while(!feof($parallax_one_changelog_file)) {

			$parallax_one_changelog_line = fgets($parallax_one_changelog_file);

			if( !empty($parallax_one_changelog_line) ) {
				$parallax_one_changelog_line_substr = substr($parallax_one_changelog_line, 0, 3);

				if( !empty($parallax_one_changelog_line_substr) ){
					if( strcmp($parallax_one_changelog_line_substr,'###') == 0) {
						?>
						<hr />
						<h1><?php echo substr($parallax_one_changelog_line, 3); ?></h1>
						<?php
					}
					else {
						echo $parallax_one_changelog_line.'<br>';
					}
				}

			}

		}
		fclose($parallax_one_changelog_file);
	}


?>
	
</div>