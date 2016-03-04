<?php namespace models;

use \core\model;

/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

class Info extends Model {

    protected $fillable = [
        'name',
        'value_type',
        'value'
    ];

    public static $rules = [
        'site-title' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'logo' => 'required',
        'favicon' => 'required',
        'description' => 'required'
    ];

    public static $plural = 'Infos';

    public function __construct ($data = [])
    {
        parent::__construct($data);

        $this->table = 'info';
    }


}
