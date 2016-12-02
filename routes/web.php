<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use Twilio\Twiml;

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->post('/voice', ['middleware' => 'TwilioRequestValidator',
  function () use ($app) {
    $twiml = new Twiml();
    $twiml->say('Hello World!');

    return response($twiml)
                   ->header('Content-Type', 'text/xml');
  }
]);

$app->post('/message', ['middleware' => 'TwilioRequestValidator',
  function (Request $request) use ($app) {
    $bodyLength = strlen($request->input('Body'));

    $twiml = new Twiml();
    $twiml->message("Your text to me was $bodyLength characters long. ".
                    "Webhooks are neat :)");

    return response($twiml)
                   ->header('Content-Type', 'text/xml');
  }
]);
