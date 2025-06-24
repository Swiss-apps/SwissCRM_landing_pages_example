<?php

class MainController
{
    protected $CFG;
    protected $APIController;
    function __construct()
    {
        $config = array();
        include dirname(__DIR__).'/config.php';
        include 'APIController.php';
        $this->CFG = $config;
        $this->APIController = new APIController($this->CFG);
    }
    public function actionIndex($affId){
        $this->APIController->triggerClick($affId);

        include dirname(__DIR__) . '/views/index.php';
    }
    public function actionContactUs(){
        include dirname(__DIR__) . '/views/contact_us.php';
    }
    public function actionPayment(){
        include dirname(__DIR__) . '/views/payment.php';
    }
    public function actionConfirmOrder(){
        include dirname(__DIR__) . '/views/confirm_order.php';
    }
    public function actionUpsell(){
        include dirname(__DIR__) . '/views/upsell.php';
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