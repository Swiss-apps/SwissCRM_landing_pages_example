<?php

class MainController
{
    protected array $CFG;
    protected APIController $APIController;
    protected PixelController $PixelController;
    function __construct()
    {
        $config = array();
        include dirname(__DIR__).'/config.php';
        include 'APIController.php';
        include 'PixelController.php';
        $this->CFG = $config;
        $this->APIController = new APIController($this->CFG);
        $this->PixelController = new PixelController($this->CFG);
    }
    public function actionIndex($affId){
        $this->APIController->triggerClick($affId);
        $this->PixelController->getPixels();
        $pageViewPixel = '';
        $this->PixelController->renderPageViewPixel($pageViewPixel, 'landing_page');

        include dirname(__DIR__) . '/views/index.php';
        include dirname(__DIR__) . '/views/pixels.php';
    }
    public function actionContactUs(){
        include dirname(__DIR__) . '/views/contact_us.php';
    }
    public function actionPayment(){
        $pageViewPixel = '';
        $this->PixelController->renderPageViewPixel($pageViewPixel, 'checkout_page');

        include dirname(__DIR__) . '/views/payment.php';
        include dirname(__DIR__) . '/views/pixels.php';
    }
    public function actionConfirmOrder(){
        include dirname(__DIR__) . '/views/confirm_order.php';
    }
    public function actionUpsell(){
        $pageViewPixel = [];
        $this->PixelController->renderPageViewPixel($pageViewPixel, 'upsell_page');

        include dirname(__DIR__) . '/views/upsell.php';
        include dirname(__DIR__) . '/views/pixels.php';
    }
    public function actionThankYou(){
        $this->APIController->triggerSuccess();

        include dirname(__DIR__) . '/views/thankyou.php';
    }
    public function actionError(){
        include dirname(__DIR__) . '/views/error.php';
    }

    public function actionContactFormSubmit(){
        $this->APIController->triggerLead();

        header('Location: /Payment');
    }
    public function actionOrderFormSubmit(){
        $this->APIController->triggerCheckout();

        header('Location: /ConfirmOrder');
    }
    public function actionAcceptUpsell(){
        $this->APIController->triggerUpsell();

        header('Location: /ThankYou');
    }
    public function actionSendConfirmOrder(){
        $this->APIController->triggerConfirm();

        if($this->CFG['hasUpsellEnabled']){
            header('Location: /Upsell');
        } else {
            header('Location: /ThankYou');
        }
    }
}