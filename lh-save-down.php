<?php
/*
Plugin Name: LH Save down
Plugin URI: http://lhero.org/plugins/lh-save-down/
Description: Saves post as text or html attachment, enabling you to download content
Author: Peter Shaw
Version: 1.1
Author URI: http://shawfactor.com
*/

include_once('includes/admin-gui.php');



function lh_save_down_i_denude($variable){
  return(eregi_replace( "<br>", "\n", $variable)); 
} 

function lh_save_down_i_denudef($variable){ 
  return(eregi_replace("<[^>]*>", "", $variable));
} 

function lh_save_down_oa_exec() {

global $post;
  if ( $_GET['lh-save-down-output'] == 'text' ) {
    $req = $_SERVER['REQUEST_URI'];
    $my_id = url_to_postid($req);

    $xa_post = get_post($my_id); 
    $value = "Post Title: " . $xa_post->post_title . "\n";
    $value .= $xa_post->post_content;
    $value .= "\n"; 

    $PHPrint = ("$value"); 
    $PHPrint = lh_save_down_i_denude("$PHPrint"); 
    $PHPrint = lh_save_down_i_denudef("$PHPrint");
    $PHPrint = str_replace( "</font>", "", $PHPrint ); 
    $PHPrint = stripslashes("$PHPrint"); 

    $title = $xa_post->post_name;
    $length = strlen($PHPrint);

    header ("Content-Type: text/plain"); 
    header ("Content-Length: {$length}"); 
    header ("Content-Disposition: attachment;filename={$title}.txt");

    echo $PHPrint;

die;
 
  }   else if ( $_GET['lh-save-down-output'] == 'html' ) {


$path = get_option('lh_save_down_template_directory_path');

ob_start();

if (file_exists(WP_PLUGIN_DIR.$path.'lh_save_down-html-post_template.php')){

$dir = WP_PLUGIN_DIR.$path.'lh_save_down-html-post_template.php';

} elseif (file_exists(get_stylesheet_directory().'/lh_save_down-html-post_template.php')){

$dir = get_stylesheet_directory().'/lh_save_down-html-post_template.php';

} else {

$dir = WP_PLUGIN_DIR.'/lh-save-down/templates/'.'lh_save_down-html-post_template.php';

}





require_once($dir);


$output = ob_get_contents();

ob_end_clean();



    $title = strtolower(sanitize_file_name(get_the_title()));

    $length = strlen($output);

    header ("Content-Type: text/html; charset=utf-8");
    header ("Content-Length: {$length}"); 
    header ("Content-Disposition: attachment;filename={$title}.html");

    echo $output; 

die;
}
}

add_action('template_redirect', 'lh_save_down_oa_exec');

?>