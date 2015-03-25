<?php

function lh_save_down_plugin_menu() {
add_options_page('LH Save Down Options', 'LH Save Down', 'manage_options', 'lh-save-down-identifier', 'lh_save_down_plugin_options');
}

function lh_save_down_plugin_options() {

if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

    // variables for the field and option names 
    	$lh_save_down_template_directory_opt_name = 'lh_save_down_template_directory_path';
	$lh_save_down_template_directory_field_name = 'lh_save_down_template_directory_path';

    $lh_save_down_template_directory_hidden_field_name = 'lh_save_down_template_directory_hidden_field';
   
 // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'

if( isset($_POST[  $lh_save_down_template_directory_hidden_field_name ]) && $_POST[  $lh_save_down_template_directory_hidden_field_name ] == 'Y' ) {
        // Read their posted value
	$lh_save_down_template_directory_opt_val = $_POST[ $lh_save_down_template_directory_field_name ];


        // Save the posted value in the database
	update_option( $lh_save_down_template_directory_opt_name, $lh_save_down_template_directory_opt_val );

        // Put an settings updated message on the screen



?>
<div class="updated"><p><strong><?php _e('Path saved', 'menu-test' ); ?></strong></p></div>
<?php

    } else {

$lh_save_down_template_directory_opt_val = get_option($lh_save_down_template_directory_field_name);

}

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __('LH Save Down template path', 'menu-test' ) . "</h2>";

    // settings form
    
    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $lh_save_down_template_directory_hidden_field_name; ?>" value="Y">

<p><?php _e("The directory of your custom html attachment template:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $lh_save_down_template_directory_field_name; ?>" value="<?php echo $lh_save_down_template_directory_opt_val; ?>" size="50">
</p>

<?php


$dir = WP_PLUGIN_DIR.$lh_save_down_template_directory_opt_val.'lh_save_down-html-post_template.php';

if (file_exists($dir)){

echo $dir;

}


?>

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>



</div>



<?php

	

}

add_action('admin_menu', 'lh_save_down_plugin_menu');







?>