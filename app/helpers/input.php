<?php namespace helpers;

use \helpers\session;

/*
 * Document Helper - collection of methods for working with documents
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 1.0
 * @date updated Feb 07, 2015
 */
class Input {

    private $input = [];

    public function __construct()
    {        
        if ( $_POST ) {
            Session::set('input',$_POST);
            $this->input = $_POST;
        } else {
            $session_input = Session::get('input');
            $this->input = $session_input ? $session_input : [];
        }
    }

    public static function setup () {
        global $input;
        $input = new static();
    }

    public function get ($key)
    {
        if ( array_key_exists($key, $this->input) ) {
            return $this->input[$key];
        }
        return '';
    }

    public function all ()
    {
        return $this->input;
    }

    public function has ($key)
    {
        return array_key_exists($key, $this->input) && !empty($this->input[$key]);
    }

    public function update ($assoc)
    {
        if ( is_array($assoc) ) {
            $this->input = $assoc;
        }        
    }

    public static function reset ()
    {
        session::destroy('input');
    }

    public function is_empty ()
    {
        return count($this->input) === 0;
    }


}
