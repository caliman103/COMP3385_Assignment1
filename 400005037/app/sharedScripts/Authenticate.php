<?php
    require_once 'app/traits/errorTemplate.php';
    class Authenticate {
        use ErrorTemplate;
        private $authenticationErrors = [];
        private $model;
        
        public function __construct($theModel) {
            $this->createErrorTemplate();
            $this->model = $theModel;
        }//end
        
        public function authenticateField($criteria) {
            foreach ($criteria['methods'] as $method) {
                //if(method_exists($this->model, $method)) {
                    if(!$this->model->$method(...$criteria['parameters'][$method])) {
                        $this->authenticationErrors[$criteria['fieldName']] = ucfirst($criteria['fieldName']) . $this->errorTemplate[$criteria['errors'][$method]];
                    }
                //}//end if
            }//end foreach
        }//end authenticateField

        public function getAuthenticationErrors() {
            return $this->authenticationErrors;
        }//end getValidationErrors
    }//end AUthenticate class
?>