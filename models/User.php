<?php 

class User {
    protected $name;
    protected $email;
    protected $phoneNumber;
    protected $isVerified;
    protected $password;
    

    public function __construct($name, $email, $phoneNumber, $isVerified)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->isVerified = $isVerified;
    }
}

?>