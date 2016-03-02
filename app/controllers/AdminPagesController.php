<?php namespace controllers;
use core\view;
use core\controller;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class AdminPagesController extends Controller {

    public static $data = [
        'resourced_models' => [            
            'project' => 'Projects',
            'product' => 'Products',
            'partner' => 'Partners',
            'news'  => 'News',
            'faq' => 'FAQs',
            'media' => 'Media',
        ],
        'has_image_modal' => false,
        'site_info' => []
    ];

    /**
     * Call the parent construct
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Define Index page title and load template files
     */
    public function index() {
        self::update_page_data();
        $data = array_merge( self::$data, [
            'page' => 'index'
        ]);

        // View::rendertemplate('admin/_page',$data);
        $this->view->rendertemplate('admin/_page', $data);
    }

    /**
     * Define Subpage page title and load template files
     */
    public function subpage() {

    }

    /**
     * Updates the view variables that are frequently used in an admin page
     * @param  string $model_name = the model name from route 'admin/{model_naem}'
     * @return void            
     */
    public static function update_page_data($model_name = '')
    {
        self::$data['page_title'] = ucfirst($model_name);
        self::$data['page'] = $model_name;        
        self::$data['model_name'] = $model_name;
        self::$data['controller_name'] = self::$data['model_name'] . 'sController';

        // get images for particular models
        if ( preg_match('/(product|partner|project|info)/i', $model_name ) ) {
            self::$data['images'] = \App\Media::image()->latest()->get();
            self::$data['has_image_modal'] = true;
        }
    }

}
