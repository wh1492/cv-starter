<?php

/**
 * GENERAL INFORMATION
 * 
 */

if ( ! function_exists( 'cv_info_meta_box' ) ) {
  add_action( 'admin_menu', 'cv_info_meta_box' );
  function cv_info_meta_box() {
    $screens = array( 'cv_study', 'cv_experience' );
    add_meta_box(
      'cv_info_metabox', // metabox ID
      'Additional Info', // title
      'cv_info_metabox_callback', // callback function
      // 'page', // post type or post types in array
      $screens, // post type or post types in array
      'normal', // position (normal, side, advanced)
      'default' // priority (default, low, high, core)
    );
  }
  
  // display fields
  function cv_info_metabox_callback( $post ) {
  
    $cv_date_start = get_post_meta( $post->ID, 'cv_date_start', true );
    $cv_date_end = get_post_meta( $post->ID, 'cv_date_end', true );
    $cv_location = get_post_meta( $post->ID, 'cv_location', true );
    $cv_institution = get_post_meta( $post->ID, 'cv_institution', true );
    // nonce, actually I think it is not necessary here
    wp_nonce_field( 'somerandomstr', '_datenonce' );

    echo '<table class="form-table">
      <tbody>
        <tr>
          <th><label for="cv_institution">Institution</label></th>
          <td><input type="text" id="cv_institution" name="cv_institution" value="' . esc_attr( $cv_institution ) . '" class="regular-text"></td>
        </tr>
        <tr>
          <th><label for="cv_date_start">Date Start</label></th>
          <td><input type="text" id="cv_date_start" name="cv_date_start" value="' . esc_attr( $cv_date_start ) . '" class="regular-text"></td>
        </tr>
        <tr>
          <th><label for="cv_date_end">Date End</label></th>
          <td><input type="text" id="cv_date_end" name="cv_date_end" value="' . esc_attr( $cv_date_end ) . '" class="regular-text"></td>
        </tr>
        <tr>
          <th><label for="cv_location">Location</label></th>
          <td><input type="text" id="cv_location" name="cv_location" value="' . esc_attr( $cv_location ) . '" class="regular-text"></td>
        </tr>
      </tbody>
    </table>';
  
  }
}
 
if ( ! function_exists( 'cv_info_save_meta' ) ) {
  // Save fields data
  function cv_info_save_meta( $post_id, $post ) {
    // nonce check
    if ( ! isset( $_POST[ '_datenonce' ] ) || ! wp_verify_nonce( $_POST[ '_datenonce' ], 'somerandomstr' ) ) {
      return $post_id;
    }
    // check current use permissions
    $post_type = get_post_type_object( $post->post_type );
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
      return $post_id;
    }
    // Do not save the data if autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return $post_id;
    }
    // define your own post type here
    if( $post->post_type != 'cv_experience' and $post->post_type != 'cv_study' ) {
      return $post_id;
    }
    if( isset( $_POST[ 'cv_institution' ] ) ) {
      update_post_meta( $post_id, 'cv_institution', sanitize_text_field( $_POST[ 'cv_institution' ] ) );
    } else {
      delete_post_meta( $post_id, 'cv_institution' );
    }
    //
    if( isset( $_POST[ 'cv_date_start' ] ) ) {
      update_post_meta( $post_id, 'cv_date_start', sanitize_text_field( $_POST[ 'cv_date_start' ] ) );
    } else {
      delete_post_meta( $post_id, 'cv_date_start' );
    }
    //
    if( isset( $_POST[ 'cv_date_end' ] ) ) {
      update_post_meta( $post_id, 'cv_date_end', sanitize_text_field( $_POST[ 'cv_date_end' ] ) );
    } else {
      delete_post_meta( $post_id, 'cv_date_end' );
    }
    //
    if( isset( $_POST[ 'cv_location' ] ) ) {
      update_post_meta( $post_id, 'cv_location', sanitize_text_field( $_POST[ 'cv_location' ] ) );
    } else {
      delete_post_meta( $post_id, 'cv_location' );
    }

    return $post_id;
  }
  add_action( 'save_post', 'cv_info_save_meta', 10, 2 );
}

/**
 * SKILL RANGE SLIDER
 */
