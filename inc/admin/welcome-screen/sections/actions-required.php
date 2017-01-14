<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="ossy-tab-pane">

    <h1><?php esc_html_e( 'Actions recommend to make this theme look like in the demo.' ,'ossy' ); ?></h1>

    <!-- NEWS -->
    <hr />

	<?php
	global $ossy_required_actions;

	if( !empty($ossy_required_actions) ):

		/* ossy_show_required_actions is an array of true/false for each required action that was dismissed */
		$ossy_show_required_actions = get_option("ossy_show_required_actions");
		$action_number = 1;
		foreach( $ossy_required_actions as $ossy_required_action_key => $ossy_required_action_value ):
			if(@$ossy_show_required_actions[$ossy_required_action_value['id']] === false) continue;
			if(@$ossy_required_action_value['check']) continue;
			?>
			<div class="ossy-action-required-box">
				<span class="dashicons dashicons-no-alt ossy-dismiss-required-action" id="<?php echo $ossy_required_action_value['id']; ?>"></span>
				<h4><?php echo $action_number; ?>. <?php if( !empty($ossy_required_action_value['title']) ): echo $ossy_required_action_value['title']; endif; ?></h4>
				<p><?php if( !empty($ossy_required_action_value['description']) ): echo $ossy_required_action_value['description']; endif; ?></p>
				<?php
					if( !empty($ossy_required_action_value['plugin_slug']) ):
						?><p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='.$ossy_required_action_value['plugin_slug'] ), 'install-plugin_'.$ossy_required_action_value['plugin_slug'] ) ); ?>" class="button button-primary"><?php if( !empty($ossy_required_action_value['title']) ): echo $ossy_required_action_value['title']; endif; ?></a></p><?php
					endif;
				?>

				<hr />
			</div>
			<?php
			$action_number ++;
		endforeach;
	endif;

	$nr_actions_required = 0;

	/* get number of required actions */
	if( get_option('ossy_show_required_actions') ):
		$ossy_show_required_actions = get_option('ossy_show_required_actions');
	else:
		$ossy_show_required_actions = array();
	endif;

	if( !empty($ossy_required_actions) ):
		foreach( $ossy_required_actions as $ossy_required_action_value ):
			if(( !isset( $ossy_required_action_value['check'] ) || ( isset( $ossy_required_action_value['check'] ) && ( $ossy_required_action_value['check'] == false ) ) ) && ((isset($ossy_show_required_actions[$ossy_required_action_value['id']]) && ($ossy_show_required_actions[$ossy_required_action_value['id']] == true)) || !isset($ossy_show_required_actions[$ossy_required_action_value['id']]) )) :
				$nr_actions_required++;
			endif;
		endforeach;
	endif;

	if( $nr_actions_required == 0 ):
		echo '<p>'.__( 'Hooray! There are no required actions for you right now.','ossy' ).'</p>';
	endif;
	?>

</div>
