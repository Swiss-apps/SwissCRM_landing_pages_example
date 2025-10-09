<?php

class PixelController {
    protected array $CFG;
    function __construct($config){
        $this->CFG = $config;
    }
    public function getPixels()
    {
        $url = $this->CFG['API_BASE_URL'].'campaigns/'.$this->CFG['campaignId'].'/pixel_settings';
        $options = array(
            'http' => array(
                'method'  => 'GET',
                'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n".
                    "Authorization:".$this->CFG['API_KEY']."\r\n"
            )
        );

        // Make the GET request
        $context  = stream_context_create( $options );
        $result = @file_get_contents( $url, false, $context );
        $status_line = $http_response_header[0];
        preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);

        $status = $match[1];
        if ($result === false) {
            // Request failed
            return [];
        }

        // Optionally decode JSON
        $data =  json_decode($result, true);

        if ($status !== "200") {
            // header('Location: /Error');
            return [];
        }

        // Save to session
        if(!@$_SESSION['pageViewPixels']) $_SESSION['pageViewPixels'] = $data['data']['attributes']['campaign_pixel_settings'];

        return $data;
    }

    public function renderPageViewPixel(&$pixelToRender, $page){
        foreach ($_SESSION['pageViewPixels'] as $pixel) {
            if($pixel['page'] ==  $page){
                if($pixel['pixel_type'] == 'javascript'){
                    $pixelToRender = $pixel['pixel_value'];
                }
            }
        }
    }

    public function renderAffiliatePixel(&$pixelToRender, $response_key){
        $responsePixels = $_SESSION[$response_key]->data->attributes->pixel_events_data;
        foreach ($responsePixels as $responsePixel) {
            if ($responsePixel['pixel_variant'] == 'partial' && $responsePixel['pixel_type'] == 'javascript') {
                $pixelToRender = $responsePixel['pixel_value'];
            }
        }
    }
}