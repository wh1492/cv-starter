<?php

if ( ! function_exists( 'cv_info_meta_box' ) ) {
    
    add_action( 'admin_menu', 'cv_info_meta_box' );

    function cv_info_meta_box() {
        $screens = array( 'post', 'cv_study', 'cv_experience' );
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
        // if( $post->post_type != 'page' ) {
        if( $post->post_type != 'cv_experience' or $post->post_type != 'cv_study' ) {
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


// SKILL RANGE SLIDER
if ( ! function_exists( 'cv_skill_meta_box' ) ) {
    
    add_action( 'admin_menu', 'cv_skill_meta_box' );

    function cv_skill_meta_box() {
        $screens = array( 'skill' );
        add_meta_box(
            'cv_info_metabox', // metabox ID
            'Additional Info', // title
            'cv_skill_metabox_callback', // callback function
            'skill', // post type or post types in array
            // $screens, // post type or post types in array
            'normal', // position (normal, side, advanced)
            'default' // priority (default, low, high, core)
        );
    }

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
        // if( $post->post_type != 'page' ) {
        if( $post->post_type != 'skill' ) {
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

// URL REPOSITORY

// URL REPOSITORY
if ( ! function_exists( 'cv_repository_meta_box' ) ) {
    
    add_action( 'admin_menu', 'cv_repository_meta_box' );

    function cv_repository_meta_box() {
        $screens = array( 'repository' );
        add_meta_box(
            'cv_info_metabox', // metabox ID
            'Additional Info', // title
            'cv_repository_metabox_callback', // callback function
            'repository', // post type or post types in array
            // $screens, // post type or post types in array
            'normal', // position (normal, side, advanced)
            'default' // priority (default, low, high, core)
        );
    }

    function cv_repository_metabox_callback( $post ) {
    
        $cv_repository_range = get_post_meta( $post->ID, 'cv_repository_range', true );
    
        // nonce, actually I think it is not necessary here
        wp_nonce_field( 'urlrandomstr', '_urlnonce' );
    
        echo '<table class="form-table">
            <tbody>
                <tr>
                    <th><label for="cv_repository_range">URL Repository</label></th>
                    <td><input type="url" id="cv_repository_range" name="cv_repository_range" value="' . esc_attr( $cv_repository_range ) . '" class="regular-text"></td>
                </tr>
            </tbody>
        </table>';
    
    }
}

if ( ! function_exists( 'cv_repository_save_meta' ) ) {
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
        if( $post->post_type != 'repository' ) {
            return $post_id;
        }    
       
        //
        if( isset( $_POST[ 'cv_repository_range' ] ) ) {
            update_post_meta( $post_id, 'cv_repository_range', sanitize_text_field( $_POST[ 'cv_repository_range' ] ) );
        } else {
            delete_post_meta( $post_id, 'cv_repository_range' );
        }
    
        return $post_id;
    
    }
    add_action( 'save_post', 'cv_repository_save_meta', 10, 2 );
}