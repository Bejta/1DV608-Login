<?php

namespace model;
session_start();


class LoginModel{

	private $username = "Admin";
	private $password = "Password";

    // Constructor creates an instance of LoginModel and sets session to true, only if session is not empty and is set
    public function __construct()
    {
        if(isset($_SESSION["statusLogin"]) && !empty($_SESSION["statusLogin"]))
            {
                $_SESSION["statusLogin"] = true;
            }
    }
    
    /*
     * Setters and getters of Username and Password (those are incapsulated in the beginning of this class)
     *
     */
	public function getUsername() 
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Returns false if no Session is detected, and returns boolean value of session if detected (true/false)
    public function isLoggedIn()
    {
        if(isset($_SESSION["statusLogin"]) && !empty($_SESSION["statusLogin"]))
        {
            return $_SESSION["statusLogin"];
        }
        return false;
    }

    // Kill the session!
    public function logout()
    {
       $_SESSION["statusLogin"] = false;
       session_destroy();
    }
    
    // Checks if Username AND Password are correct, and sets the session accordingly.
	public function login($u, $p){

            if($this->getUsername()===$u && $this->getPassword()===$p)
            {
                $_SESSION["statusLogin"] = true;
            } 
	}
}