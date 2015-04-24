<?php

 if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;


class Parallax_One_Sections_Order extends WP_Customize_Control
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
		$sections_array = array('parallax_one_logos_section' => 'Logos Section','parallax_one_happy_customers_section' => 'Happy Customers');
		
		$values = $this->value();
		$json = json_decode($values);
		if(!is_array($json)) $json = array($values);
		?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<ul id="parallax_order_droppable">
					   <?php
					    if(empty($json[0]->section_id)) {
							
							foreach($sections_array as $key => $value){
								echo '<li id="'.$key.'">'.$value.'</li>';
							}
							
						} else {
							
							foreach($json as $section){
								echo '<li id="'.$section->section_id.'">'.$section->section_content.'</li>';
							}
							
						}
					   ?>
				   </ul>
					<input type="hidden" <?php $this->link(); ?> id="order_collector" value="<?php echo esc_textarea($this->value()); ?>" />
                </label>
			<?php
        
    }
	
	
}