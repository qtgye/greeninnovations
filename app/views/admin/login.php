<?php use \helpers\form; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="//fonts.googleapis.com/css?family=Rancho|Open+Sans:400,300,300italic,400italic,600,600italic,700,800italic,700italic,800" rel="stylesheet">
    <link href="/app/templates/front/minify/rgen_min.css" rel="stylesheet">
    <link href="/app/templates/front/css/custom.css" rel="stylesheet">
</head>
<body style="padding-top:80px">
    <div class="container">
        <div class="row">
            <div class="col-md-5 center-block" style="float:none;">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Login
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <?php if ( $errors->has('login') ): ?>
                                <div class="alert alert-danger">
                                    Wrong email/password.
                                </div>
                            <?php endif ?>
                            <form action="/login" class="form-horizontal" method="POST">
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label" for="login_email">Email<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                        <?= Form::input([
                                          'type' => 'text',
                                          'name' => 'email',
                                          'class' => 'form-control',
                                          'id' => 'login_email'
                                        ]) ?>
                                     </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label" for="login_password">Password<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                        <?= Form::input([
                                          'type' => 'password',
                                          'name' => 'password',
                                          'class' => 'form-control',
                                          'id' => 'login_password'
                                        ]) ?>
                                     </div>
                                </div>  
                                <div class="form-group <?= $errors->has('login') ? 'has-error' : '' ?>">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <input type="submit" class="btn btn-info" value="Login">
                                     </div>                                    
                                </div>  
                            </form>                                 
                        </div>                        
                    </div>
                </div>
            </div>
        </div>        
    </div>
</body>
</html>