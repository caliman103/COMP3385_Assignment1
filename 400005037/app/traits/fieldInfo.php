<?php
trait FieldInfo {
    private $usernameInfo = [];
    private $emailInfo = [];
    private $passwordInfo = [];
    private $roleInfo = []; 

    private function getUsernameInfo() {
        $this->usernameInfo = [
            "fieldName" => "username",
            "value" => trim($_POST['username']),
            "canBeEmpty" => false,
            "pattern" => [],
            "maxLength" => 50,
            "minLength" => 3,
        ];
    }

    private function getEmailInfo() {
        $this->emailInfo = [
            "fieldName" => "email",
            "value" => trim($_POST['email']),
            "canBeEmpty" => false,
            "pattern" => [],
            "maxLength" => 50,
            "minLength" => 3
        ];
    }//end getEmailInfo

    private function getPasswordInfo() {
        $this->passwordInfo = [
            "fieldName" => "password",
            "value" => trim($_POST['password']),
            "canBeEmpty" => false,
            "pattern" => ["/[A-Z]/", "/[\d]/"],
            "maxLength" => 50,
            "minLength" => 10
        ];
    }//end getPasswordInfo

    private function getRoleInfo() {
        $this->roleInfo = [
            "fieldName" => "role",
            "value" => trim($_POST['role']),
            "canBeEmpty" => false,
            "pattern" => [],
            "maxLength" => 50,
            "minLength" => 1,
        ];
    }// end getRoleInfo

    private function startValidate() {
        foreach($this->fields as $field) {
            $function = 'get'.ucfirst($field).'Info';
            $this->$function();
            $traitName = $field.'Info';
            $this->validator->validateField($this->$traitName);
        }//end foreach
    }

    private function createRecord() {
        foreach($this->fields as $field) {
            $this->potentialRecord[$field] = trim($_POST[$field]);
        }
    }
}//end FileInfo class

?>