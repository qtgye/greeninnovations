<?php namespace core;
use core\view,
	core\language,
	\helpers\session;

/*
 * controller - base controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

abstract class Controller {
	
	/**
	 * view variable to use the view class
	 * @var string
	 */
	public $view;
	public $language;

	/**
	 * on run make an instance of the config class and view class
	 */
	public function __construct(){
		
		//initialise the views object
		$this->view = new View();
		
		//initialise the language object
		$this->language = new Language();
		
	}

	public function validate ($data = [], $rules = [])
	{
		$has_error = false;

		foreach ($rules as $key => $value) {
			// var_dump($data[$key]);
			$is_valid = \helpers\gump::is_valid( [$key=>$data[$key]], [$key=>$rules[$key]] );
			if($is_valid !== true) {
			    Session::mergeToKey('errors',[$key => $is_valid[0]]);
			    $has_error = true;
			}
		}

		return !$has_error;
	}

}