if ( ! function_exists( 'cv_skill_meta_box' ) ) {
  add_action( 'admin_menu', 'cv_skill_meta_box' );
  function cv_skill_meta_box() {
    $screens = array( 'cv_skill' );
    add_meta_box(
      'cv_skill_metabox', // metabox ID
      'Additional Info', // title
      'cv_skill_metabox_callback', // callback function
      'cv_skill', // post type or post types in array
      // $screens, // post type or post types in array
      'normal', // position (normal, side, advanced)
      'default' // priority (default, low, high, core)
    );
  }
  // Set Fields
  function cv_skill_metabox_callback( $post ) {
    $cv_skill_range = get_post_meta( $post->ID, 'cv_skill_range', true );
    // nonce, actually I think it is not necessary here
    wp_nonce_field( 'rangerandomstr', '_rangenonce' );
    echo '<table class="form-table">
      <tbody>
        <tr>
          <th><label for="cv_skill_range">Range Skill</label></th>
          <td><input type="range" min="1" step="1" max="5" id="cv_skill_range" name="cv_skill_range" value="' . esc_attr( $cv_skill_range ) . '" class="regular-text"></td>
        </tr>
      </tbody>
    </table>';
  }
}

if ( ! function_exists( 'cv_skill_save_meta' ) ) {
  // Save data 
  function cv_skill_save_meta( $post_id, $post ) {
    // nonce check
    if ( ! isset( $_POST[ '_rangenonce' ] ) || ! wp_verify_nonce( $_POST[ '_rangenonce' ], 'rangerandomstr' ) ) {
      return $post_id;
    }
    // check current use permissions
    $post_type = get_post_type_object( $post->post_type );
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
      return $post_id;
    }
    // Do not save the data if autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return $post_id;
    }
    // define your own post type here
    if( $post->post_type != 'cv_skill' ) {
      return $post_id;
    }    
    //
    if( isset( $_POST[ 'cv_skill_range' ] ) ) {
      update_post_meta( $post_id, 'cv_skill_range', sanitize_text_field( $_POST[ 'cv_skill_range' ] ) );
    } else {
      delete_post_meta( $post_id, 'cv_skill_range' );
    }

    return $post_id;
  }
  add_action( 'save_post', 'cv_skill_save_meta', 10, 2 );
}

/**
 * REPOSITORY URL
 */
if ( ! function_exists( 'cv_repository_meta_box' ) ) {
  add_action( 'admin_menu', 'cv_repository_meta_box' );
  function cv_repository_meta_box() {
    $screens = array( 'cv_repository' );
    add_meta_box(
      'cv_repository_metabox', // metabox ID
      'Additional Info', // title
      'cv_repository_metabox_callback', // callback function
      // 'page', // post type or post types in array
      $screens, // post type or post types in array
      'normal', // position (normal, side, advanced)
      'default' // priority (default, low, high, core)
    );
  }
  // Set fields
  function cv_repository_metabox_callback( $post ) {
    $cv_repository_url = get_post_meta( $post->ID, 'cv_repository_url', true );
    // nonce, actually I think it is not necessary here
    wp_nonce_field( 'urlrandomstr', '_urlnonce' );
    echo '<table class="form-table">
      <tbody>
        <tr>
          <th><label for="cv_repository_url">URL Repository</label></th>
          <td><input type="url" id="cv_repository_url" name="cv_repository_url" value="' . esc_attr( $cv_repository_url ) . '" class="regular-text"></td>
        </tr>
      </tbody>
    </table>';
  }
}

if ( ! function_exists( 'cv_repository_save_meta' ) ) {
  // Save data
  function cv_repository_save_meta( $post_id, $post ) {
    // nonce check
    if ( ! isset( $_POST[ '_urlnonce' ] ) || ! wp_verify_nonce( $_POST[ '_urlnonce' ], 'urlrandomstr' ) ) {
      return $post_id;
    }
    // check current use permissions
    $post_type = get_post_type_object( $post->post_type );
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
      return $post_id;
    }
    // Do not save the data if autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return $post_id;
    }
    // define your own post type here
    // if( $post->post_type != 'page' ) {
    if( $post->post_type != 'cv_repository' ) {
      return $post_id;
    }    
    //
    if( isset( $_POST[ 'cv_repository_url' ] ) ) {
      update_post_meta( $post_id, 'cv_repository_url', sanitize_text_field( $_POST[ 'cv_repository_url' ] ) );
    } else {
      delete_post_meta( $post_id, 'cv_repository_url' );
    }

    return $post_id;
  }
  add_action( 'save_post', 'cv_repository_save_meta', 10, 2 );
}

/**
 * PORTFOLIO URL
 */
