<?php 

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Updates';
    $submenu['edit.php'][5][0] = 'Updates';
    $submenu['edit.php'][10][0] = 'Add Update';
    $submenu['edit.php'][16][0] = 'Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Updates';
    $labels->singular_name = 'Update';
    $labels->add_new = 'Add Update';
    $labels->add_new_item = 'Add Update';
    $labels->edit_item = 'Edit Update';
    $labels->new_item = 'Updates';
    $labels->view_item = 'View Update';
    $labels->search_items = 'Search Updates';
    $labels->not_found = 'No Updates found';
    $labels->not_found_in_trash = 'No Updates found in Trash';
    $labels->all_items = 'All Updates';
    $labels->menu_name = 'Updates';
    $labels->name_admin_bar = 'Updates';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );
