<?php

namespace App\Services\Payments;

use App\Models\Settings;

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Illuminate\Support\Facades\Log;


class AuthnetService
{
    protected $name;
    protected $tranKey;
    protected $merchantAuthentication;

    public function __construct()
    {
        $this->name = Settings::getSetting('authnet_login', 1);
        $this->tranKey = Settings::getSetting('authnet_key', 1);

        $this->merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $this->merchantAuthentication->setName($this->name);
        $this->merchantAuthentication->setTransactionKey($this->tranKey);
    }

    public function createCustomerProfile($data)
    {
        $email = '';
        // Set credit card information for payment profile
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($data['cardNumber']);
        $creditCard->setExpirationDate($data['expirationDate']);
        $creditCard->setCardCode($data['cardCode']);
        $paymentCreditCard = new AnetAPI\PaymentType();
        $paymentCreditCard->setCreditCard($creditCard);

        // Create the Bill To info for new payment type
        $billTo = new AnetAPI\CustomerAddressType();
        $billTo->setFirstName($data['firstName']);
        $billTo->setLastName($data['firstName']);
        $billTo->setAddress($data['address']);
        $billTo->setCity($data['city']);
        $billTo->setState($data['state']);
        $billTo->setZip($data['zip']);
        $billTo->setCountry($data['country']);
        $billTo->setPhoneNumber($data['phoneNumber']);

        // Create a new CustomerPaymentProfile object
        $paymentProfile = new AnetAPI\CustomerPaymentProfileType();
        $paymentProfile->setCustomerType('individual');
        $paymentProfile->setBillTo($billTo);
        $paymentProfile->setPayment($paymentCreditCard);
        $paymentProfiles[] = $paymentProfile;


        // Create a new CustomerProfileType and add the payment profile object
        $customerProfile = new AnetAPI\CustomerProfileType();
        $customerProfile->setDescription($data['firstName']);
        $customerProfile->setMerchantCustomerId("M_" . $data['orderId']);
        $customerProfile->setEmail($data['email']);
        $customerProfile->setpaymentProfiles($paymentProfiles);


        // Assemble the complete transaction request
        $refId = 'ref' . time();
        $request = new AnetAPI\CreateCustomerProfileRequest();
        $request->setMerchantAuthentication($this->merchantAuthentication);
        $request->setRefId($refId);
        $request->setProfile($customerProfile);

        // Create the controller and get the response
        $controller = new AnetController\CreateCustomerProfileController($request);
        $response = $controller->executeWithApiResponse(constant('\net\authorize\api\constants\ANetEnvironment::' . env('ANET_ENVIRONMENT', 'SANDBOX')));

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
//            echo "Succesfully created customer profile : " . $response->getCustomerProfileId() . "\n";
//            $paymentProfiles = $response->getCustomerPaymentProfileIdList();
//            echo "SUCCESS: PAYMENT PROFILE ID : " . $paymentProfiles[0] . "\n";
        } else {
            $errorMessages = $response->getMessages()->getMessage();
            Log::error('authorize net error', [$errorMessages[0]->getCode(), $errorMessages[0]->getText(), $data]);
//            echo "ERROR :  Invalid response\n";
//            $errorMessages = $response->getMessages()->getMessage();
//            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
    }
}