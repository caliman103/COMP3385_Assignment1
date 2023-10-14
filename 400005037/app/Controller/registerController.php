<?php
    require_once 'app/traits/fieldInfo.php';
    class RegisterController {
        Use FieldInfo;
        private $registerModel;
        private $validator;
        private $authenticator;
        private $potentialRecord = [];
        private $fields = ['username', 'email', 'password'];
        private $formErrors = [];

        public function __construct($validate = true) {
            //$this->getSharedScripts();
            if($validate) {
                $this->validator = new Validate();
                $this->validate();
            } else { 
                require 'app/View/registerView.php';
            }
        }//end constructor

        private function validate() {
            $this->startValidate();
            $this->formErrors = $this->validator->getValidationErrors();
            if(!empty($this->formErrors)) {
                require 'app/View/registerView.php';
            } else {
                $this->authenticate();
            }   
        }//end validate


        private function authenticate() {
            $this->registerModel = new registerModel();
            $this->authenticator = new Authenticate($this->registerModel);
            $this->authenticateUsername();
            $this->formErrors = $this->authenticator->getAuthenticationErrors();
            if(!empty($this->formErrors)) {
                require 'app/View/registerView.php';
            } else {
                $this->createRecord();
                $this->potentialRecord['password'] = password_hash($this->potentialRecord['password'],PASSWORD_DEFAULT);
                $this->registerModel->insertRecord($this->potentialRecord);
                header('Location:./index.php');
            }
        }//end authenticate

        private function authenticateUsername() {
            $this->potentialRecord['username'] = trim($_POST['username']);
            $usernameCriteria = [
                "fieldName" => "username",
                "value" => $this->potentialRecord['username'],
                "methods" => ["checkForUser"], 
                "parameters" => [
                    "checkForUser" => [$this->potentialRecord['username']],
                ],
                "errors" => [
                    "checkForUser" => "taken"
                ]
            ];
            $this->authenticator->authenticateField($usernameCriteria);
        }//end authenticateUsername
    }//end RegisterController class
?>