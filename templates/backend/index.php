<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo (empty($title) ? '' : $title . ' - ') . TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- styles -->            
        <link href="<?php echo ASSETS_TEMPLATE; ?>_deploy/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo ASSETS_TEMPLATE; ?>_deploy/narrow.css" rel="stylesheet">
        <!-- end style -->
        <!-- javascript -->
        <script src="<?php echo ASSETS_TEMPLATE; ?>_source/js/libs/jquery.min.js"></script>
        <script src="<?php echo ASSETS_TEMPLATE; ?>_deploy/jquery.dataTables.js"></script>

        <style>
            .container .jumbotron, .container-fluid .jumbotron {
                border-radius: 3px;
            }
            .container .jumbotron {
                padding: 10px;
            }
            .jumbotron {
                text-align: left;
            }
            #tablelist_length {
                float: left;
            }
            #tablelist_filter {
                float: right;
            }
            #tablelist {
                float: left;
            }
            .jumbotron .btn {
                font-size: 21px;
                padding: 0 10px;
            }
        </style>
        <script>
            $(document).ready(function() {
                // DataTable
                $('#tablelist').dataTable();
            });
        </script>

        <!-- end javascript-->
    </head>

    <body>
        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right" role="tablist">
                    <li role="presentation" class="active"><a href="#">Home</a></li>
                    <li role="presentation"><a href="<?php echo BASE_URL;?>authentication/logout">Log out</a></li>
                </ul>
                <h3 class="text-muted">EZEKhmer.com</h3>
            </div>

            <div class="jumbotron">
                <?php empty($page) ? '' : $this->load->view($page); ?>
            </div>

            <div class="footer">
                <p>&copy; OHHUGE 2014</p>
            </div>

        </div> <!-- /container -->

</html>