<?php

	require( 'config.php' );
	
	//start tuyaapi
	$tuya = new TuyaApi($config);

	$data = $tuya->token->get_new( );
	
	$data = $tuya->token->get_refresh( $data->result->refresh_token );