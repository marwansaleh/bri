        <script type="text/javascript">
            $(document).ready(function(){
                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].icheck, input[type="radio"].icheck').iCheck({
                  checkboxClass: 'icheckbox_minimal-blue',
                  radioClass: 'iradio_minimal-blue'
                });
                //pretty photo
                $("a[rel^='prettyPhoto']").prettyPhoto({
                    social_tools:''
                });
                //nice scroll
                $('html').niceScroll({cursorcolor:"#00F"});
                $('.nicescroll').niceScroll({cursorcolor:"#00F"});
                //tooltip
                $('[data-toggle="tooltip"]').tooltip();
                //selectpicker
                $('select.selectpicker').selectpicker();
                $('.datetimepicker').datetimepicker({
                    format: 'DD-MM-YYYY HH:mm',
                });
                $('.confirmation').on('click',function(){
                    var confirm_text = 'Are you sure to delete this item?';
                    if ($(this).attr('data-confirmation')){
                        confirm_text = $(this).attr('data-confirmation');
                    }
                    return confirm(confirm_text);
                });
            });
        </script>
        <!-- bootstrap -->
        <script src="<?php echo get_lib_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo get_asset_url('js/admin-lte.js'); ?>"></script>
        <script src="<?php echo get_asset_url('js/main.js'); ?>"></script>
        <!-- nice scroll -->
        <script src="<?php echo get_lib_url('scrollTo/jquery.scrollTo.min.js'); ?>"></script>
        <script src="<?php echo get_lib_url('nicescroll/jquery.nicescroll.min.js'); ?>"></script>
        <!-- prettyPhoto -->
        <script src="<?php echo get_lib_url('prettyPhoto/3.15/js/jquery.prettyPhoto.js'); ?>"></script>
        <!-- iCheck -->
        <script src="<?php echo get_lib_url('iCheck/icheck.min.js'); ?>"></script>
        <!-- Bootstrap select -->
        <script src="<?php echo get_lib_url('bootstrap-select/js/bootstrap-select.min.js'); ?>"></script>
        <!-- Bootstrap datetimepicker -->
        <script src="<?php echo get_lib_url('momentjs/moment.min.js'); ?>"></script>
        <script src="<?php echo get_lib_url('datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"></script>
        <!-- Bootstrap Typeahead & TagsInput -->
        <script src="<?php echo get_lib_url('bootstrap-typeahead/bootstrap3-typeahead.js'); ?>"></script>
        <script src="<?php echo get_lib_url('angular/angular.min.js'); ?>"></script>
        <script src="<?php echo get_lib_url('tagsinput/bootstrap-tagsinput.min.js'); ?>"></script>
        <script src="<?php echo get_lib_url('tagsinput/bootstrap-tagsinput-angular.js'); ?>"></script>
        <!-- Image Row grid -->
        <script src="<?php echo get_lib_url('rowgrid/jquery.row-grid.min.js'); ?>"></script>
        <!-- form validation -->
        <script src="<?php echo get_lib_url('jquery-validation/jquery.validate.min.js'); ?>"></script>
    </body>
</html>