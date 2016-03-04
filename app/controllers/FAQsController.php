<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url,
    \helpers\session;

use \models\Faq as FAQ;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class FAQsController extends Controller {
    
    public function store ()
    {
        global $input;
        $data = $input->all();
        if ( $this->validate( $input->all(), FAQ::$rules ) ) {
            $new = FAQ::create($data);
            if ( $new->save() ) {
                session::flash(['success'=>'Succesfully created FAQ.']);
                url::redirect('/admin/faq',true);
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
