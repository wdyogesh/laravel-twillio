<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/*$router->get('/home', "VideoRoomsController@index");

$router->get('/video', 'ExampleController@videoCalling');

$router->get('/call', 'CallController@videoCall');

$router->get('/video_call', 'CallController@newTicket');

$router->post('/create', 'VideoRoomsController@createRoom');

$router->get('join/{roomName}', 'VideoRoomsController@joinRoom');*/


// new updated

$router->get('/home', function () {
    // return response()->view('');
    return view('index');
});

$router->get('/conference', 'ConferenceController@index');

$router->get('/conference/join', 'ConferenceController@showJoin');

$router->get('/conference/connect', 'ConferenceController@showConnect');

//Broadcast related routes
$router->get('/broadcast', 'BroadcastController@index');

$router->post('/broadcast/send', 'BroadcastController@send');

$router->post('/broadcast/play', 'BroadcastController@showPlay');

//Recording related routes
$router->get('/recordings', 'RecordingController@index');

$router->post('/recordings/create', 'RecordingController@create');

$router->post('/recordings/record', 'RecordingController@showRecord');

$router->get('/recordings/hangup', 'RecordingController@showHangup');
