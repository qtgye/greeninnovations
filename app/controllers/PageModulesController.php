<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url,
    \helpers\session;

use \models\PageModule;

/*
 * PageModulesController
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class PageModulesController extends Controller {
    
    public function update ( $page )
    {
        global $input, $errors;

        $modules = $input->all();

        foreach ( $modules as $key => $value) {

            if ( !in_array($key,PageModule::$modules[$page]) ) continue;

            $module = PageModule::findWhere('name',$key);
            if ( $module ) {
                // update if existing and different
                if ( $module->value != $value ) {
                    $module->update([
                        'value' => $value
                    ]);
                    $module->save();
                    $input->update($module->attributes);                        
                }
            } else {
                // new entry
                $new = PageModule::create([
                    'name' => $key,
                    'value' => $value
                ]);
                $new->save();
            }

        }

        session::flash(['success'=>'Succesfully updated information.']);
        url::redirect("/admin/module/$page", true);

    }
}
