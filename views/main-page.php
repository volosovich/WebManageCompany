<!-- Page Content -->
<div class="container pagetitle">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Elif Tech Test Assignment</h1>
            <p class="lead">Web application that manages organizational structure.</p>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<iv class="col-md-6 col-md-offset-4 col-lg-6 col-lg-offset-4">
    <div class="easy-tree">
        <?= $tree ?>
    </div>
    </div>


    <script>
        (function ($) {
            function init() {
                $('.easy-tree').EasyTree({
                    addable: true,
                    editable: true,
                    deletable: true
                });
            }

            window.onload = init();
        })(jQuery)
    </script>