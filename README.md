![Screenshot](resources/img/plugin-logo.png)

# reCAPTCHA v3 for Craft CMS 3

A simple craft plugin for validating Google's reCAPTCHA v3

# Documentation

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and tell composer to require the plugin `composer require codewithkyle/recaptcha`
1. In the Control Panel, go to Settings -> Plugins and click the “Install” button for Recaptcha.

## Configuring

Go to Settings -> Plugins -> reCAPTCHA for Craft -> Settings. Paste your site and secret keys for [Google reCAPTCHA v3](https://www.google.com/recaptcha/admin).

## Using recaptcha

1. Build your form element [eg: form](docs/form-sample.md)
1. Add your site key to the `<form>` element with `data-key="{{ craft.recaptcha.getPublicKey() }}"`
1. In JavaScript we need the following variables:
  - `form = document.body.querySelector('form');`
  - `var key = form.getAttribute('data-key');`
1. Get Googles reCAPTCHA API with `<script src="https://www.google.com/recaptcha/api.js?render={{ craft.recaptcha.getPublicKey }}"></script>`
  - Or get the API when you need it [sample code](docs/get-api.md)
1. Execute `grecaptcha.execute` whenever users submit the form [sample code](docs/verification.md)
1. Based on the response do what you need to do

## Verification Response Object

When verifying a token the server will respond with a verification JSON object. When parsed it will appear like:

```
Object{
  action: "type",
  score: 0.9,
  status: 200,
  timestamp: "2018-08-03T19:48:00Z"
}
```

[Google's Documentation on Using Score](https://developers.google.com/recaptcha/docs/v3#score)
> reCAPTCHA v3 returns a score (1.0 is very likely a good interaction, 0.0 is very likely a bot). Based on the score, you can take variable action in the context of your site.

[Google's Documentation on Using Actions](https://developers.google.com/recaptcha/docs/v3#score)
> reCAPTCHA v3 introduces a new concept: actions. When you specify an action name in each place you execute reCAPTCHA you enable two new features:
>   - a detailed break-down of data for your top ten actions in the admin console
>   - adaptive risk analysis based on the context of the action (abusive behavior can vary)
> Importantly, when you verify the reCAPTCHA response you should also verify that the action name matches the one you expect.