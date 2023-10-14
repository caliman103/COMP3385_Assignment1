<?php
    require_once 'app/traits/fieldInfo.php';
    class IndexController {
        Use FieldInfo;
        private $indexModel;
        private $validator;
        private $authenticator;
        private $fields = ['email', 'password'];
        private $formErrors = [];


        public function __construct($validate = true) {
            //$this->getSharedScripts();
            if($validate) {
                //$this->registerModel = new registerModel();
                $this->validator = new Validate();
                $this->validate();
            } else { 
                require 'app/View/indexView.php';
            }
        }//end constructor

/*         private function getSharedScripts() {
            spl_autoload_register(function ($classname) {
                $file = '../app/sharedScripts/'.$classname.'.php';
                if(!file_exists($file)) {
                    return false;
                }//end if
                require_once $file;
            });
        }//end getSharedScripts */

        private function validate() {
            $this->startValidate();
            $this->formErrors = $this->validator->getValidationErrors();
            if(!empty($this->formErrors)) {
                require 'app/View/indexView.php';
            } else {
                $this->authenticate();
            }   
        }//end validate

        private function getDataToAuthenticate() {
            $data = [
                "fieldName" => 'email',
                "methods" => ['checkForUser'],
                "parameters" => [
                    "checkForUser" => [trim($_POST['email']), trim($_POST['password'])]
                ],
                "errors" => [
                    "checkForUser" => "invalid"
                ]
            ];
            $this->authenticator->authenticateField($data);
        }//end getDataToAuthenticate

        private function authenticate(){
            $this->indexModel = new indexModel();
            $this->authenticator = new Authenticate($this->indexModel);
            $this->getDataToAuthenticate();
            $this->formErrors = $this->authenticator->getAuthenticationErrors();
            if(!empty($this->formErrors)) {
                $this->formErrors['email'] .= "/Password";
                require 'app/View/indexView.php';
            } else {
                //echo var_dump($this->indexModel->getUser());
                session_start();
                $_SESSION['sessionUser'] = $this->indexModel->getUser();
                header('Location:./dashboard.php');
            }
        }//end authenticate
    }//end RegisterController class
?>