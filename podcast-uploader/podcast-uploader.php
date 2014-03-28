<?php
/***************
 * Plugin Name: IlliniBoard.com Podcast Uploader
 * Plugin URI: 
 * Description: This plugin leverages the Fine Uploader JavaScript upload to allow Podcast uploads through the WordPress Admin Panel.
 ***************/
 /**
 * @package IlliniBoard.com_Podcast_Uploader
 * @version 1.0
 */
add_action('admin_menu', 'podcast_uploader_menu');
add_action( 'admin_enqueue_scripts', 'load_uploader_styles_scripts' );
add_action( 'admin_head', 'add_uploader_template' );

function add_uploader_template() {
	echo '<script type="text/template" id="qq-template">';
    echo '<div class="qq-uploader-selector qq-uploader">';
    echo '<div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">';
	echo '<div class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>';
	echo '</div>';
	echo '<div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>';
	echo '<span>Drop files here to upload</span>';
	echo '</div>';
	echo '<div class="qq-upload-button-selector qq-upload-button">';
	echo '<div>Upload a file</div>';
	echo '</div>';
	echo '<span class="qq-drop-processing-selector qq-drop-processing">';
	echo '<span>Processing dropped files...</span>';
	echo '<span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>';
	echo '</span>';
	echo '<ul class="qq-upload-list-selector qq-upload-list">';
	echo '<li>';
	echo '<div class="qq-progress-bar-container-selector">';
	echo '<div class="qq-progress-bar-selector qq-progress-bar"></div>';
	echo '</div>';
	echo '<span class="qq-upload-spinner-selector qq-upload-spinner"></span>';
	echo '<span class="qq-edit-filename-icon-selector qq-edit-filename-icon"></span>';
	echo '<span class="qq-upload-file-selector qq-upload-file"></span>';
	echo '<input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">';
	echo '<span class="qq-upload-size-selector qq-upload-size"></span>';
	echo '<a class="qq-upload-cancel-selector qq-upload-cancel" href="#">Cancel</a>';
	echo '<a class="qq-upload-retry-selector qq-upload-retry" href="#">Retry</a>';
	echo '<a class="qq-upload-delete-selector qq-upload-delete" href="#">Delete</a>';
	echo '<span class="qq-upload-status-text-selector qq-upload-status-text"></span>';
	echo '</li>';
	echo '</ul>';
	echo '</div>';
    echo '</script>';
}

function load_uploader_styles_scripts() {
	wp_register_style('fineuploader-4_4_0', plugins_url('podcast-uploader/s3.jquery.fineuploader-4.4.0/fineuploader-4.4.0.css') );
	wp_enqueue_style('fineuploader-4_4_0');
	wp_enqueue_script('fineuploader-4_4_0_script', plugins_url('podcast-uploader/s3.jquery.fineuploader-4.4.0/s3.jquery.fineuploader-4.4.0.js') );
	wp_enqueue_script('podcast-uploader-script', plugins_url('podcast-uploader/podcast-uploader.js'));
}

function podcast_uploader_menu() {
	add_menu_page('Podcast Uploader', 'Podcast Uploader', 'manage_options', 'illiniboard-podcast-uploader', 'illiniboard_podcast_uploader_admin_screen');
}

function illiniboard_podcast_uploader_admin_screen() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<h1>IlliniBoard.com Podcast Uploader</h1>';
	echo '<p>Just click on the upload button, and find the file from your computer.  The file should be uploaded to the server and when it is completed, the URL will be provided on the screen.</p>';
	echo '<div id="fine-uploader"></div>';
	echo '</div>';

}

?>