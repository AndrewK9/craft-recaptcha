# 1.1.0 - 2018-10-17

- Adds: Switched to Guzzle for verifying site key and token
- Fixes: Rewrites verify controller to use custom service
- Fixes: No longer requires v3 (checks if score is empty before getting it)
- Fixes: Updates plugin to new namespace
- Fixes: Updates `README.md` to provide better documentation

# 1.0.5 - 2018-08-03

- Fixes: Rewrites readme.md to show how to use the plugin from install to verifying actions and score

# 1.0.2 - 2018-08-03

- Added: Plugin returns all of the reCAPTCHA v3 [response params](https://developers.google.com/recaptcha/docs/v3#score) [#8](https://gitlab.com/blendcraft/craft-recaptcha/issues/8)
- Fixes: Makes the settings text inputs less wordy

# 1.0.0 - 2018-08-03

- Added: Initial plugin framework
- Added: `Verify Token` action in the `VerifyController` for accepting `POST` request [#1](https://gitlab.com/blendcraft/craft-recaptcha/issues/1)
- Added: Plugin settings section in CP for users to insert their public and private keys [#3](https://gitlab.com/blendcraft/craft-recaptcha/issues/3)
- Added: `Verify Token` action checks with Google's reCAPTCHA API if the provided token is valid [#2](https://gitlab.com/blendcraft/craft-recaptcha/issues/2)
- Added: Server responds with status and message as a `JSON`object [#5](https://gitlab.com/blendcraft/craft-recaptcha/issues/5)
- Added: Dynamic and useful error messages [#7](https://gitlab.com/blendcraft/craft-recaptcha/issues/7)
- Added: Initial documentation [#8](https://gitlab.com/blendcraft/craft-recaptcha/issues/8)
