<!-- Navigation -->
<!-- /.nav-wrp --><!-- Call to action-section -->
<!-- /.calltoaction-section --><!-- Testimonials -->
<!-- /.testimonial-section --><!-- Navigation -->
<!-- /.nav-wrp --><!-- Call to action-section -->
<!-- /.calltoaction-section --><!-- product-section -->
<!-- /.product-section --><!-- Navigation -->
<!-- /.nav-wrp --><!-- Call to action-section -->
<!-- /.calltoaction-section --><!-- Features -->
<!-- /.feature-section --><!-- Navigation -->
<nav class="nav-wrp nav-4">
    <div class="container">
        
        <div class="nav-header">
            <a class="navbar-brand" href="/">
                <?php if (isset( $info['logo'] )): ?>
                    <img src="/uploads/<?= $info['logo'] ?>" alt="<?= $info['site-title'] ?>">
                <?php else: ?>
                    <h3><?= $info['site-title'] ?></h3>
                <?php endif ?>
            </a>
            <a class="nav-handle fs-touch-element" data-nav=".nav"><i class="fa fa-bars"></i></a>   
        </div>
        
        <div class="nav vm-item">
            <ul class="nav-links">
                <li><a href="/about">About</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/technologies">Technologies</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/news">News</a></li>
                <li><a href="#requestModal" data-toggle="modal" data-target="#requestModal">Request A Quote</a></li>
            </ul>
            <div class="nav-other">
                <span><i class="fa fa-phone"></i> <?= $info['phone'] ?></span>
                <span><a href="mailto:<?= $info['email'] ?>"><i class="fa fa-envelope-o"></i> Email us</a></span>
            </div>
        </div><!-- /.nav --> 
        
    </div><!-- /.container --> 
</nav><!-- /.nav-wrp -->

<!-- request a quote modal -->
<div class="modal fade" style="display:none" id="requestModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Request a Quote</h4>
            </div>
            <div class="modal-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro quisquam at iure non velit dolorum beatae soluta doloribus ea iste, tenetur ducimus amet impedit nisi aspernatur quas est aperiam totam.
            </div>
            <div class="modal-footer">
                <div class="btn btn-defaut" data-dismiss="modal">Cancel</div>
                <div class="btn btn-info" data-dismiss="modal">Confirm</div>
            </div>
        </div>
    </div>
</div>