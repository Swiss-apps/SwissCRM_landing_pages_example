<?php
class APIController{
    protected array $CFG;
    function __construct($config){
        $this->CFG = $config;
    }
    public function triggerClick($affId){
        $reqData = array(
            'aff_id' => $affId,
            'campaign_id' => $this->CFG['campaignId'],
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'geo_state' => "IT",
            'geo_country' => "IT",
            'device' => $_SERVER['HTTP_USER_AGENT'],
        );
        $response = $this->buildAndSendPostRequest('/clicks', $reqData);
        $_SESSION['session_token'] = $response->data->attributes->session_token;
    }
    public function triggerLead(){
        $reqData = array(
            "session_token" => $_SESSION['session_token'],
              "lead" => array(
                "first_name" => $_REQUEST['fields_fname'],
                "last_name" => $_REQUEST['fields_lname'],
                "email" => $_REQUEST['fields_email'],
                "phone" => $_REQUEST['fields_phone'],
                "address_risk_data" => "",
                "ship_address1" => $_REQUEST['fields_address1'],
                "ship_address2" => "",
                "ship_city" => $_REQUEST['fields_city'],
                "ship_state" => $_REQUEST['fields_state'],
                "ship_country" => "IT",
                "ship_postal_code" => $_REQUEST['fields_zip'],
                "locale" => "it-IT",
                "send_partial_pixels" => true,
                "has_upsell" => true,
                "additional_details" => array()
              )
        );

        $response = $this->buildAndSendPostRequest('/leads', $reqData);
        $_SESSION['lead'] = $response->data->attributes;
    }
    public function triggerCheckout(){
        $reqData = array(
            "session_token" => $_SESSION['session_token'],
            "order" => array(
                "cc_risk_data" => "",
                "payment_source_attributes" => array(
                    "card" => array(
                        "month" => $_REQUEST['cc_expmonth'],
                        "year" =>  $_REQUEST['cc_expyear'],
                        "number" => preg_replace(':[\s!"#$%&\'()*+,-./\\\~]:', '', $_REQUEST['credit_card']),
                        "cvv" => $_REQUEST['cc_cvv'],
                        "name" => $_REQUEST['fields_fname']." ".$_REQUEST['fields_lname'],
                    ),
                    "redirect_links" => array(
                        "success_url" => "https://google.com/"
                    ),
                    "hosted" => false
                ),
                "use_shipping_address" => true,
                "campaign_product_ids" => array(
                    $this->CFG['productId']
                )
            ),
            "pixel_data" => array(
                array(
                    "pixel_type" => "javascript",
                    "pixel_value" => "<script> !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script', '  https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '{c5}'); fbq('track', 'PageView'); fbq('track', 'Lead', {currency: 'USD'}) </script> <noscript> <img height='1' width='1' style='display:none' src='https://www.facebook.com/tr?id=  {sub5}&ev=PageView&noscript=1'/> </noscript>",
                    "page" => "upsell_page"
                )
            )
        );
        $response = $this->buildAndSendPostRequest('/orders/checkout', $reqData);
        $_SESSION['order'] = $response->data->attributes;
    }
    public function triggerUpsell(){
        $reqData = array(
            "session_token" => $_SESSION['session_token'],
            "order" => array(
                "campaign_product_ids" => array(
                    $this->CFG['upsellProductId']
                )
            )
        );

        $response = $this->buildAndSendPostRequest('/orders/upsell', $reqData);
        $_SESSION['upsell_order'] = $response->data;
    }
    public function triggerSuccess(){
        $reqData = array(
            "session_token" => $_SESSION['session_token'],
            "thank_you" => array(),
            "pixel_data" => array(
                array(
                    "pixel_type" => "javascript",
                    "pixel_value" => "<script> !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script', '  https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '{sub5}'); fbq('track', 'PageView'); fbq('track', 'Lead', {currency: 'USD'}) </script> <noscript> <img height='1' width='1' style='display:none' src='https://www.facebook.com/tr?id=  {sub5}&ev=PageView&noscript=1'/> </noscript>",
                    "page" => "thank_you_page"
                )
            )
        );

        $response = $this->buildAndSendPostRequest('/orders/success', $reqData);
        $_SESSION['successful_order'] = $response;
    }
    public function triggerConfirm(){
        $reqData = array(
            "session_token" => $_SESSION['session_token'],
            "order" => array(
                "aci" => array(
                    "approved" => true
                )
            ),
            "pixel_data" => array(
                array(
                    "pixel_type" => "javascript",
                    "pixel_value" => "<script> !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script', '  https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '{c5}'); fbq('track', 'PageView'); fbq('track', 'Lead', {currency: 'USD'}) </script> <noscript> <img height='1' width='1' style='display:none' src='https://www.facebook.com/tr?id=  {sub5}&ev=PageView&noscript=1'/> </noscript>"
                )
            )
        );

        $response = $this->buildAndSendPostRequest('/orders/confirm', $reqData);
        $_SESSION['confirmed_order'] = $response->data->attributes;
        $_SESSION['confirmed_order'] = $response->data->attributes;
    }
    protected function buildAndSendPostRequest($endpoint, $data){
        $url = $this->CFG['API_BASE_URL'].$endpoint;
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode( $data ),
                'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n".
                    "Authorization:".$this->CFG['API_KEY']."\r\n"
            )
        );

        $context  = stream_context_create( $options );
        $result = @file_get_contents( $url, false, $context );
        $status_line = $http_response_header[0];

        preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);

        $status = $match[1];

        if ($status !== "200") {
            header('Location: /Error');
        }
        if($this->CFG['enableAPILogging']) $this->logRequest($data, $result, $url);

        return  json_decode( $result );
    }

    protected function logRequest($request, $response, $url){
        $request = json_encode($request, JSON_PRETTY_PRINT);
        $response = json_encode(json_decode($response, true), JSON_PRETTY_PRINT);

        $stringToSave = '['.date('Y-m-d H:i:s').'] Request: '.$url.PHP_EOL.
            $request.PHP_EOL.
            '['.date('Y-m-d H:i:s').'] Response: '.$url.PHP_EOL.$response.PHP_EOL;
        file_put_contents('logs/api_log.log', $stringToSave,  FILE_APPEND);
    }

}
