
# Tuya Cloud Api PHP7

All glory goes to original [repo](https://github.com/ground-creative/tuyapiphp) - please buy them a coffee! :)  
This fork is for old guys which doesnt like to use composer and love to include classes directly and works with old PHP 7+

## What`s changed?  

- removed componser
- downgraded code to work with php 7+ (tested only with 7.4.33)
- changed config options to be included in full scope
- updated examples  

## Easiest device lookup code  

```php 
$config =
	[
	"secretKey" => "xxxxxxxxxxxxxxxxxxx" ,
	"accessKey" => "xxxxxxxxxxxxxxxxxxx" ,
	'baseUrl'		=> 'https://openapi.tuyaeu.com' ,
	'debug'		=> true,
	'associative' => false,
	'curl_http_version' => \CURL_HTTP_VERSION_1_1,
	];

	
	require( 'src/TuyaApi.php' );
	require( 'src/DebugHandler.php' );
	require( 'src/Caller.php' );
	require( 'src/Request.php' );
	require( 'src/Scenes.php' );
	require( 'src/Token.php' );
	require( 'src/Devices.php' );

	$app_id = 'xxxxxxxxxxxxxxxxxxxx';
	
	$device_id = 'xxxxxxxxxxxxxxxxxxx';
	
	//start tuyaapi
	$tuya = new TuyaApi($config);
	
	// Get a token
	$token = $tuya->token->get_new( )->result->access_token;
	
	// Get list of devices together with their parameters connected with android app
	$tuya->devices( $token )->get_app_list( $app_id );
	
	// Get device status
	$tuya->devices( $token )->get_status( $device_id );

	// Set device name
	$tuya->devices( $token )->put_name( $device_id , [ 'name' => 'FAN' ] );
	
	// Send command to device
	$payload = [ 'code' => 'switch_1' , 'value' => false ];
	$tuya->devices( $token )->post_commands( $device_id , [ 'commands' => [ $payload ] ] );
	```
