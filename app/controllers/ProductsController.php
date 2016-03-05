<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url,
    \helpers\session;

use \models\Product,
    \models\Media;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class ProductsController extends Controller {
    
    public function store ()
    {
        global $input;
        $data = $input->all();

        if ( $input->has_file('info_file') ) {
            $file = $input->get_file('info_file');
            $pdf = Media::upload($file,$data);
            if ( $pdf ) {
                $data = array_merge($data,[
                                'info_file' => $pdf->file_name
                            ]);
                $input->update($data);
            }
        }

        if ( $this->validate( $data, Product::$rules ) ) {

            $data['category'] = implode(',', $data['category']);
            $new = Product::create($data);

            if ( $new->save() ) {
                session::flash(['success'=>'Succesfully created project.']);
                url::redirect('/admin/product',true);
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
