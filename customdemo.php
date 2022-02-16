<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
global $wpdb, $PasswordHash, $current_user, $user_ID;

require('wp-load.php');

$_POST['user_status'] = '1';
$user_id = wp_insert_user($_POST);



if ( is_wp_error( $user_id ) )
{
   echo json_encode($user_id->get_error_message());
}
else
{
   $execut = $wpdb->query($wpdb->prepare("UPDATE wp_users SET flag=1 WHERE ID = ".$user_id));
   echo json_encode('User created with user_id = '.$user_id);
}
die;