<?php namespace core;
use \helpers\gump;

/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

abstract class Model extends Controller {

	/**
	 * hold the database connection
	 * @var object
	 */
	protected $_db;

	/**
	 * contains fillable keys
	 * @var array
	 */
	protected $fillable = [];

	/**
	 * contains changeable attributes
	 * @var array
	 */
	public $attributes = [];

	/**
	 * table name
	 * @var string
	 */
	protected $table = '';
	
	/**
	 * create a new instance of the database helper
	 */
	public function __construct($data = []){

		//connect to PDO here.
		$this->_db = \helpers\database::get();

		// guess table name
		$class_name = get_called_class();
		$class_name = str_replace('models\\', '', $class_name);
		$this->table = strtolower($class_name) . 's';

		if ( is_array($data) ) {
			foreach ($this->fillable as $key) {
				$this->{$key} = $data[$key];
				$this->attributes[$key] = $data[$key];
			}
		}

		$datetime = date('Y-m-d H:i:s');

		$this->attributes['created_at'] = $datetime;
		$this->attributes['updated_at'] = $datetime;

	}

	protected function validate ( $data = [], $rules = [] )
	{
		$is_valid = \helpers\gump::is_valid($data, $rules);

		if ( $is_valid === true ) {
			return true;
		} else {
			// var_dump($is_valid);
			return false;
		}
	}

	/**
	 * saves the new instance to the database
	 * @return [type] [description]
	 */
	public function save ()
	{
		if ( $this->table ) {

			$id = $this->_db->insert(PREFIX.$this->table,$this->attributes);

			if ( !$id ) {
				return false;
			}

			$this->attributes['id'] = $id;
			$this->id = $id;

			return true;
		}

		$exception = new \Exception('The table name was not set for ' . self::class);
		\core\logger::exception_handler($exception);

	}

	/**
	 * finds an entry by id
	 * @param  integer $id the id of the entry to search
	 * @return object the entry
	 */
	public function findOne($id)
	{
		return $this->_db->select('SELECT * FROM '. PREFIX.$this->table . ' WHERE id = :id',[ ':id' => $id] );
	}

	private function queryAll ($sort_by = 'id', $order = 'DESC')
	{
		$result = $this->_db->select("SELECT * FROM " . PREFIX . $this->table . " ORDER BY " . $sort_by . " " . $order );
		return $result;
	}

	public static function find ($id)
	{
		$instance = new static();
		return $instance->findOne($id);
	}

	/**
	 * creates an instance of the model according to the data
	 * @param  array $data the data to be filled
	 * @return assoc. array 
	 */
	public static function create ($data)
	{
		$new = null;

		if ( is_array($data) ) {
			$new = new static($data);
			if ( !$new->save() ) {
				return null;
			}			
		}

		return $new;

	}

	public static function all ($sort_by = 'id', $order = 'DESC')
	{
		$instance = new static();
		return $instance->queryAll();
	}

}
