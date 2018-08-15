![Screenshot](resources/img/plugin-logo.png)

# reCAPTCHA v3 for Craft CMS 3

A simple craft plugin for validating Google's reCAPTCHA v3

# Documentation

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and tell composer to require the plugin `composer require blendcraft/recaptcha`
1. In the Control Panel, go to Settings -> Plugins and click the “Install” button for Recaptcha.

## Configuring

Go to Settings -> Plugins -> reCAPTCHA for Craft -> Settings. Paste your site and secret keys for [Google reCAPTCHA v3](https://www.google.com/recaptcha/admin).

## Using recaptcha

1. Build your form element [eg: form](docs/form-sample.md)
1. Add your site key to the `<form>` element with `data-key="{{ craft.recaptcha.getPublicKey() }}"`
1. In the JavaScript for the `<form>` create the following variables:
  - `$form = $('.js-form);`
  - `var CSRFtoken = $form.find('input[name="CRAFT_CSRF_TOKEN"]').val();`
  - `var key = $form.data('key')`
1. Get Googles reCAPTCHA API via AJAX to avoide a race condition [eg: ajax](docs/load-api.md)
  - Alternately you can attach the script to the page with `<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=SITE_KEY"></script>`  and provide an [onload callback](https://developers.google.com/recaptcha/docs/display#explicit_render)
1. Execute `grecaptcha` before AJAXing the token to the plugin for verification [eg: sample code](docs/verification.md)
1. Handle your business as usual

## Verification Response Object

When verifying a token the server will respond with a verification JSON object. When parsed it will appear like:

```
Object{
  action: "homepage",
  score: 0.9,
  status: 1,
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

## Roadmap

* ~~Initial Release~~

Brought to you by [Kyle Andrews](http://www.gamesbykyle.com)
