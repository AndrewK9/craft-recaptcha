<?php
/**
 * Dynamic Row Settings plugin for Craft CMS 3.x
 *
 * This plugin will force a 'Row Settings' block into a Dynamic Content Area matrix setup.
 *
 * @link      http://www.gamesbykyle.com
 * @copyright Copyright (c) 2018 Kyle Andrews
 */

namespace blendcraft\recaptcha\models;

use blendcraft\recaptcha\Recaptcha;
// use blendcraft\recaptcha\variables\RecaptchaVariable;
// use blendcraft\recaptcha\models\Settings;

use Craft;
use craft\base\Model;

/**
 * recaptcha Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Kyle Andrews
 * @package   recaptcha
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var array|null
     */
    public $publicKey;
    public $privateKey;

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['publicKey', 'privateKey'], 'required'],
            // ...
        ];
    }
}
