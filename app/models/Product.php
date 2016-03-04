<?php namespace models;

use \core\model;

/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

class Product extends Model {

    protected $fillable = [
        'name',
        'category',
        'type',
        'image',
        'description',
        'info_file'
    ];

    public static $rules = [
        'name' => 'required',
        'category' => 'required',
    ];

    public static $plural = 'Products';


}