// SET URL PORTFOLIO
if ( ! function_exists( 'cv_portafolio_meta_box' ) ) {
  add_action( 'admin_menu', 'cv_portafolio_meta_box' );
  function cv_portafolio_meta_box() {
    $screens = array( 'cv_portafolio' );
    add_meta_box(
      'cv_portafolio_metabox', // metabox ID
      'Additional Info', // title
      'cv_portafolio_metabox_callback', // callback function
      // 'page', // post type or post types in array
      $screens, // post type or post types in array
      'normal', // position (normal, side, advanced)
      'default' // priority (default, low, high, core)
    );
  }
  // Set data
  function cv_portafolio_metabox_callback( $post ) {
    $cv_portafolio_url = get_post_meta( $post->ID, 'cv_portafolio_url', true );
    // nonce, actually I think it is not necessary here
    wp_nonce_field( 'urlrandomstr', '_urlnonce' );
    echo '<table class="form-table">
      <tbody>
        <tr>
          <th><label for="cv_portafolio_url">URL Portfolio</label></th>
          <td><input type="url" id="cv_portafolio_url" name="cv_portafolio_url" value="' . esc_attr( $cv_portafolio_url ) . '" class="regular-text"></td>
        </tr>
      </tbody>
    </table>';
  }
}
if ( ! function_exists( 'cv_portafolio_save_meta' ) ) {
  // Save data
  function cv_portafolio_save_meta( $post_id, $post ) {
    // nonce check
    if ( ! isset( $_POST[ '_urlnonce' ] ) || ! wp_verify_nonce( $_POST[ '_urlnonce' ], 'urlrandomstr' ) ) {
      return $post_id;
    }
    // check current use permissions
    $post_type = get_post_type_object( $post->post_type );
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
      return $post_id;
    }
    // Do not save the data if autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return $post_id;
    }
    // define your own post type here
    if( $post->post_type != 'cv_portafolio' ) {
      return $post_id;
    }    
    //
    if( isset( $_POST[ 'cv_portafolio_url' ] ) ) {
      update_post_meta( $post_id, 'cv_portafolio_url', sanitize_text_field( $_POST[ 'cv_portafolio_url' ] ) );
    } else {
      delete_post_meta( $post_id, 'cv_portafolio_url' );
    }

    return $post_id;
  }
  add_action( 'save_post', 'cv_portafolio_save_meta', 10, 2 );
}



// LANGUAGE RANGE SLIDER
if ( ! function_exists( 'cv_language_meta_box' ) ) {
  add_action( 'admin_menu', 'cv_language_meta_box' );
  function cv_language_meta_box() {
    $screens = array( 'cv_language' );
    add_meta_box(
      'cv_language_metabox', // metabox ID
      'Additional Info', // title
      'cv_language_metabox_callback', // callback function
      'cv_language', // post type or post types in array
      // $screens, // post type or post types in array
      'normal', // position (normal, side, advanced)
      'default' // priority (default, low, high, core)
    );
  }
  // Set data
  function cv_language_metabox_callback( $post ) {
    $cv_language_range = get_post_meta( $post->ID, 'cv_language_range', true );
    // nonce, actually I think it is not necessary here
    wp_nonce_field( 'rangerandomstr', '_rangenonce' );
    echo '<table class="form-table">
        <tbody>
          <tr>
            <th><label for="cv_language_range">Range Language</label></th>
            <td><input type="range" min="1" step="1" max="5" id="cv_language_range" name="cv_language_range" value="' . esc_attr( $cv_language_range ) . '" class="regular-text"></td>
          </tr>
        </tbody>
    </table>';
  }
}

if ( ! function_exists( 'cv_language_save_meta' ) ) {
  // Save data
  function cv_language_save_meta( $post_id, $post ) {
    // nonce check
    if ( ! isset( $_POST[ '_rangenonce' ] ) || ! wp_verify_nonce( $_POST[ '_rangenonce' ], 'rangerandomstr' ) ) {
      return $post_id;
    }
    // check current use permissions
    $post_type = get_post_type_object( $post->post_type );
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
      return $post_id;
    }
    // Do not save the data if autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return $post_id;
    }
    // define your own post type here
    if( $post->post_type != 'cv_language' ) {
      return $post_id;
    }    
    //
    if( isset( $_POST[ 'cv_language_range' ] ) ) {
      update_post_meta( $post_id, 'cv_language_range', sanitize_text_field( $_POST[ 'cv_language_range' ] ) );
    } else {
      delete_post_meta( $post_id, 'cv_language_range' );
    }

    return $post_id;
  }
  add_action( 'save_post', 'cv_language_save_meta', 10, 2 );
}