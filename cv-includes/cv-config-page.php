<?php

function myplugin_register_settings()
{
  add_option('cv_person_name', '');
  add_option('cv_person_carrer', '');
  add_option('cv_person_description', '');
  add_option('cv_person_mail', '');
  add_option('cv_person_phone', '');
  add_option('cv_person_linkedin', '');
  add_option('cv_person_skype', '');
  add_option('cv_person_location', '');
  add_option('cv_person_picture', '');
  register_setting('myplugin_options_group', 'cv_person_name', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_carrer', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_description', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_mail', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_phone', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_linkedin', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_skype', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_location', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_picture', 'myplugin_callback');
}



function myplugin_register_options_page()
{
  add_options_page('Page Title', 'CV-Start Config', 'manage_options', 'myplugin', 'myplugin_options_page');
}
add_action('admin_menu', 'myplugin_register_options_page');

function myplugin_option_page()
{
  //content on page goes here
  echo 'alalla';
}

function myplugin_options_page()
{
?>
  <div class="wrap">
    <?php screen_icon(); ?>
    <h1>CV-Start Configuration</h1>
    <form method="post" action="options.php">
      <?php settings_fields('myplugin_options_group'); ?>
      <!-- <h3>This is my option</h3> -->
      <p>Basic data from the Professional to be displayed.</p>
      <table class="form-table" role="presentation">
        <tbody>
          <tr valign="top">
            <th scope="row">
              <label for="cv_person_name"><?php _e('Professional Name:', 'cv_domain'); ?></label>
            </th>
            <td>
              <input class="large-text" type="text" id="cv_person_name" name="cv_person_name" value="<?php echo get_option('cv_person_name'); ?>" />
            </td>
          </tr>
          <tr valign="top">
            <th scope="row"><label for="cv_person_carrer"><?php _e('Professional Carrer:', 'cv_domain'); ?></label></th>
            <td>
              <input class="large-text" type="text" id="cv_person_carrer" name="cv_person_carrer" value="<?php echo get_option('cv_person_carrer'); ?>" />
            </td>
          </tr>
         
          <tr valign="top">
            <th scope="row"><label for="cv_person_description"><?php _e('Personal Description:', 'cv_domain'); ?></label></th>
            <td>
              <textarea style="width:100%;" rows="10" id="cv_person_description" name="cv_person_description"><?php echo get_option('cv_person_description'); ?></textarea>
            </td>
          </tr>

          <tr>  
            <th scope="row"><label for="cv_person_picture"><?php _e('Personal Picture:', 'cv_domain'); ?></label></th>
            <td >
              <?php 
                $image_id = get_option('cv_person_picture') ;
                if( $image = wp_get_attachment_image_src( $image_id ) ) {

                  echo '<a href="#" class="misha-upl"><img src="' . $image[0] . '" /></a>
                        <a href="#" class="misha-rmv">Remove image</a>
                        <input type="text" name="cv_person_picture" value="' . $image_id . '">';
                } else {
                  echo '<a href="#" class="misha-upl">Upload image</a>
                        <a href="#" class="misha-rmv" style="display:none">Remove image</a>
                        <input type="text" name="cv_person_picture" value="">';
                } 
              ?>
            </td>
          </tr>
        </tbody>
      </table>

      <table class="form-table" role="presentation">
        <tr valign="top">
          <th scope="row"><label for="cv_person_mail"><?php _e('Email:', 'cv_domain'); ?></label></th>
          <td>
            <input class="large-text" type="text" id="cv_person_mail" name="cv_person_mail" value="<?php echo get_option('cv_person_mail'); ?>" />
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"><label for="cv_person_phone"><?php _e('Phone:', 'cv_domain'); ?></label></th>
          <td>
            <input class="large-text" type="phone" id="cv_person_phone" name="cv_person_phone" value="<?php echo get_option('cv_person_phone'); ?>" />
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"><label for="cv_person_linkedin"><?php _e('Linkedin:', 'cv_domain'); ?></label></th>
          <td>
            <input class="large-text" type="url" id="cv_person_linkedin" name="cv_person_linkedin" value="<?php echo get_option('cv_person_linkedin'); ?>" />
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"><label for="cv_person_skype"><?php _e('Skype:', 'cv_domain'); ?></label></th>
          <td>
            <input class="large-text" type="text" id="cv_person_skype" name="cv_person_skype" value="<?php echo get_option('cv_person_skype'); ?>" />
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"><label for="cv_person_location"><?php _e('Location:', 'cv_domain'); ?></label></th>
          <td>
            <input class="large-text" type="text" id="cv_person_location" name="cv_person_location" value="<?php echo get_option('cv_person_location'); ?>" />
          </td>
        </tr>
      </table>

      <p class="submit"><?php submit_button(); ?></p>

    </form>
  </div>
<?php
}
?>
<?php
add_action('admin_init', 'myplugin_register_settings');


add_action( 'admin_enqueue_scripts', 'misha_include_js' );

function misha_include_js() {
	// I recommend to add additional conditions just to not to load the scipts on each page
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
 	// wp_enqueue_script( 'myuploadscript', get_stylesheet_directory_uri() . '/cv-includes/js/customscript.js', array( 'jquery' ) );
 	wp_enqueue_script( 'myuploadscript', plugin_dir_url( __FILE__ ) . 'js/customscript.js', array( 'jquery' ) );
}
