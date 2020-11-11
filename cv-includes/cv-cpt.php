<?php
/**
 * Register a custom post type called "experience".
 *
 * @see get_post_type_labels() for label keys.
 */

 
/*
 * EXPERIENCE 
 */
if ( ! function_exists( 'cv_cpt_experience' ) ) {
    // Register Custom Post Type
    function cv_cpt_experience() {

        $labels = array(
            'name'                  => _x( 'Experience', 'Post Type General Name', 'cv_domain' ),
            'singular_name'         => _x( 'Experience', 'Post Type Singular Name', 'cv_domain' ),
            'menu_name'             => __( 'Working Experience', 'cv_domain' ),
            'name_admin_bar'        => __( 'Working Experience', 'cv_domain' ),
            'archives'              => __( 'Item Archives', 'cv_domain' ),
            'attributes'            => __( 'Item Attributes', 'cv_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'cv_domain' ),
            'all_items'             => __( 'All Items', 'cv_domain' ),
            'add_new_item'          => __( 'Add New Item', 'cv_domain' ),
            'add_new'               => __( 'Add New', 'cv_domain' ),
            'new_item'              => __( 'New Item', 'cv_domain' ),
            'edit_item'             => __( 'Edit Item', 'cv_domain' ),
            'update_item'           => __( 'Update Item', 'cv_domain' ),
            'view_item'             => __( 'View Item', 'cv_domain' ),
            'view_items'            => __( 'View Items', 'cv_domain' ),
            'search_items'          => __( 'Search Item', 'cv_domain' ),
            'not_found'             => __( 'Not found', 'cv_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'cv_domain' ),
            'featured_image'        => __( 'Featured Image', 'cv_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'cv_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'cv_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'cv_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'cv_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'cv_domain' ),
            'items_list'            => __( 'Items list', 'cv_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'cv_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'cv_domain' ),
        );
        $rewrite = array(
            'slug'                  => 'experience',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Experience', 'cv_domain' ),
            'description'           => __( 'Post Type Description', 'cv_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'custom-fields' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-edit-page',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'cv_experience', $args );

    }
    add_action( 'init', 'cv_cpt_experience', 0 );
}

/*
 * STUDY / STUDIES
 */
if ( ! function_exists( 'cv_cpt_study' ) ) {
    // Register Custom Post Type
    function cv_cpt_study() {

        $labels = array(
            'name'                  => _x( 'Studies', 'Post Type General Name', 'cv_domain' ),
            'singular_name'         => _x( 'Study', 'Post Type Singular Name', 'cv_domain' ),
            'menu_name'             => __( 'Applied Studies', 'cv_domain' ),
            'name_admin_bar'        => __( 'Applied Studies', 'cv_domain' ),
            'archives'              => __( 'Item Archives', 'cv_domain' ),
            'attributes'            => __( 'Item Attributes', 'cv_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'cv_domain' ),
            'all_items'             => __( 'All Items', 'cv_domain' ),
            'add_new_item'          => __( 'Add New Item', 'cv_domain' ),
            'add_new'               => __( 'Add New', 'cv_domain' ),
            'new_item'              => __( 'New Item', 'cv_domain' ),
            'edit_item'             => __( 'Edit Item', 'cv_domain' ),
            'update_item'           => __( 'Update Item', 'cv_domain' ),
            'view_item'             => __( 'View Item', 'cv_domain' ),
            'view_items'            => __( 'View Items', 'cv_domain' ),
            'search_items'          => __( 'Search Item', 'cv_domain' ),
            'not_found'             => __( 'Not found', 'cv_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'cv_domain' ),
            'featured_image'        => __( 'Featured Image', 'cv_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'cv_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'cv_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'cv_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'cv_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'cv_domain' ),
            'items_list'            => __( 'Items list', 'cv_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'cv_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'cv_domain' ),
        );
        $args = array(
            'label'                 => __( 'Study', 'cv_domain' ),
            'description'           => __( 'Post Type Description', 'cv_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'custom-fields' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-welcome-learn-more',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'cv_study', $args );

    }
    add_action( 'init', 'cv_cpt_study', 0 );
}

/*
 * SKILLS 
 */

if ( ! function_exists( 'cv_cpt_skill' ) ) {
    // Register Custom Post Type
    function cv_cpt_skill() {

        $labels = array(
            'name'                  => _x( 'Skills', 'Post Type General Name', 'cv_domain' ),
            'singular_name'         => _x( 'Skill', 'Post Type Singular Name', 'cv_domain' ),
            'menu_name'             => __( 'Skills', 'cv_domain' ),
            'name_admin_bar'        => __( 'Skills', 'cv_domain' ),
            'archives'              => __( 'Item Archives', 'cv_domain' ),
            'attributes'            => __( 'Item Attributes', 'cv_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'cv_domain' ),
            'all_items'             => __( 'All Items', 'cv_domain' ),
            'add_new_item'          => __( 'Add New Item', 'cv_domain' ),
            'add_new'               => __( 'Add New', 'cv_domain' ),
            'new_item'              => __( 'New Item', 'cv_domain' ),
            'edit_item'             => __( 'Edit Item', 'cv_domain' ),
            'update_item'           => __( 'Update Item', 'cv_domain' ),
            'view_item'             => __( 'View Item', 'cv_domain' ),
            'view_items'            => __( 'View Items', 'cv_domain' ),
            'search_items'          => __( 'Search Item', 'cv_domain' ),
            'not_found'             => __( 'Not found', 'cv_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'cv_domain' ),
            'featured_image'        => __( 'Featured Image', 'cv_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'cv_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'cv_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'cv_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'cv_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'cv_domain' ),
            'items_list'            => __( 'Items list', 'cv_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'cv_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'cv_domain' ),
        );
        $args = array(
            'label'                 => __( 'Skill', 'cv_domain' ),
            'description'           => __( 'Post Type Description', 'cv_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title' ),
            // 'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-editor-ol-rtl',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'cv_skill', $args );

    }
    add_action( 'init', 'cv_cpt_skill', 0 );
}

/**
 * REPOSITORY
 */

if ( ! function_exists( 'cv_cpt_repository' ) ) {
    // Register Custom Post Type
    function cv_cpt_repository() {

        $labels = array(
            'name'                  => _x( 'Repositories', 'Post Type General Name', 'cv_domain' ),
            'singular_name'         => _x( 'Repository', 'Post Type Singular Name', 'cv_domain' ),
            'menu_name'             => __( 'Repositories', 'cv_domain' ),
            'name_admin_bar'        => __( 'Repositories', 'cv_domain' ),
            'archives'              => __( 'Item Archives', 'cv_domain' ),
            'attributes'            => __( 'Item Attributes', 'cv_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'cv_domain' ),
            'all_items'             => __( 'All Items', 'cv_domain' ),
            'add_new_item'          => __( 'Add New Item', 'cv_domain' ),
            'add_new'               => __( 'Add New', 'cv_domain' ),
            'new_item'              => __( 'New Item', 'cv_domain' ),
            'edit_item'             => __( 'Edit Item', 'cv_domain' ),
            'update_item'           => __( 'Update Item', 'cv_domain' ),
            'view_item'             => __( 'View Item', 'cv_domain' ),
            'view_items'            => __( 'View Items', 'cv_domain' ),
            'search_items'          => __( 'Search Item', 'cv_domain' ),
            'not_found'             => __( 'Not found', 'cv_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'cv_domain' ),
            'featured_image'        => __( 'Featured Image', 'cv_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'cv_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'cv_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'cv_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'cv_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'cv_domain' ),
            'items_list'            => __( 'Items list', 'cv_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'cv_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'cv_domain' ),
        );
        $args = array(
            'label'                 => __( 'Repository', 'cv_domain' ),
            'description'           => __( 'Post Type Description', 'cv_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-networking',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'cv_repository', $args );

    }
    add_action( 'init', 'cv_cpt_repository', 0 );
}


/**
 * REPOSITORY
 */

if ( ! function_exists( 'cv_cpt_portafolio' ) ) {
    // Register Custom Post Type
    function cv_cpt_portafolio() {

        $labels = array(
            'name'                  => _x( 'Portafolios', 'Post Type General Name', 'cv_domain' ),
            'singular_name'         => _x( 'Portafolio', 'Post Type Singular Name', 'cv_domain' ),
            'menu_name'             => __( 'Portafolios', 'cv_domain' ),
            'name_admin_bar'        => __( 'Portafolios', 'cv_domain' ),
            'archives'              => __( 'Item Archives', 'cv_domain' ),
            'attributes'            => __( 'Item Attributes', 'cv_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'cv_domain' ),
            'all_items'             => __( 'All Items', 'cv_domain' ),
            'add_new_item'          => __( 'Add New Item', 'cv_domain' ),
            'add_new'               => __( 'Add New', 'cv_domain' ),
            'new_item'              => __( 'New Item', 'cv_domain' ),
            'edit_item'             => __( 'Edit Item', 'cv_domain' ),
            'update_item'           => __( 'Update Item', 'cv_domain' ),
            'view_item'             => __( 'View Item', 'cv_domain' ),
            'view_items'            => __( 'View Items', 'cv_domain' ),
            'search_items'          => __( 'Search Item', 'cv_domain' ),
            'not_found'             => __( 'Not found', 'cv_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'cv_domain' ),
            'featured_image'        => __( 'Featured Image', 'cv_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'cv_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'cv_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'cv_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'cv_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'cv_domain' ),
            'items_list'            => __( 'Items list', 'cv_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'cv_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'cv_domain' ),
        );
        $args = array(
            'label'                 => __( 'Portafolio', 'cv_domain' ),
            'description'           => __( 'Post Type Description', 'cv_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-welcome-write-blog',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'cv_portafolio', $args );

    }
    add_action( 'init', 'cv_cpt_portafolio', 0 );
}

/**
 * LANGUAGE
 */

if ( ! function_exists( 'cv_cpt_languages' ) ) {
    // Register Custom Post Type
    function cv_cpt_languages() {

        $labels = array(
            'name'                  => _x( 'Languages', 'Post Type General Name', 'cv_domain' ),
            'singular_name'         => _x( 'Language', 'Post Type Singular Name', 'cv_domain' ),
            'menu_name'             => __( 'Languages', 'cv_domain' ),
            'name_admin_bar'        => __( 'Languages', 'cv_domain' ),
            'archives'              => __( 'Item Archives', 'cv_domain' ),
            'attributes'            => __( 'Item Attributes', 'cv_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'cv_domain' ),
            'all_items'             => __( 'All Items', 'cv_domain' ),
            'add_new_item'          => __( 'Add New Item', 'cv_domain' ),
            'add_new'               => __( 'Add New', 'cv_domain' ),
            'new_item'              => __( 'New Item', 'cv_domain' ),
            'edit_item'             => __( 'Edit Item', 'cv_domain' ),
            'update_item'           => __( 'Update Item', 'cv_domain' ),
            'view_item'             => __( 'View Item', 'cv_domain' ),
            'view_items'            => __( 'View Items', 'cv_domain' ),
            'search_items'          => __( 'Search Item', 'cv_domain' ),
            'not_found'             => __( 'Not found', 'cv_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'cv_domain' ),
            'featured_image'        => __( 'Featured Image', 'cv_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'cv_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'cv_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'cv_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'cv_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'cv_domain' ),
            'items_list'            => __( 'Items list', 'cv_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'cv_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'cv_domain' ),
        );
        $args = array(
            'label'                 => __( 'Language', 'cv_domain' ),
            'description'           => __( 'Post Type Description', 'cv_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-money',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'cv_language', $args );

    }
    add_action( 'init', 'cv_cpt_languages', 0 );
}
