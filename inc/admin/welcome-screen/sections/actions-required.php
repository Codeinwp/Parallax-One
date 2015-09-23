<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="parallax-one-tab-pane">

    <h1><?php esc_html_e( 'Keep up with Parallax One\'s latest news' ,'parallax-one' ); ?></h1>

    <!-- NEWS -->
    <hr />

    <div class="prallax-one-tab-pane-half prallax-one-tab-pane-first-half">

        <h4><?php esc_html_e( '1. Intergeo Maps - Google Maps Plugin' ,'parallax-one' ); ?></h4>
        <p><?php esc_html_e( 'In order to use map section, you need to install Intergeo Maps plugin then use it to create a map and paste the generated shortcode in Customize -> Contact section -> Map shortcode', 'parallax-one' ); ?></p>

        <?php if ( is_plugin_active( 'shortpixel-image-optimiser/wp-shortpixel.php' ) ) { ?>
            <p><span class="parallax-one-w-activated button"><?php esc_html_e( 'Already activated', 'parallax-one' ); ?></span></p>
        <?php } else { ?>
            <p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'themes.php?page=tgmpa-install-plugins&plugin=shortpixel-image-optimiser' ), 'install-plugin_shortpixel-image-optimiser' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install ShortPixel Image Optimizer', 'parallax-one' ); ?></a></p>
        <?php } ?>

    </div>
    <div class="prallax-one-tab-pane-half">


    </div>

    <div class="parallax-one-clear"></div>



</div>