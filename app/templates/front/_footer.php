<!-- footer-section -->
<section class="footer-section footer-section-5" style="outline-offset: -3px;">
    <div class="container">
    
        <?php if ( isset($info['logo']) ): ?>
            <img src="/uploads/<?= $info['logo'] ?>" alt="Company logo">
        <?php else: ?>
            <h4><?= $info['site-title'] ?></h4>
        <?php endif ?>

        <div class="social-links">
            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
            <a href="#" target="_blank"><i class="fa fa-youtube-play"></i></a>
            <a href="#" target="_blank"><i class="fa fa-instagram"></i></a> 
        </div><!-- /.social-links -->
        <hr>
        <p><?= $info['address'] ?></p>
        <p><?= $info['contact-line'] ?></p>
        <hr>
        <p class="copyright">Copyright © 2013 Green Innovations. All rights reserved.</p>
        <!-- <p class="copyright">R.Gen - Landing page bundle © 2015</p> -->
    </div><!-- /.container -->
</section><!-- /.footer-section --></div>
<!-- /#page --> 

<!-- JavaScript --> 
<script src="/app/templates/front/minify/rgen_min.js"></script>
<script async="" src="/app/templates/front/js/rgen.js"></script>

<!-- Custom JS -->
<script src="/app/templates/front/js/_build.js"></script>


</body></html>