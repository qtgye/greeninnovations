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
        'image',
        'description',
        'info_file'
    ];

    public static $rules = [
        'name' => 'required',
        'category' => 'required',
    ];

    public static $plural = 'Products';

    public function getCategoriesText ()
    {
        $categories = array_map(function ($category)
        {
            switch ($category) {
                case 'residential-small'        : return 'Residential (Small)';
                case 'residential-multifamily'  : return 'Residential (Multi Family)';
                case 'commercial-default'       : return 'Commercial';
                case 'commercial-other'         : return 'Commercial (Other)';
                case 'industrial-default'       : return 'Industrial';
                case 'commercial-other'         : return 'Industrial (Other)';
            }
        }, $this->category);
        return $categories;
    }

}
