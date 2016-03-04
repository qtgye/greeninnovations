<?php namespace helpers;

/*
 * Session Class - prefix sessions with useful methods
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.0
 * @date June 27, 2014
 */
class Session {

	/**
	 * Determine if session has started
	 * @var boolean
	 */
	private static $_sessionStarted = false;

	/**
	 * if session has not started, start sessions 
	 */
	public static function init(){

		if(self::$_sessionStarted == false){
			session_start();
			self::$_sessionStarted = true;
		}

	}

	/**
	 * Add value to a session
	 * @param string $key   name the data to save
	 * @param string $value the data to save
	 */
	public static function set($key,$value = false){

		/**
		* Check whether session is set in array or not
		* If array then set all session key-values in foreach loop
		*/
		if(is_array($key) && $value === false){

			foreach ($key as $name => $value) {
				$_SESSION[SESSION_PREFIX.$name] = $value;
			}

		} else {
			$_SESSION[SESSION_PREFIX.$key] = $value;
		}

	}

	/**
	 * extract item from session then delete from the session, finally return the item
	 * @param  string $key item to extract
	 * @return string      return item
	 */
	public static function pull($key){

		$value = $_SESSION[SESSION_PREFIX.$key];
		unset($_SESSION[SESSION_PREFIX.$key]);

		return $value;
	}

	/**
	 * get item from session
	 * 
	 * @param  string  $key       item to look for in session
	 * @param  boolean $secondkey if used then use as a second key
	 * @return string             returns the key
	 */
	public static function get($key,$secondkey = false){

		if($secondkey == true){

			if(isset($_SESSION[SESSION_PREFIX.$key][$secondkey])){
				return $_SESSION[SESSION_PREFIX.$key][$secondkey];
			}

		} else {

			if(isset($_SESSION[SESSION_PREFIX.$key])){
				return $_SESSION[SESSION_PREFIX.$key];
			}

		}

		return false;
	}

	public static function mergeToKey ($key = null, $value = '')
	{

		if ( $key ) {

			$existingValue = self::get($key);

			if ( is_array( $existingValue ) )
			{
				$existingValue = array_merge($existingValue,$value);
			}
			else if ( is_numeric($existingValue) )
			{
				$existingValue += $value;				
			}
			else if ( is_string($existingValue) ) {
				$existingValue .= $value;	
			}

			self::set($key,$existingValue);
		}	
		return null;
	}
	
	/**
	 * @return string with the session id.
	 */
	public static function id() {
		return session_id();
	}
	
	/**
	 * regenerate session_id
	 * @return string session_id
	 */
	public static function regenerate(){
		session_regenerate_id(true);
		return session_id();
	}

	/**
	 * return the session array
	 * @return array of session indexes
	 */
	public static function display(){
		return $_SESSION;
	}
	
	/**
	 * empties and destroys the session
	 */
	public static function destroy($key='') {
		if(self::$_sessionStarted == true) {

			if(empty($key)) {
				session_unset();
				session_destroy();
			} else {
				unset($_SESSION[SESSION_PREFIX.$key]);
			}

		}
	}

	public static function flash ( $flash_array = false) {
		if ( is_array($flash_array) ) {
			$current_flash = self::get('flash');
			$current_flash = $current_flash ? $current_flash : [];
			$new_flash = array_merge($current_flash,$flash_array);
			self::set('flash',$new_flash);
		}
	}

	public static function has_flash ($flash_key)
	{
		$flash = self::get('flash');
		if ( is_array($flash) ) {
			return array_key_exists($flash_key, $flash);
		}
		return false;
	}

	public function get_flash ($flash_key)
	{
		$flash = self::get('flash');
		return $flash[$flash_key];
	}

	public static function resetFlash ()
	{
		self::destroy('flash');
	}

}
