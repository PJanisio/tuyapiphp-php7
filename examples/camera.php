<?php

	require( 'config.php' );
	
	$app_id = 'xxxxxxxxxxxxxxxxxx';
	
	$camera_id = 'xxxxxxxxxxxxxxxxxxxx';
	

//start tuyaapi
$tuya = new TuyaApi($config);
		
	// Get a token
	$token = $tuya->token->get_new( )->result->access_token;
	
	// Get camera stream link
	$tuya->devices( $token )->post_stream_allocate( $app_id , $camera_id , [ 'type' => 'rtsp' ] );