# Lumen with Twilio SDK

Use Twilio SDK with lumen and make use of request validation utilities to secure your webhooks.

## Run it

```bash
 php -S 127.0.0.1:3000 -t public
```
## Use ngrok

Install [ngrok](https://ngrok.com/download) and use it to forward twilio requests to your develoment environment:

```bash
ngrok http 3000
```

## Setup your Webhooks
Add your webhooks to your [Twilio Console](https://www.twilio.com/console/phone-numbers)
  - `http://your-ngrok-domain-here.ngrok.io/voice`
  - `http://your-ngrok-domain-here.io/message`

## License

[MIT license](http://opensource.org/licenses/MIT)
