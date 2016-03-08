<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url,
    \models\Info,
    \helpers\session,
    \models\user;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class AuthController extends Controller {

    public function __construct ()
    {
        parent::__construct();
    }    

    public function getLogin ()
    {
        View::render('admin/login');
    }

    public function postLogin()
    {
        global $errors;        
        if ( isset($_POST['email']) && isset($_POST['password']) ) {
            $user = ['nyahaha'];// User::findWhere('email',$_POST['email']);
            var_dump($user);
            var_dump(method_exists(User, 'find'));
            var_dump(property_exists(Info, 'fillable'));
            $user2 = User::find(1);
            var_dump($user);
            var_dump('should have shown user2');
            exit;
            if ( $user && $user->password == $_POST['password'] ) {
                Session::set('user',$user->attributes);
                Url::redirect('/admin',true);
            }
        }
        $errors->add([
            'login' => ''
        ]);
        Url::previous();
    }

    public function getLogout ()
    {
        Session::destroy('user');
        Url::redirect('/',true);
    }

    public static function check_auth () {

        if ( !Session::get('user') ) 
        {
            Url::redirect('/login',true);
        }

    }
}
