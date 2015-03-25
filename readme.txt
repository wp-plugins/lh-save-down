=== LH Save Down ===
Contributors: Peter Shaw
Donate link: http://lhero.org/lh-save-down/
Tags: post, posts, wordpress, download, html, text, attachment
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 1.1

Save post as text or save post as html. Only post content is saved all other stuff gets discarded.

== Description ==

Save post as text or save post as html. Useful for enabling downloads of your content.

== Installation ==

1. Upload the entire `lh-save-down` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Optionally if you want to change the format of your html downloads move the lh_save_down-html-post_template.php template into either your theme directory or into a folder in the plugins directory (in which case you need to set the location in Settings->LH Save Dow)n. The plugin will use these templates (plugin folder template first) when outputting the html attachment download.

== Frequently Asked Questions ==

= I installed the plugin but can not see any thing on post, how do I save? =

*Add ?lh-save-down-output=text (for text output) OR ?lh-save-down-output=html (for html output) to the url of any singular page. You may want to edit your theme files to add these parameters to the end of permalinks  to create download links.