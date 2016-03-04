<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url,
    \helpers\session;

use \models\News as News;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class NewsController extends Controller {
    
    public function store ()
    {
        global $input;
        $data = $input->all();
        if ( $this->validate( $input->all(), News::$rules ) ) {
            $new = News::create($data);
            if ( $new->save() ) {
                session::flash(['success'=>'Succesfully created News.']);
                url::redirect('/admin/news',true);
                exit;
            } else {
                $errors->add(['Unable to save entry due to unknown error.']);
                url::previous();
            }            
        } else {
            url::previous();
        }

    }
}
