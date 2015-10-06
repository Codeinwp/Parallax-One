<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="parallax-one-tab-pane">

    <h1><?php esc_html_e( 'Keep up with Parallax One\'s latest news' ,'parallax-one' ); ?></h1>

    <!-- NEWS -->
    <hr />
	
	<?php
	global $parallax_one_required_actions;
	
	if( !empty($parallax_one_required_actions) ):
	
		/* $parallax_one_required_actions is an array of true/false for each required action that was dismissed */
		
		$parallax_one_show_required_actions = get_option("parallax_one_show_required_actions");
		
		foreach( $parallax_one_required_actions as $parallax_one_required_action_key => $parallax_one_required_action_value ):
		
			if(@$parallax_one_show_required_actions[$parallax_one_required_action_value['id']] === false) continue;
			if(@$parallax_one_required_action_value['check']) continue;
			?>
			<div class="parallax-one-action-required-box">
				<span class="dashicons dashicons-no-alt parallax-one-dismiss-required-action" id="<?php echo $parallax_one_required_action_value['id']; ?>"></span>
				<h4><?php echo $parallax_one_required_action_key + 1; ?>. <?php if( !empty($parallax_one_required_action_value['title']) ): echo $parallax_one_required_action_value['title']; endif; ?></h4>
				<p><?php if( !empty($parallax_one_required_action_value['description']) ): echo $parallax_one_required_action_value['description']; endif; ?></p>
				<?php
					if( !empty($parallax_one_required_action_value['plugin_slug']) ):
						?><p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='.$parallax_one_required_action_value['plugin_slug'] ), 'install-plugin_'.$parallax_one_required_action_value['plugin_slug'] ) ); ?>" class="button button-primary"><?php if( !empty($parallax_one_required_action_value['title']) ): echo $parallax_one_required_action_value['title']; endif; ?></a></p><?php
					endif;
				?>

				<hr />
			</div>
			<?php
		endforeach;
	endif;
	$nr_actions_required = 0;
	/* get number of required actions */
	if( get_option('parallax_one_show_required_actions') ):
		$parallax_one_show_required_actions = get_option('parallax_one_show_required_actions');
	else:
		$parallax_one_show_required_actions = array();
	endif;
	if( !empty($parallax_one_required_actions) ):
		foreach( $parallax_one_required_actions as $parallax_one_required_action_value ):
			if(( !isset( $parallax_one_required_action_value['check'] ) || ( isset( $parallax_one_required_action_value['check'] ) && ( $parallax_one_required_action_value['check'] == false ) ) ) && ((isset($parallax_one_show_required_actions[$parallax_one_required_action_value['id']]) && ($parallax_one_show_required_actions[$parallax_one_required_action_value['id']] == true)) || !isset($parallax_one_show_required_actions[$parallax_one_required_action_value['id']]) )) :
				$nr_actions_required++;
			endif;
		endforeach;
	endif;
	if( $nr_actions_required == 0 ):
		echo '<p>'.__( 'Hooray! There are no required actions for you right now.','parallax-one' ).'</p>';
	endif;
	?>

</div>