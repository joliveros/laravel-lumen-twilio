<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Twilio\Security\RequestValidator;

class TwilioRequestValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $requestValidator = new RequestValidator(env('TWILIO_APP_TOKEN'));

      $isValid = $requestValidator->validate(
        $request->header('X-Twilio-Signature'),
        $request->fullUrl(),
        $request->toArray()
      );

      if ($isValid) {
        return $next($request);
      } else {
        return (new Response('You are not Twilio :(', 403));
      }
    }
}
