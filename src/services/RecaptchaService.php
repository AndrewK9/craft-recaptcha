<?php
/**
 * recaptcha plugin for Craft CMS 3.x
 *
 * A simple craft plugin for validating Google's reCAPTCHA v3
 *
 * @link      http://www.codewithkyle.com
 * @copyright Copyright (c) 2018 Kyle Andrews
 */

namespace codewithkyle\recaptcha\services;

use codewithkyle\recaptcha\Recaptcha;

use Craft;
use craft\base\Component;
use GuzzleHttp\Client;

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
class RecaptchaService extends Component
{
    public function verify($token, $key)
    {
        $client = new Client();
        $responseMessage = array();

        if(strlen($token) == 0)
        {
            $responseMessage['status'] = 500;
            $responseMessage['message'] = 'Missing recaptcha token';
            return $responseMessage;
        }
        else if(strlen($key) == 0)
        {
            if(strlen($token) == 0)
            {
                $responseMessage['status'] = 500;
                $responseMessage['message'] = 'Missing recaptcha key';
                return $responseMessage;
            }
        }

        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'query' => [
                'secret' => $key,
                'response' => $token
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        if($result['success'] == true)
        {
            $responseMessage['status'] = 200;
            $responseMessage['timestamp'] = $result['challenge_ts'];

            // 'aciton' is new to v3 so we need to make sure it exist
            if(!empty($result['action']))
            {
                $responseMessage['action'] = $result['action'];
            }

            // 'score' is new to v3 so we need to make sure it exist
            if(!empty($result['score']))
            {
                $responseMessage['score'] = $result['score'];
            }

            return $responseMessage;
        } 
        else
        {
            $responseMessage['status'] = 500;
            if(strlen($key) == 0)
            {
                $responseMessage['message'] = 'You\'re missing your reCAPTCHA secret key';
            }
            else
            {
                $responseMessage['message'] = 'reCAPTCHA couldn\'t verify this user';
                if(!empty($result['error-codes']))
                {
                    $responseMessage['error-codes'] = $result['error-codes'];
                }
            }
            return $responseMessage;
        }
    }
}
