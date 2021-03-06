<?php

  /**
  * This exception is thrown when user provided invalid email address
  *
  * @version 1.0
  * @author Ilija Studen <ilija.studen@gmail.com>
  */
  class InvalidEmailAddressError extends Error {
    
    /**
    * Email address
    *
    * @var string
    */
    private $email;
  
    /**
    * Construct the InvalidEmailAddress
    *
    * @access public
    * @param void
    * @return InvalidEmailAddressError
    */
    function __construct($email, $message = null) {
      if(is_null($message)) $message = "Email address '$email' is not valid";
      parent::__construct($message);
      $this->setEmail($email);
    } // __construct
    
    /**
    * Return errors specific params...
    *
    * @access public
    * @param void
    * @return array
    */
    function getAdditionalParams() {
      return array(
        'email' => $this->getEmail()
      ); // array
    } // getAdditionalParams
    
    // ---------------------------------------------------
    //  Getters and setters
    // ---------------------------------------------------
    
    /**
    * Get email
    *
    * @param null
    * @return string
    */
    function getEmail() {
      return $this->email;
    } // getEmail
    
    /**
    * Set email value
    *
    * @param string $value
    * @return null
    */
    function setEmail($value) {
      $this->email = $value;
    } // setEmail
  
  } // InvalidEmailAddress

?>