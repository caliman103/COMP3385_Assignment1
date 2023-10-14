<?php
    require_once 'app/traits/fieldInfo.php';
    class CreateUserController{
        Use FieldInfo;
        private $createUserModel;
        private $validator;
        private $authenticator;
        private $potentialRecord = [];
        private $fields = ['username', 'email', 'password','role']; //useful for the fieldInfo trait
        private $formErrors = [];

        public function __construct($validate = true) {
            if($validate) {
                $this->validator = new Validate();
                $this->validate();
            } else { 
                require 'app/View/createUserView.php';
            }
        }//end constructor

        private function validate() {
            $this->startValidate();
            $this->formErrors = $this->validator->getValidationErrors();
            if(!empty($this->formErrors)) {
                require 'app/View/createUserView.php';
            } else {
                $this->authenticate();
            }   
        }//end validate


        private function authenticate() {
            $this->createUserModel = new CreateUserModel();
            $this->authenticator = new Authenticate($this->createUserModel);
            $this->authenticateUsername();
            $this->formErrors = $this->authenticator->getAuthenticationErrors();
            if(!empty($this->formErrors)) {
                require 'app/View/createUserView.php';
            } else {
                $this->createRecord();
                $this->potentialRecord['password'] = password_hash($this->potentialRecord['password'],PASSWORD_DEFAULT);
                $this->createUserModel->insertRecord($this->potentialRecord);
                header('Location:./createUser.php');
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
        }
    }//end class
?>