<?php

/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest, * or null if none.
 */
function cv_get_contents($data)
{
  // Generate Data for all Data to Show in the CV
  $cv_data = array();

  // get configuration

  $cv_person_name = get_option('cv_person_name');
  $cv_person_carrer = get_option('cv_person_carrer');
  $cv_person_description = get_option('cv_person_description');


  // GET all the EXPERIENCIES from DB
  $args = array(
    'post_type' => 'cv_experience',
    'post_status' => 'publish',
    'posts_per_page' => -1
  );
  // verificar rutina de pinch para agregar custom metaboxes
  $cv_experience = new WP_Query($args);
  if (empty($cv_experience)) {
    return null;
  } else {
    $post_name = get_post_type_object('cv_experience');
    $cv_exp_slug = trim($post_name->name, "cv_");
    // $post_name->rewrite->slug
    $cv_exper_obj = array(
      'name' => $post_name->labels->menu_name,
      'slug' => $cv_exp_slug,
      'posts' => $cv_experience->posts
    );
    //  $cv_data[] = array( 'experiencies' => $cv_exper_obj );
  }


  // GET all the STUDIES from DB
  $args = array(
    'post_type' => 'cv_study',
    'post_status' => 'publish',
    'posts_per_page' => -1
  );
  // verificar rutina de pinch para agregar custom metaboxes
  $cv_study = new WP_Query($args);
  if (empty($cv_study)) {
    return null;
  } else {
    $post_name = get_post_type_object('cv_study');
    $cv_study_slug = trim($post_name->name, "cv_");
    // $post_name->rewrite->slug
    $cv_study_obj = array(
      'name' => $post_name->labels->menu_name,
      'slug' => $cv_study_slug,
      'posts' => $cv_study->posts
    );
    // $cv_data[] = array( 'studies' => $cv_study_obj );
  }


  // GET all the LANGUAGES from DB
  $args = array(
    'post_type' => 'cv_language',
    'post_status' => 'publish',
    'posts_per_page' => -1
  );
  // verificar rutina de pinch para agregar custom metaboxes
  $cv_language = new WP_Query($args);
  if (empty($cv_language)) {
    return null;
  } else {
    $post_name = get_post_type_object('cv_language');
    $cv_language_slug = trim($post_name->name, "cv_");
    // $post_name->rewrite->slug
    $cv_language_obj = array(
      'name' => $post_name->labels->menu_name,
      'slug' => $cv_language_slug,
      'posts' => $cv_language->posts
    );
    //  $cv_data[] = array( 'languages' => $cv_language_obj );
  }


  // GET all the SKILLS from DB
  $args = array(
    'post_type' => 'cv_skill',
    'post_status' => 'publish',
    'posts_per_page' => -1
  );
  // verificar rutina de pinch para agregar custom metaboxes
  $cv_skill = new WP_Query($args);
  if (empty($cv_skill)) {
    return null;
  } else {
    $post_name = get_post_type_object('cv_skill');
    $cv_skill_slug = trim($post_name->name, "cv_");
    // $post_name->rewrite->slug

    $skillz = $cv_skill->posts;
    foreach ($skillz as $single_skill) {
      $range = get_post_meta($single_skill->ID, 'cv_skill_range', true);
      $skill_build[] = array(
        'name' => $single_skill->post_title,
        // 'content' => $single_skill->post_content,
        'skill_range' => $range
      );
    }

    $cv_skill_obj = array(
      'name' => $post_name->labels->menu_name,
      'slug' => $cv_skill_slug,
      'posts' =>  $skill_build
      // 'posts'=> $cv_skill->posts
    );
    //  $cv_data[] = array( 'skills' => $cv_skill_obj );
  }


  // GET all the REPOSITORIES from DB
  $args = array(
    'post_type' => 'cv_repository',
    'post_status' => 'publish',
    'posts_per_page' => -1
  );
  // verificar rutina de pinch para agregar custom metaboxes
  $cv_repository = new WP_Query($args);
  if (empty($cv_repository)) {
    return null;
  } else {
    $repo_name = get_post_type_object('cv_repository');
    $cv_repository_slug = trim($repo_name->name, "cv_");
    
    $repos =  $cv_repository->posts;
    foreach($repos as $single_repo) {
      $url_repo = get_post_meta( $single_repo->ID, 'cv_repository_range', true );
      $repo_build[] = array(
        'name' => $single_repo->post_title,
        'repo_name' => $url_repo
      );
    }
    // $repo_name->rewrite->slug
    $cv_repository_obj = array(
      'name' => $repo_name->labels->menu_name,
      'slug' => $cv_repository_slug,
      'posts' => $repo_build
     // 'url_repo' => 
    );
    // $cv_data[] = array( 'repositories' => $cv_repository_obj );
  }


  // GET all the PORTAFOLIO from DB
  $args = array(
    'post_type' => 'cv_portafolio',
    'post_status' => 'publish',
    'posts_per_page' => -1
  );
  // verificar rutina de pinch para agregar custom metaboxes
  $cv_portafolio = new WP_Query($args);
  if (empty($cv_portafolio)) {
    return null;
  } else {
    $post_name = get_post_type_object('cv_portafolio');
    $cv_portafolio_slug = trim($post_name->name, "cv_");
    // $post_name->rewrite->slug
    $cv_portafolio_obj = array(
      'name' => $post_name->labels->menu_name,
      'slug' => $cv_portafolio_slug,
      'posts' => $cv_portafolio->posts
    );
    //   $cv_data[] = array( 'portafolio' => $cv_portafolio_obj );
  }

  // $posts = get_posts( array(
  //   'author' => $data['id'],
  // ) );


  $all_data = array(
    'name' => $cv_person_name,
    'carrer' => $cv_person_carrer,
    'description' => $cv_person_description,
    'experiencies' => $cv_exper_obj,
    'studies' => $cv_study_obj,
    'languages' => $cv_language_obj,
    'skills' => $cv_skill_obj,
    'repositories' => $cv_repository_obj,
    'portafolio' => $cv_portafolio_obj
  );

  $cv_data = $all_data;

  return $cv_data;
}


add_action('rest_api_init', 'cv_route_register');

function cv_route_register()
{
  register_rest_route('cv', '/v1', array(
    'methods' => 'GET',
    'callback' => 'cv_get_contents',
  ));
}
