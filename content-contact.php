<?php
/**
 * @package parallax-one
 */
?>
<?php

	if(isset($_POST['submitted'])) :        
			/* recaptcha */
			$parallax_one_recaptcha_sitekey = get_theme_mod('parallax_one_recaptcha_sitekey');
	
			$parallax_one_recaptacha_secretkey = get_theme_mod('parallax_one_recaptacha_secretkey');
	
			$parallax_one_default_contact_form_show_recaptcha = get_theme_mod('parallax_one_default_contact_form_show_recaptcha');
			if( isset($parallax_one_default_contact_form_show_recaptcha) && $parallax_one_default_contact_form_show_recaptcha != 1 && !empty($parallax_one_recaptcha_sitekey) && !empty($parallax_one_recaptacha_secretkey) ) :
		        $captcha;
		        if( isset($_POST['g-recaptcha-response']) ){
		          $captcha=$_POST['g-recaptcha-response'];
		        }
		        if( empty($captcha) ){
		          $hasError = true;    
		          
		        }
		        $response = wp_remote_get( "https://www.google.com/recaptcha/api/siteverify?secret=".$parallax_one_recaptacha_secretkey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'] );
				$response = json_decode($response["body"], true);
				if( $response["success"]==false) {
						$hasError = true;
					}
				endif;
				/* name */
				if(trim($_POST['myname']) === ''):               
					$nameError = __('* Please enter your name.','parallax-one');               
					$hasError = true;        
				else:               
					$name = trim($_POST['myname']);        
				endif; 
				/* email */	
				if(trim($_POST['myemail']) === ''):               
					$emailError = __('* Please enter your email address.','parallax-one');               
					$hasError = true;        
				elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['myemail']))) :               
					$emailError = __('* You entered an invalid email address.','parallax-one');               
					$hasError = true;        
				else:               
					$email = trim($_POST['myemail']);        
				endif;  
				/* subject */
				if(trim($_POST['mysubject']) === ''):               
					$subjectError = __('* Please enter a subject.','parallax-one');               
					$hasError = true;        
				else:               
					$subject = trim($_POST['mysubject']);        
				endif; 
				/* message */
				if(trim($_POST['mymessage']) === ''):               
					$messageError = __('* Please enter a message.','parallax-one');               
					$hasError = true;        
				else:                                     
					$message = stripslashes(trim($_POST['mymessage']));               
			endif; 		
			
			/* send the email */
			if(!isset($hasError)):               
				$parallax_one_default_contact_form_email = get_theme_mod('parallax_one_default_contact_form_email');
				
				if( empty($parallax_one_default_contact_form_email) ):
				
					$emailTo = get_theme_mod('parallax_one_default_contact_form_email');
				
				else:
					
					$emailTo = $parallax_one_default_contact_form_email;
				
				endif;
				if(isset($emailTo) && $emailTo != ""):
					if( empty($subject) ):
						$subject = 'From '.$name;
					endif;
					$body = "Name: $name \n\nEmail: $email \n\n Subject: $subject \n\n Message: $message";               
					$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email; 				               
					wp_mail($emailTo, $subject, $body, $headers);               
					$emailSent = true;        
				else:
					$emailSent = false;
				endif;
			endif;	
		endif;	

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('contact-page'); ?>>

	<div class="container">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title single-title">', '</h1>' ); ?>
			<div class="colored-line-left"></div>
			<div class="clearfix"></div>
		</header><!-- .entry-header -->

		<div class="entry-content content-page">

			<?php
				$parallax_one_contact_form_shortcode = get_theme_mod('parallax_one_contact_form_shortcode');
			?>
			<div class="<?php if(!empty($parallax_one_contact_form_shortcode)) {echo 'col-md-6';} else {echo 'col-md-12';}?>">
				<?php the_content(); ?>
			</div>
				<?php 
					
					if(!empty($parallax_one_contact_form_shortcode)) {
						echo '<div class="col-md-6">';
						echo do_shortcode( $parallax_one_contact_form_shortcode);
						echo '</div>';
					} else {
						$parallax_one_default_contact_form_show = get_theme_mod('parallax_one_default_contact_form_show');
						if( isset($parallax_one_default_contact_form_show) && $parallax_one_default_contact_form_show != 1 ){
						
				?>
						<div class="col-md-6">
							<?php 
								if(isset($emailSent) && $emailSent == true) :
									echo '<p class="error error_thanks">'.__('Thanks, your email was sent successfully!','parallax-one').'</p>';                            
								elseif(isset($_POST['submitted'])):                                    
									echo '<p class="error error_sorry">'.__('Sorry, an error occured.','parallax-one').'</p>';                            
								endif;

								if(isset($nameError) && $nameError != '') :																		 
									echo '<p class="error">'.esc_html($nameError).'</p>';																 
								endif;	
								if(isset($emailError) && $emailError != '') :																		 
									echo '<p class="error">'.esc_html($emailError).'</p>';																 
								endif;	
								if(isset($subjectError) && $subjectError != '') :																		 
									echo '<p class="error">'.esc_html($subjectError).'</p>';																 
								endif;	
								if(isset($messageError) && $messageError != '') :																		 
									echo '<p class="error">'.esc_html($messageError).'</p>';																 
								endif;	
							?>
							<form role="form" method="POST" action="" onSubmit="this.scrollPosition.value=(document.body.scrollTop || document.documentElement.scrollTop)" class="contact-form">

								<input type="hidden" name="scrollPosition">

								<input type="hidden" name="submitted" id="submitted" value="true" />

								<div class="col-lg-4 col-sm-4" data-scrollreveal="enter left after 0s over 1s">

									<?php $parallax_one_name_placeholder = get_theme_mod('parallax_one_name_placeholder','Your Name'); ?>

									<input type="text" name="myname" placeholder="<?php if(!empty($parallax_one_name_placeholder)) echo $parallax_one_name_placeholder; ?>" class="form-control input-box" value="<?php if(isset($_POST['myname'])) echo esc_attr($_POST['myname']);?>">

								</div>

								<div class="col-lg-4 col-sm-4" data-scrollreveal="enter left after 0s over 1s">

									<?php $parallax_one_email_placeholder = get_theme_mod('parallax_one_email_placeholder','Your Email'); ?>

									<input type="email" name="myemail" placeholder="<?php if(!empty($parallax_one_email_placeholder)) echo $parallax_one_email_placeholder; ?>" class="form-control input-box" value="<?php if(isset($_POST['myemail'])) echo is_email($_POST['myemail']) ? $_POST['myemail'] : ""; ?>">

								</div>

								<div class="col-lg-4 col-sm-4" data-scrollreveal="enter left after 0s over 1s">

									<?php $parallax_one_subject_placeholder = get_theme_mod('parallax_one_subject_placeholder','Subject'); ?>

									<input type="text" name="mysubject" placeholder="<?php if(!empty($parallax_one_subject_placeholder)) echo $parallax_one_subject_placeholder; ?>" class="form-control input-box" value="<?php if(isset($_POST['mysubject'])) echo esc_attr($_POST['mysubject']);?>">

								</div>

								<div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">

									<?php $parallax_one_message_placeholder = get_theme_mod('parallax_one_message_placeholder','Your Message'); ?>

									<textarea name="mymessage" class="form-control textarea-box" placeholder="<?php if(!empty($parallax_one_message_placeholder)) echo $parallax_one_message_placeholder; ?>"><?php if(isset($_POST['mymessage'])) { echo esc_html($_POST['mymessage']); } ?></textarea>

								</div>
								
								<?php
									$parallax_one_button_label = get_theme_mod('parallax_one_button_label','Send Message');

									if( !empty($parallax_one_button_label) ):

										echo '<button class="btn btn-primary custom-button red-btn" type="submit" data-scrollreveal="enter left after 0s over 1s">'.$parallax_one_button_label.'</button>';

									elseif ( isset( $wp_customize ) ):

										echo '<button class="btn btn-primary custom-button red-btn parallax-one_hidden_if_not_customizer" type="submit" data-scrollreveal="enter left after 0s over 1s"></button>';

									endif;
								?>

								<?php 
									$parallax_one_recaptcha_sitekey = get_theme_mod('parallax_one_recaptcha_sitekey');
									$parallax_one_recaptacha_secretkey = get_theme_mod('parallax_one_recaptacha_secretkey');
									$parallax_one_default_contact_form_show_recaptcha = get_theme_mod('parallax_one_default_contact_form_show_recaptcha');
									if( isset($parallax_one_default_contact_form_show_recaptcha) && $parallax_one_default_contact_form_show_recaptcha != 1 && !empty($parallax_one_recaptcha_sitekey) && !empty($parallax_one_recaptacha_secretkey) ) :
										echo '<div class="g-recaptcha" data-sitekey="' . $parallax_one_recaptcha_sitekey . '"></div>';
									endif;
								?>
							</form>
						</div>
				<?php
						}
					}
				?>

			<footer class="entry-footer">
				<?php edit_post_link( __( 'Edit', 'parallax-one' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .fentry-footer -->

		</div><!-- .entry-content -->

	</div>

	
		<?php 
			$parallax_one_contact_map_shortcode = get_theme_mod('parallax_one_contact_map_shortcode');
			if(!empty($parallax_one_contact_map_shortcode)) {
				echo '<div class="contact-page-map-wrap">';
				echo do_shortcode( $parallax_one_contact_map_shortcode);
				echo '</div>';
			}
		?>
	

</article><!-- #post-## -->