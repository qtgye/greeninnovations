<?php namespace models;

use \core\model;

/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

class Faq extends Model {

    protected $fillable = [
        'category',
        'question',
        'answer',
    ];

    public static $rules = [
        'category' => 'required',
        'question' => 'required',
        'answer' => 'required',
    ];

    public static $plural = 'FAQs';




}
