<?php
/**
 * recaptcha plugin for Craft CMS 3.x
 *
 * A simple craft plugin for validating Google's Invisible reCAPTCHA v2
 *
 * @link      http://www.gamesbykyle.com
 * @copyright Copyright (c) 2018 Kyle Andrews
 */

namespace codewithkyle\recaptcha\variables;

use codewithkyle\recaptcha\Recaptcha;

use Craft;

/**
 * recaptcha Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.recaptcha }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Kyle Andrews
 * @package   Recaptcha
 * @since     0.0.0
 */
class RecaptchaVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Gets the public key defined in the plugins settings for use on the front
     * end. It can be accessed from any twig template by using:
     * 
     * @example {{ craft.recaptcha.getPublicKey }}
     *
     * @return string
     */
    public function getPublicKey()
    {
        $key = Recaptcha::getInstance()->settings->publicKey;
        return $key;
    }
}
