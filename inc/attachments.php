<?php 
define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the settings screen
add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance

function philosophy_attachments($attachments) {
    $post_id = null;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    if ( ! $post_id || get_post_format( $post_id ) != "gallery" ) {
        return;
    }


    $fields = array(
        array(
            'name'      => 'title',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'Title', 'philosophy-theme' ),    // label to display
        ),
    );

    $args = array(
        'label' => 'Gallery',
        'post_type' => array('post'),
        'filetype' => array('image'),
        'note' => "Add gallery images",
        'button_text' => __('Attach Gallery Image', 'philosophy-theme'),
        'fields' => $fields

    );

    $attachments->register('gallery', $args);
}
add_action('attachments_register', 'philosophy_attachments');