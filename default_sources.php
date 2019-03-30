<!-- BEGIN SOURCES -->

    <!-- JQUERY 3.2.1 (Must be included BEFORE BOOTSTRAP) -->
        <!--<script src="/resources/jquery-3.3.1.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- END JQUERY -->

    <!-- TETHER.IO -->
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <!-- END TETHER -->

    <!-- BOOTSTRAP 4 -->
        <!-- Default Bootstrap 4 Styling -->
        <!--<link href="https://bootswatch.com/4/cosmo/bootstrap.min.css" rel="stylesheet">-->
        <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        -->
        <!-- <link href="https://bootswatch.com/4/lux/bootstrap.min.css" rel="stylesheet" />-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="https://bootswatch.com/4/simplex/bootstrap.min.css" rel="stylesheet" />
        <!-- Bootstrap 4 JS -->
        <!--<script src="/Resources/thirdparty/js/bootstrap.min.js"></script>-->
        <!-- Bootstrap 4 CSS Backup -->
        <!--<link href="sources/thirdparty/css/bootstrap.min.css" rel="stylesheet" />-->
    <!-- END BOOTSTRAP -->

    <!-- ANGULAR 1.6.6 -->
        <!--<script src="/resources/angular.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js"></script>
    <!-- END ANGULAR -->

    <!-- START SCROLLER -->
        <!--<script src="http://ignitiongaming.us/sources/thirdparty/scroll/smoothscroll.js"></script>-->
    <!-- END SCROLLER ->

    <!-- ADD ALL ANGULAR REFERENCES -->

    <!-- END ANGULAR REFERENCES -->

    <!-- ADD HELPFUL CSS REFERENCES -->
        <!--<link href="/resources/global/css/general.css" rel="stylesheet" />
        <link href="/resources/global/css/helpful.css" rel="stylesheet" />-->
    <!-- END HELPFUL CSS REFERENCES -->

    <!-- ADD PACKAGELOADER -->
        <?php include("packageloader.php"); ?>
    <!-- END PACKAGELOADER -->

    <!-- ADD TOASTR -->
    <!--<script src="/resources/toastr.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!--<link href="/resources/toastr.min.css" rel="stylesheet"/>-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
<!-- END SOURCES -->

<!-- BEGIN JS CODE -->
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!-- END JS CODE -->
