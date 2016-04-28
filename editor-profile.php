<?php
/**
 * Plugin Name: Editor Profile
 * Plugin URI: https://wordpress.org/plugins/editor-profile
 * Description: Adds an editor profile that can edit only new posts and pages.
 * Version: 1.0
 * Author: bi0xid
 * Author URI: http://bi0xid.es
 * License: GPL3
*/


// We add the editor role with a Contributor level
function editor_profile_add_editor_role() {

add_role('editor_profile', 'Editor (non-publisher)', array( 
    'read' => true, // True allows that capability
    'edit_posts' => true,
    'delete_posts' => false, // Use false to explicitly deny
  ) );

}

add_action('admin_init', 'editor_profile_add_editor_role');



// We add the capabilities - edit and publish
function editor_profile_add_caps() {
    // gets the editor role
    $role = get_role( 'editor_profile' );

    // This only works, because it accesses the class instance.
    // would allow the editor to edit others' posts for current theme only
    $role->add_cap( 'edit_others_posts' ); 
    $role->add_cap( 'edit_posts' ); 
    $role->add_cap( 'edit_others_pages' ); 
    $role->add_cap( 'edit_pages' ); 
}
add_action( 'admin_init', 'editor_profile_add_caps');


