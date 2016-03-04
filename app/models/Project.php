<?php namespace models;

use \core\model;

/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

class Project extends Model {

    protected $fillable = [
        'title',
        'image',
    ];

    public static $rules = [
        'title' => 'required',
        'image' => 'required',
    ];

    public static $plural = 'Projects';


}
