<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url,
    \helpers\session;

use \models\Info,
    \Test;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class InfosController extends Controller {
    
    public function update ()
    {
        global $input, $errors;

        $infos = $input->all();

        if ( $this->validate( $infos, Info::$rules ) ) {

            foreach ( $infos as $key => $value) {

                if ( !in_array($key,Info::$fields) ) continue;

                $info = Info::findWhere('name',$key);
                if ( $info ) {
                    // update if existing and different
                    if ( $info->value !== $value ) {
                        $info->update([
                            'value' => $value
                        ]);
                        $info->save();
                        $input->update($info->attributes);                        
                    }
                } else {
                    // new entry
                    $new = Info::create([
                        'name' => $key,
                        'value' => $value
                    ]);
                    $new->save();
                }

            }

            session::flash(['success'=>'Succesfully updated modules.']);
            url::redirect('/admin/info', true);
            
        } else {
            url::previous();
            exit;
        }

    }
}
