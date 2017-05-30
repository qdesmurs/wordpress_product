<?php

/*
Plugin Name: show emails
Plugin URI:
Description: Un plugin pour afficher les addresses mails
Version: 0.1
Author: JDRV
Author URI:
License:
*/

defined('ABSPATH') or die ('No script kiddies please!');

add_action('admin_menu', 'show_emails_menu');

function show_emails_menu() {
    add_menu_page('List of Emails', 'Emails', 'manage_options', 'show_emails_menu', 'show_emails');
}

function show_emails(){
    echo "<p>Emails will be here</p>";

    // echo '<a href="'.get_site_url().'/wp-content/plugins/show_emails/save_mails.php">Download Emails</a>';

    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Emails</th>';
    echo '<th>Names</th>';
    echo '</tr>';

    global $wpdb;
    $show_email = $wpdb->get_results ( "SELECT * FROM wp_email" );
    foreach ( $show_email as $print ){
        echo '<tr>';
        echo '<td>' ;
        echo $print->email;
        echo '</td>';

        echo '<td>' ;
        echo $print->name;
        echo '</td>';
        echo '</tr>';

    }
}

?>
