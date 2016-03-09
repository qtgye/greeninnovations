  <?php

    if ($has_image_modal) {
      $view::rendertemplate('partials/form-image-input-modal',$data);
    } 

    if ( $delete_confirm_modal ) {
      $view::rendertemplate('partials/delete-confirm-modal',$data);
    }

  ?>

  </section>
  <!-- container section end -->

    <!-- javascripts -->
  <script src="/app/templates/admin/js/jquery.js"></script>
    <script src="/app/templates/admin/js/jquery-ui-1.10.4.min.js"></script>
  <script src="/app/templates/admin/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/app/templates/admin/js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="/app/templates/admin/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="/app/templates/admin/js/jquery.scrollTo.min.js"></script>
  <script src="/app/templates/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="/app/templates/admin/assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="/app/templates/admin/js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="/app/templates/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="/app/templates/admin/js/owl.carousel.js" ></script>
  <!-- jQuery full calendar -->
  <script src="/app/templates/admin/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
    <script src="/app/templates/admin/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
  <!--script for this page only-->
  <script src="/app/templates/admin/js/calendar-custom.js"></script>
    <script src="/app/templates/admin/js/jquery.rateit.min.js"></script>
  <!-- custom select -->
  <script src="/app/templates/admin/js/jquery.customSelect.min.js" ></script>
    <script src="/app/templates/admin/assets/chart-master/Chart.js"></script>

  <!-- custom script for this page-->
  <script src="/app/templates/admin/js/sparkline-chart.js"></script>
  <script src="/app/templates/admin/js/easy-pie-chart.js"></script>
    <script src="/app/templates/admin/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/app/templates/admin/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/app/templates/admin/js/xcharts.min.js"></script>
    <script src="/app/templates/admin/js/jquery.autosize.min.js"></script>
    <script src="/app/templates/admin/js/jquery.placeholder.min.js"></script>
    <script src="/app/templates/admin/js/gdp-data.js"></script>    
    <script src="/app/templates/admin/js/morris.min.js"></script>
    <script src="/app/templates/admin/js/sparklines.js"></script>  
    <script src="/app/templates/admin/js/charts.js"></script>
    <script src="/app/templates/admin/js/jquery.slimscroll.min.js"></script>

  <!--custom checkbox & radio-->
  <script src="/app/templates/admin/js/ga.js"></script>
  <!--custom switch-->
  <script src="/app/templates/admin/js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="/app/templates/admin/js/jquery.tagsinput.js"></script>
  
  <!-- colorpicker -->
 
  <!-- bootstrap-wysiwyg -->
  <script src="/app/templates/admin/js/jquery.hotkeys.js"></script>
  <script src="/app/templates/admin/js/bootstrap-wysiwyg.js"></script>
  <script src="/app/templates/admin/js/bootstrap-wysiwyg-custom.js"></script>
  <!-- ck editor -->
  <script src="/app/templates/admin/assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="/app/templates/admin/js/form-component.js"></script>

  <!--custome script for all page-->
  <script src="/app/templates/admin/js/scripts.js"></script>
  <script src="/app/templates/admin/js/_build.js"></script>

  <script>
  //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      // CK Editor
      CKEDITOR.replaceAll('ckeditor');
      
      /* ---------- Map ---------- */
    $(function(){
      $('#map').vectorMap({
        map: 'world_mill_en',
        series: {
          regions: [{
            values: gdpData,
            scale: ['#000', '#000'],
            normalizeFunction: 'polynomial'
          }]
        },
        backgroundColor: '#eef3f7',
        onLabelShow: function(e, el, code){
          el.html(el.html()+' (GDP - '+gdpData[code]+')');
        }
      });
    });



  </script>

  </body>
</html>