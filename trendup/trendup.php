<?php
/*
 * Plugin Name: trendUp
 * Description: This plugin solve`d sending data problem
 * Author: Alex Struzhko
 * Version: 0.01
 */
function feeds_base()
{
    global $wpdb;
    $sql_check = "SHOW TABLES LIKE '%trendup%'";
    $trend = $wpdb->get_var($sql_check);
    if (empty($trendup) or $trendup == '' or $trendup == null) {
        $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";
        $table_name = 'trendup';
        $sql = "CREATE TABLE {$table_name} (
            `id`  bigint(20) unsigned NOT NULL auto_increment,
            `InvId` varchar(255) NOT NULL default '',
            `OutSum`  bigint(20) NOT NULL default '0',
            `SignatureValue` varchar(255) NOT NULL default '',
            PRIMARY KEY  (id)
            )
            {$charset_collate};";
        $check_tab = $wpdb->get_var($sql);
    }
}
add_action('init', 'feeds_base');