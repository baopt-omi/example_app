<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require_once __DIR__.'/../vendor/autoload.php';

//$client = new Redmine\Client\NativeCurlClient('https://redmine.ominext.dev','b1ba196b818ee1f61bfa51196eea529fa7f05ec4');
//
//$sql = "SELECT * FROM issues WHERE assigned_to_id=460";

//$mysqli = new mysqli("localhost", "root", "", "dbname");
//$query = "INSERT INTO users (name, email, password)"

//function get_content($URL): bool|string
//{
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_URL, $URL);
//    $data = curl_exec($ch);
//    curl_close($ch);
//    return $data;
//}
//
//$conn = new mysqli("localhost", "root", "", "dbname") or die("ERROR:could not connect
//to the database!!!");
//
//$string = get_content("https://b1ba196b818ee1f61bfa51196eea529fa7f05ec4:X@redmine.ominext.dev");
//$json = json_decode($string, true);
//
//
//foreach($json['rates'] as $date => $conversion){
//
//    $timestamp = strtotime($date);
//    $qu
//
//    if ($conn->query($sql) === TRUE) {
//        echo "New record created successfully"."<br>";
//    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error."<br>";
//    }
//
//}
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);


