<?php

Class User {

      //Properties - varibles that belong to the class

      //public can be accessed directly
      /*
        //declare instance
        $user = new User();
        if($user->logged_in) {...}
      */
      public $logged_in = false;

      //protected can only be accessed from outside class, so need functions to return values
      /*
        $user = new User();
        $user->get_full_name(); //method must be public
      */
      protected $surname;
      protected $firstname;
      protected $dob;

      //private - same as protected, but cannot be inherited by derived classes

      private $user_file_path = "../data/users.csv"; //or could be connection string?

      //Methods - functions that belong to the class
      public function set_name($first, $second){

        $this->firstname = $first;
        $this->surname = $second;

      }

      public function set_dob($date_of_birth){

        $this->dob = $date_of_birth;

      }

      public function get_full_name() {

        return $this->firstname." ".$this->surname;

      }

      public function create_user($data) {
        //write to data file and return success or failure

        

      }

}

?>
