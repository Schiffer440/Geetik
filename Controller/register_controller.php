<?php

require_once "controller.php";
require_once "../Models/register.php";
$subscription = new Register();

class registerController extends Controller{

    public function subPage()
    {
        require_once "../Models/register.php";
        $subscription = new Register();
        $smt = $subscription->getCities();
        $cities = $smt->fetchAll(PDO::FETCH_ASSOC);
        require_once "../Views/pages/subscription-page.php";
    }

    public function registrationSuccess()
    {
        require_once "../Views/pages/success_registration.php";
    }

    public function confirmInfos()
    {
        require_once "../Views/pages/confirm_subscription_infos.php";
    }

    public function setPassword()
    {
        require_once "../Views/pages/password-page.php";
    }
}