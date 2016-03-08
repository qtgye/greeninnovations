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
            var_dump('finding user...');
            var_dump($_POST['email']);
            var_dump(User::create());
            $user = User::findWhere('email',$_POST['email']);
            var_dump($user);
            if ( $user && $user->password == $_POST['password'] ) {
                var_dump('setting session');
                Session::set('user',$user->attributes);
                var_dump('session is set');
                echo '<pre style="display: table; font-size: 10px">';
                    var_dump('success login');
                echo '</pre>';
                exit;
                Url::redirect('/admin',true);
            }
            echo '<pre style="display: table; font-size: 10px">';
                var_dump('wrong pw');
            echo '</pre>';
        }
        echo '<pre style="display: table; font-size: 10px">';
            var_dump($_POST);
        echo '</pre>';
        $errors->add([
            'login' => ''
        ]);
        exit;
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
