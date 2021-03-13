<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

/* create roles */
function go_gallery_add_role() {
	add_role( 'gogalery', 'Go Gallery Admin' );
}

/* delete roles */
function go_gallery_remove_role() {
	remove_role( 'gogalery', 'Go Gallery Admin' );
}

/* add capabilities */
function go_gallery_add_capabilities() {

	$roles = array( 'administrator', 'editor', 'gogalery' );

	foreach( $roles as $the_role ) {
		$role = get_role( $the_role );
		$role->add_cap( 'read' );
		$role->add_cap( 'edit_projects' );
		$role->add_cap( 'publish_projects' );
		$role->add_cap( 'edit_published_projects' );
		$role->add_cap( 'edit_others_projects' );
		$role->add_cap( 'delete_others_projects' );

	}

	$manager_roles = array( 'administrator', 'editor' );

	foreach( $manager_roles as $the_role ) {
		$role = get_role( $the_role );
		$role->add_cap( 'read_private_projects' );
		$role->add_cap( 'edit_others_projects' );
		$role->add_cap( 'edit_private_projects' );
		$role->add_cap( 'delete_projects' );
		$role->add_cap( 'delete_published_projects' );
		$role->add_cap( 'delete_private_projects' );
		$role->add_cap( 'delete_others_projects' );
	}

}

function go_gallery_remove_capabilities() {

	$manager_roles = array( 'administrator', 'editor' );

	foreach( $manager_roles as $the_role ) {
		$role = get_role( $the_role );
		$role->remove_cap( 'read' );
		$role->remove_cap( 'edit_projects' );
		$role->remove_cap( 'publish_projects' );
		$role->remove_cap( 'edit_published_projects' );
		$role->remove_cap( 'read_private_projects' );
		$role->remove_cap( 'edit_others_projects' );
		$role->remove_cap( 'edit_private_projects' );
		$role->remove_cap( 'delete_projects' );
		$role->remove_cap( 'delete_published_projects' );
		$role->remove_cap( 'delete_private_projects' );
		$role->remove_cap( 'delete_others_projects' );
	}

}