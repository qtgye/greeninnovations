<?php namespace models;

use \core\model;

/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

class Partner extends Model {

    protected $fillable = [
        'name',
        'description',
        'video_link',
        'url',
        'image',
    ];

    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'video_link' => 'url',
        'url' => 'url',
    ];

    public static $plural = 'Partners';


}
