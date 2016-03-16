<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url,
    \models\Info;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class PagesController extends Controller {

    public static $data = [
        'info' => []
    ];

    public function __construct ()
    {
        foreach (Info::all() as $key => $item) {
           self::$data['info'][$item->name] = $item->value;
        }
        \helpers\session::set('template','front');
    }
    
    public function home()
    {   
        $data = array_merge(self::$data,[
            'page' => 'home',
            'partners' => \models\Partner::all(),
            'projects' => \models\Project::get(3),
            'news' => \models\News::get(3),
        ]);

        View::rendertemplate('page',$data);
    }

    public function about()
    {
        $data = array_merge(self::$data,[
            'page' => 'about',
            'partners' => \models\Partner::all(),
        ]);
        View::rendertemplate('page',$data);
    }

    public function services ()
    {
        $data = array_merge(self::$data,[
            'page' => 'services',
        ]);
        View::rendertemplate('page',$data);
    }

    public function technologies ()
    {
        $data = array_merge(self::$data,[
            'page' => 'technologies',
        ]);
        View::rendertemplate('page',$data);
    }

    public function projects ()
    {
        $data = array_merge(self::$data,[
            'page' => 'projects',
            'projects' => \models\Project::all(),
        ]);
        View::rendertemplate('page',$data);
    }

    public function news ()
    {
        $data = array_merge(self::$data,[
            'page' => 'news',
        ]);
        View::rendertemplate('page',$data);
        
    }

}
