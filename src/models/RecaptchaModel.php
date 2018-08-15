<?php
/**
 * recaptcha plugin for Craft CMS 3.x
 *
 * A simple craft plugin for validating Google's Invisible reCAPTCHA v2
 *
 * @link      http://www.gamesbykyle.com
 * @copyright Copyright (c) 2018 Kyle Andrews
 */

namespace blendcraft\recaptcha\models;

use blendcraft\recaptcha\Recaptcha;

use Craft;
use craft\base\Model;

/**
 * RecaptchaModel Model
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Kyle Andrews
 * @package   Recaptcha
 * @since     0.0.0
 */
class RecaptchaModel extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some model attribute
     *
     * @var string
     */
    public $someAttribute = 'Some Default';

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
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}
