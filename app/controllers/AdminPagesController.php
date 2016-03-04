<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url;

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
        self::$data['view'] = $this->view;
        \helpers\session::set('template','admin');
        \helpers\session::set('errors',\helpers\session::get('errors'));
    }

    /**
     * Define Index page title and load template files
     */
    public function index() {
        global $errors;
        $errors = \helpers\session::get('errors');
        self::update_page_data();
        $data = array_merge( self::$data, [
            'method' => 'index',
            'page' => 'index',
            'page_title' => 'Welcome'
        ]);
        View::rendertemplate('_page', $data);
    }

    public function all($model_name)
    {
        if ( array_key_exists($model_name, self::$data['resourced_models'])  ) {

            $model = '\\models\\' . ucfirst($model_name);
            self::update_page_data($model_name); 
            $data = array_merge( self::$data, [
                        'method' => 'all',
                        'page_title' => ucfirst($model::$plural),
                        'model_plural' => $model::$plural,
                        'items' => $model::all()
                    ]);
            View::rendertemplate('_page', $data);

        } else {

            url::redirect('/admin',true);

        }
    }

    public function create($model_name) {
        global $errors;
        $errors = \helpers\session::get('errors');
        self::update_page_data($model_name);
        $data = array_merge( self::$data, [
            'method' => 'create'
        ]);

        View::rendertemplate('_page', $data);
        $this->resetSessionErrors();
    }

    public function edit($model_name, $id)
    {
        if ( array_key_exists($model_name, self::$data['resourced_models']) || $model_name == 'media' ) {

            $model = '\\models\\' . ucfirst($model_name);
            self::update_page_data($model_name);
            $data = array_merge(self::$data,[
                        'model_plural'  => $model::$plural,
                        'subpage'       => 'update',
                        'subpage_title' => 'Update',
                        'submit_text'   => 'Save',
                        'method'        => 'edit',
                        $model_name     => call_user_func( [$model,'find'], $id )
                    ]);

            if ( $data[$model_name] !== NULL ) {
                View::rendertemplate('_page',$data);
            } else {
                url::redirect('/admin/' . $model_name, true);
            }

        } else {
            url::redirect('/admin', true);
        }        
    }

    public function info ()
    {
        exit;

        $infos = [];
        foreach (\models\Info::all() as $item) {
            $infos[ $item->name ] = $item->value;
        }

        $model = '\models\Info';
        self::update_page_data('info');

        $data = array_merge( self::$data, [
            'method' => 'edit',
            'model_plural' => $model::$plural,
            'submit_text' => 'Save',
            'items' => $infos,
        ]);

        View::rendertemplate('_page', $data);
    }

    public function get_upload_limit(Request $request)
    {
        $response = [
            'success' => false,
            'data' => []
        ];

        $post_max_size = (integer) trim(ini_get('post_max_size'),'M');
        $upload_max_filesize =  (integer) trim(ini_get('upload_max_filesize'),'M');
        // size in MB
        $post_max_size *= 1048576;
        $upload_max_filesize *= 1048576;

        $response = array_merge( $response, [
            'success' => true,
            'data' => compact( 'post_max_size',  'upload_max_filesize')
        ]);

        return json_encode($response);
    }

    private function resetSessionErrors ()
    {
        global $errors;
        $errors = null;
        \helpers\session::destroy('errors');
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
            self::$data['images'] = \models\Media::images();
            self::$data['has_image_modal'] = true;
        }
    }

}
