<?php

use core\view;

if ( isset($data) ):

    View::rendertemplate('_header',$data);
    View::rendertemplate('_sidebar',$data);

?>

<!--main content start-->
<section id="main-content" class="container">
  <section class="wrapper">
    
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li><a href="/admin/<?= $page ?>"><?= $page_title ?></a></li>
                <?php if ( $subpage ): ?>
                    <li><?= $page_title ?></li>
                <?php endif ?>
            </ol>
            <h3 class="page-header text-default"><?= $page_title ?></h3>         
        </div>
    </div>
    
    <!-- content -->
    <div class="row">       
        <?php View::render('admin/' . $method,$data); ?>
    </div>


</section>
</section>
<!--main content end-->

    
<?php

View::rendertemplate('_footer',$data);

endif;

?>