<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url,
    \helpers\session,
    \controllers\AuthController;

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

        AuthController::check_auth();

        parent::__construct();
        self::$data['view'] = $this->view;
        self::$data['site_info'] = [];

        $info = \models\Info::all();
        foreach ($info as $info) {
            self::$data['site_info'][$info->name] = $info->value;
        }        
        \helpers\session::set('template','admin');        
    }

    /**
     * Define Index page title and load template files
     */
    public function index() {
        self::update_page_data();
        $data = array_merge( self::$data, [
            'method' => 'index',
            'page' => 'index',
            'page_title' => 'Welcome',
            'page_modules' => \models\PageModule::$pages
        ]);
        View::rendertemplate('page', $data);
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
                        'delete_confirm_modal' => true,
                        'items' => $model::all()
                    ]);
            View::rendertemplate('page', $data);

        } else {

            url::redirect('/admin',true);

        }
    }

    public function create($model_name) {
        $model = '\\models\\' . ucfirst($model_name);
        self::update_page_data($model_name);
        $data = array_merge( self::$data, [
            'model_plural'  => $model::$plural,
            'subpage'       => 'update',
            'subpage_title' => 'Update',
            'submit_text'   => $model_name != 'media' ? 'Create' : null,
            'method'        => 'create',
        ]);

        View::rendertemplate('page', $data);
    }

    public function update ($model_name,$id)
    {
        if ( array_key_exists($model_name, self::$data['resourced_models']) ) {
            global $input, $errors;
            $model = '\\models\\' . ucfirst($model_name);       

            // validate
            if ( $this->validate( $input->all(), $model::$rules ) ) {
                $res = call_user_func( [$model,'find'], $id );
                $res->update($input->all());
                $res->save();
                $input->update($res->attributes);
                session::flash(['success'=>'Succesfully updated entry.']);
                url::redirect('/admin/' . $model_name . '/' . $id, true);
            } else {
                url::previous();
            }
        }

        url::redirect('/admin/'.$model_name,true);
    }

    public function edit($model_name, $id)
    {
        if ( array_key_exists($model_name, self::$data['resourced_models']) || $model_name == 'media' ) {
            global $input;

            $model = '\\models\\' . ucfirst($model_name);
            $item = call_user_func( [$model,'find'], $id );

            if ( !$item ) {
                url::redirect('/admin/' . $model_name, true);
            }

            self::update_page_data($model_name);
            $data = array_merge(self::$data,[
                        'model_plural'  => $model::$plural,
                        'subpage'       => 'update',
                        'subpage_title' => 'Update',
                        'submit_text'   => 'Save',
                        'method'        => 'edit',
                        $model_name    => $item
                    ]);
            if ( $input->is_empty() ) {
                $input->update(get_object_vars($item));
            }            
            View::rendertemplate('page',$data);

        } else {
            url::redirect('/admin', true);
        }        
    }

    public function info ()
    {
        global $input;

        $infos = [];
        foreach (\models\Info::all() as $item) {
            $infos[ $item->name ] = $item->value;
        }

        $infos = array_merge($infos,$input->all());
        $input->update($infos);

        $model = '\models\Info';
        self::update_page_data('info');

        $data = array_merge( self::$data, [
            'method' => 'edit',
            'model_plural' => $model::$plural,
            'submit_text' => 'Save'
        ]);

        View::rendertemplate('page', $data);
    }

    public function modules ($page)
    {
        global $input;
        $model = '\models\PageModule';
        $pages = array_keys($model::$modules);

        // redirect  if not existing page
        if ( !in_array($page,$pages) ) {
            url::redirect('/admin/module/'.$pages[0],true);
        }

        // setup modules for current page
        $modules = [];
        $modules_query = $model::getWhere('name','in',$model::$modules[$page]);
        foreach ($modules_query as $key => $module) {
            $modules[$module->name] = $module->value;
        }
        $input->update($modules);

        // setup page data
        self::update_page_data('module');
        $data = [
            'page_title' => 'Page Modules',
            'page' => 'module',
            'method' =>'edit',
            'modules_pages' => $model::$pages,
            'modules_page' => $page,
            'model_name' => 'module',
            'module' => (object) ['id'=>$page],
            'controller_name' => 'PageModulesController',
            'submit_text' => 'Update Modules'
        ];
        $data = array_merge(self::$data,$data);

        

        View::rendertemplate('page', $data);
    }

    public function ajax ( $model_name )
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $data = $_POST;

        $response = [
            'success' => false,
            'data'  => null
        ];

        if ( $data['method'] == "DELETE" && isset($data['id']) ) {
            if ( array_key_exists($model_name, self::$data['resourced_models']) ) {
                $model = '\\models\\' . ucfirst($model_name);
                $item = $model::find($_POST['id']);
                if ( $item ) {
                    if ( $item->destroy() ) {
                        $response['success'] = true;
                        $response['data'] = [
                            'message' => 'The item was successfully deleted.'
                        ];
                    } else {
                        $response['data'] = [
                            'message' => 'The item was not delted due to some error.'
                        ];
                    }                    
                } else {
                    $response['data'] = [
                        'message' => 'The item does not exist.'
                    ];
                }
            }              
        }

        echo json_encode($response);
        exit;
    }

    public function get_upload_limit()
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

        echo json_encode($response);
        exit;
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
        if ( preg_match('/(product|partner|project|info|news|module)/i', $model_name ) ) {
            self::$data['images'] = \models\Media::images();
            self::$data['has_image_modal'] = true;
        }
    }

}
