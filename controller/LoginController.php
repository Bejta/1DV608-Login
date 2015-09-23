<?php

namespace controller;

require_once("view/LoginView.php");
require_once("model/LoginModel.php");

Class LoginController{


	private $view;
	private $model;
	
		
		public function __construct(\view\LoginView $view, \model\LoginModel $model) {
			$this->view = $view;
			$this->model = $model;
		}

        /*
         * The main function that do all dirty work.
         * The flow explained in the comments inside the function.
         *
         */
		public function runApp(){
               
               //Checks is user is already logged in....
               if ($this->model->isLoggedIn())
               {
               	        /* 
               	         * If user is already logged in, checks if user tried to logut.
               	         * If yes, logout function of Model executes, and message in View sets to "Bye bye!"....
               	         */
                        if($this->view->isLogoutPosted())
                        {
                        	  $this->model->logout();
                        	  $this->view->setMessage("Bye bye!");
                        }
                        /* 
                         * ... and if not, then user is already logged in and tried that again.
                         * In that case, do nothing but reset the message in View (it should be from 'Welcome' to '')
                         */
                        else
                        {
                              $this->view->resetMessage();
                        }
               }
               // If user is not logged in....
               else
               {
               	        /*
               	         * ...and tries to login, then try to login him/her in Model,
               	         * also validate his inputs in View.
               	         * In model a new session is created and state is true if successfull login, in View corespondive messages are set 
               	         */

               	        if($this->view->isLoginPosted())
               	        {
                              $this->model->login($this->view->getRequestUserName(), $this->view->getRequestPassword());
                              $this->view->setMessage($this->view->validation());
               	        }
               	        // ...and logout was tried, then do nothing but reset the message (from 'Bye bye!' to '')
               	        else
               	        {
               	        	   $this->view->resetMessage();
               	        }
               }
               // At the end of the day, re-render (it will check the state of session and set the new message)
               $this->view->response();
	}
	
}