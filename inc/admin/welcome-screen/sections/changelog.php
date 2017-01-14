<?php
/**
 * Changelog
 */

$ossy = wp_get_theme( 'ossy' );

?>
<div class="ossy-tab-pane" id="changelog">

	<div class="ossy-tab-pane-center">
	
		<h1>ossy <?php if( !empty($ossy['Version']) ): ?> <sup id="ossy-theme-version"><?php echo esc_attr( $ossy['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$ossy_changelog = $wp_filesystem->get_contents( get_template_directory().'/CHANGELOG.txt' );
	$ossy_changelog_lines = explode(PHP_EOL, $ossy_changelog);
	foreach($ossy_changelog_lines as $ossy_changelog_line){
		if(substr( $ossy_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($ossy_changelog_line,3).'</h1>';
		} else {
			echo $ossy_changelog_line,'<br/>';
		}
	}

	?>
	
</div>