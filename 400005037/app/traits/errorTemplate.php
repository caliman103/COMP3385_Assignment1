<?php
    trait ErrorTemplate {
        private $errorTemplate;

        public function createErrorTemplate() {
            $this->errorTemplate = [
                "empty" => " cannot be empty",
                "pattern" => ": invalid format",
                "maxLength" => " is too long",
                "minLength" => " is too short",
                "invalid" => "Invalid ",
                "taken" => " already taken"
            ];
        }//end constructor

        public function getErrorTemplate() {
            return $this->errorTemplate;
        }// end getErrorTemplate
    }//end ErrorTempate class
?>