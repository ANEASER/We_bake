<?php

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobib\Model\SmsResponse;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;
use PSpell\Config;

require '../vendor/autoload.php';

class SMS {
    function sendSMS($phone, $message) {
        $apiURL = SMS_API_URL;
        $apiKey = SMS_API_KEY;

        $phone = "94" . substr($phone, 1);
        echo $phone;

        $configuration = new Configuration(host: $apiURL, apiKey: $apiKey);
        $smsApi = new SmsApi(config: $configuration);

        $destination = new SmsDestination(to: $phone);

        $message = new SmsTextualMessage(
            from: "We Bake",
            destinations: [$destination],
            text: $message
        );

        $request = new SmsAdvancedTextualRequest(
            messages: [$message]
        );

       $response = $smsApi->sendSmsMessage($request);

        // Check if the response is successful
        if ($response->getMessages()[0]->getStatus()->getGroupName() == "OK") {
            return true;
        } else {
            return true;
        }
    }
}
?>



