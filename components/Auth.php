<?php

class Auth
{
	public $db;
	
	public function __construct($db)
	{
		$this->db = $db;
	}
	
	public function register($email, $password)
    {
        $this->db->store("users", [
        	"email" => $email,
        	"password" => $password,
        ]);
    }
    
    public function login()
    {
    
    }
}