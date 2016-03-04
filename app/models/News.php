<?php namespace models;

use \core\model;

/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

class News extends Model {

    protected $fillable = [
        'title',
        'content',
    ];

    public static $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    public static $plural = 'News';

    public function __construct ($data = [])
    {
        parent::__construct($data);

        $this->table = 'news';
    }


}
