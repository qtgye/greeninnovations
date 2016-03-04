<?php namespace helpers;

use \helpers\session;

/*
 * Document Helper - collection of methods for working with documents
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 1.0
 * @date updated Feb 07, 2015
 */
class Errors {

    private $errors = [];

    public function __construct()
    {        
        $session_errors = session::get('errors');
        if ( !$session_errors ) {
            session::set('errors',[]);
            $session_errors = [];
        }
        $this->errors = $session_errors;
    }

    public function has ($key)
    {        
        $this->update_errors();

        if ( $key == 'any' ) {
            return count($this->errors) > 0;
        }
        return array_key_exists($key, $this->errors);
    }

    public function add ($error_array)
    {
        $this->errors = array_merge($this->errors,$error_array);
        session::mergeToKey('errors',$this->errors);
    }

    public function all ()
    {
        $this->update_errors();
        return $this->errors;
    }

    public static function setup ()
    {
        global $errors;
        $errors = new static();        
    }

    public static function reset ()
    {
        session::destroy('errors');
    }

    private function update_errors ()
    {
        $session_errors = session::get('errors');
        $this->errors = $session_errors ? $session_errors : [];        
    }

}
