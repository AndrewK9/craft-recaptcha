<?php
/**
 * recaptcha plugin for Craft CMS 3.x
 *
 * A simple craft plugin for validating Google's Invisible reCAPTCHA v2
 *
 * @link      http://www.gamesbykyle.com
 * @copyright Copyright (c) 2018 Kyle Andrews
 */

namespace blendcraft\recaptcha\controllers;

use blendcraft\recaptcha\Recaptcha;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Kyle Andrews
 * @package   Recaptcha
 * @since     0.0.0
 */
class VerifyController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['verify-token'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a POST request by verifying the provided token is valid
     * by requesting validation from Google's recaptcah site verify API
     * e.g.: /recaptcha/verify
     *
     * @return mixed
     */
    public function actionVerifyToken()
    {
        $this->requirePostRequest();

        $request    = Craft::$app->getRequest();
        $token      = $request->getRequiredBodyParam('token');
        $key        = \blendcraft\recaptcha\Recaptcha::getInstance()->settings->privateKey;

        $validation = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$key&response=$token");
        $result = json_decode($validation, TRUE);

        $userMessage = array();

        if(strlen($token) == 0){
            $userMessage['status'] = 0;
            $userMessage['message'] = 'Missing recaptcha token param';
            return json_encode($userMessage);
        }

        if($result['success'] == 1) {
            $userMessage['status'] = 1;
            $userMessage['score'] = $result['score'];
            $userMessage['timestamp'] = $result['challenge_ts'];

            // Using same API as v2 but 'aciton' is new to v3
            // so we need to make sure it's set before adding it
            if(!empty($result['action'])){
                $userMessage['action'] = $result['action'];
            }

            return json_encode($userMessage);
        } 
        else{
            $userMessage['status'] = 0;
            if(strlen($key) == 0){
                $userMessage['message'] = 'You\'re missing your reCAPTCHA secret key';
            }
            else{
                $userMessage['message'] = 'reCAPTCHA couldn\'t verify this user';
                if(!empty($result['error-codes'])){
                    $userMessage['error-codes'] = $result['error-codes'];
                }
            }
            return json_encode($userMessage);
        }
    }
}
