<?php
    /** application/libraries/MY_Form_validation **/
    class MY_Form_validation extends CI_Form_validation
    {
        public $CI;

        public function error_array()
        {
            return $this->_error_array;
        }
    }
