<?php namespace models;

use \core\model;

/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

class PageModule extends Model {

    protected $fillable = [
        'name',
        'value'
    ];

    public static $plural = 'Page Modules';

    public static $modules = [
        'home' => [
            'home-hero-carousel'
        ]
    ];

    public static $pages = [
        'home' => 'Home'
    ];

    public function __construct ($data = [])
    {
        parent::__construct($data);

        $this->table = 'modules';
    }

    


}
