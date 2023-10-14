<?php 
    require_once 'app/traits/errorTemplate.php';
    class Validate {
        use ErrorTemplate;
        private $validationErrors = [];

        public function __construct() {
            $this->createErrorTemplate();
        }//end constructor
        
        public function validateField($fieldInfo) {
             if($fieldInfo['canBeEmpty'] === false && empty($fieldInfo['value'])) {
                $this->validationErrors[$fieldInfo['fieldName']] = ucfirst($fieldInfo['fieldName']) . $this->errorTemplate['empty'];
            } else if(strlen($fieldInfo['value']) > $fieldInfo['maxLength']) {
                $this->validationErrors[$fieldInfo['fieldName']] = ucfirst($fieldInfo['fieldName']) . $this->errorTemplate['maxLength'];
            } else if(strlen($fieldInfo['value']) < $fieldInfo['minLength']) {
                $this->validationErrors[$fieldInfo['fieldName']] = ucfirst($fieldInfo['fieldName']) . $this->errorTemplate['minLength'];
            } else if(!($this->checkPattern($fieldInfo['pattern'], $fieldInfo['value']))) {
                $this->validationErrors[$fieldInfo['fieldName']] = ucfirst($fieldInfo['fieldName']) . $this->errorTemplate['pattern'];
            }
        }//end validateField


        private function checkPattern($patterns, $value) {
            foreach ($patterns as $pattern) {
                if(!preg_match($pattern, $value)) {
                    return false;
                }//end if
            }//end foreach
            return true;
        }//end checkPattern

        public function getValidationErrors() {
            return $this->validationErrors;
        }//end getValidationErrors
    }//end Validate class
?>