<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

require_once('Fiche/Code/wordpress_product/wordpress/wp-config.php');
require_once('Fiche/Code/wordpress_product/wordpress/wp-includes/wp-db.php');

$output = fopen('php://output', 'w');
fputcsv($output, array('email'));

$emails = $wpdb->get_col( "SELECT * FROM form" );
foreach ($emails as $email) {
    fputcsv($output, array($email));
}

?>
