<?php

  // Register Custom Post Type
function spire_custom_post_types() {

  // Members
  $labels = array(
    'name'                  => _x( 'People', 'Member General Name', 'text_domain' ),
    'singular_name'         => _x( 'Member', 'Member Singular Name', 'text_domain' ),
    'menu_name'             => __( 'People', 'text_domain' ),
    'name_admin_bar'        => __( 'Member', 'text_domain' ),
    'archives'              => __( 'Member Archives', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Member:', 'text_domain' ),
    'all_items'             => __( 'All Members', 'text_domain' ),
    'add_new_item'          => __( 'Add New Member', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Member', 'text_domain' ),
    'edit_item'             => __( 'Edit Member', 'text_domain' ),
    'update_item'           => __( 'Update Member', 'text_domain' ),
    'view_item'             => __( 'View Member', 'text_domain' ),
    'search_items'          => __( 'Search Member', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Member Photo', 'text_domain' ),
    'set_featured_image'    => __( 'Set Member photo', 'text_domain' ),
    'remove_featured_image' => __( 'Remove member photo', 'text_domain' ),
    'use_featured_image'    => __( 'Use as member photo', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into member', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this member', 'text_domain' ),
    'items_list'            => __( 'Members list', 'text_domain' ),
    'items_list_navigation' => __( 'Members list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter members list', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'Member', 'text_domain' ),
    'description'           => __( 'Member Description', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'page-attributes'),
    'taxonomies'            => array(),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );

  register_post_type( 'member', $args );


   // Works
  $labels = array(
    'name'                  => _x( 'Projects', 'Project General Name', 'text_domain' ),
    'singular_name'         => _x( 'Project', 'Project Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Projects', 'text_domain' ),
    'name_admin_bar'        => __( 'Project', 'text_domain' ),
    'archives'              => __( 'Project Archives', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Project:', 'text_domain' ),
    'all_items'             => __( 'All Projects', 'text_domain' ),
    'add_new_item'          => __( 'Add New Project', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Project', 'text_domain' ),
    'edit_item'             => __( 'Edit Project', 'text_domain' ),
    'update_item'           => __( 'Update Project', 'text_domain' ),
    'view_item'             => __( 'View Project', 'text_domain' ),
    'search_items'          => __( 'Search Project', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list'            => __( 'Projects list', 'text_domain' ),
    'items_list_navigation' => __( 'Projects list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter projects list', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'Project', 'text_domain' ),
    'description'           => __( 'Project Description', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'page-attributes'),
    'taxonomies'            => array( 'project_category' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'project', $args );

}
add_action( 'init', 'spire_custom_post_types', 0 );


// Register Custom Taxonomies
function spire_custom_taxonomies() {
  //Project Category
  $labels = array(
    'name'                       => _x( 'Project Categories', 'Project Category General Name', 'text_domain' ),
    'singular_name'              => _x( 'Project Category', 'Project Category Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Project Category', 'text_domain' ),
    'all_items'                  => __( 'All Items', 'text_domain' ),
    'parent_item'                => __( 'Parent Category', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
    'new_item_name'              => __( 'New Project Category Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Project Category', 'text_domain' ),
    'edit_item'                  => __( 'Edit Project Category', 'text_domain' ),
    'update_item'                => __( 'Update Project Category', 'text_domain' ),
    'view_item'                  => __( 'View Project Category', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Items', 'text_domain' ),
    'search_items'               => __( 'Search Items', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No items', 'text_domain' ),
    'items_list'                 => __( 'Items list', 'text_domain' ),
    'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'project_category', array( 'project' ), $args );

}
add_action( 'init', 'spire_custom_taxonomies', 0 );


