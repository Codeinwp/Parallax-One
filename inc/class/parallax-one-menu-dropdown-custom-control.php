<?php
 if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;


/**
 * Class to create a custom menu control
 */
class Parallax_One_Menu_Dropdown_Custom_Control extends WP_Customize_Control
{
    private $menus = false;
	
    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->menus = wp_get_nav_menus($options);
        parent::__construct( $manager, $id, $args );
    }
   
   /**
     * Render the content on the theme customizer page
    */
    public function render_content()
    {
        if(!empty($this->menus))
        {
            ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <select name="<?php echo $this->id; ?>" id="parallax_one_menu">
                    <?php
						$var = get_theme_mod( 'parallax_one_menu_dropdown_setting' );
						if(empty($var )){
							echo '<option value="" selected="selected">'.__('No menu','parallax-one').'</option>';
							foreach ( $this->menus as $menu ){
								printf('<option value="%s" %s>%s</option>', $menu->term_id, selected($this->value(), $menu->term_id, false), $menu->name);
							}
						} else {
							echo '<option value="">'.__('No menu','parallax-one').'</option>';
							foreach ( $this->menus as $menu ){
								if( $menu->term_id == $var ){
									printf('<option value="%s" %s selected="selected">%s</option>', $menu->term_id, selected($this->value(), $menu->term_id, false), $menu->name);
								} else {
									printf('<option value="%s" %s>%s</option>', $menu->term_id, selected($this->value(), $menu->term_id, false), $menu->name);
								}
							} 
						}
                    ?>
                    </select>
					<input type="hidden" <?php $this->link(); ?> id="menu_selector" value="<?php echo esc_textarea( $this->value() ); ?>" />
                </label>
			<?php
        }
    }
	
	
}