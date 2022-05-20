<?php

function myplugin_register_settings()
{
  add_option('cv_person_name', 'This is my option value.');
  add_option('cv_person_carrer', 'This is my option value.');
  add_option('cv_person_description', 'This is my option value.');
  register_setting('myplugin_options_group', 'cv_person_name', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_carrer', 'myplugin_callback');
  register_setting('myplugin_options_group', 'cv_person_description', 'myplugin_callback');
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
        </tbody>

      </table>
      <p class="submit"><?php submit_button(); ?></p>

    </form>
  </div>
<?php
}
?>
<?php
add_action('admin_init', 'myplugin_register_settings');
