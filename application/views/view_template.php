<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameReview</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- carusel-->
    <link href="css/carousel.css" rel="stylesheet">

    <!-- CUSTOM -->
    <link href="css/style.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>

    <script>
        jQuery('document').ready(function () {
            ///*
            jQuery('ul.nav li.dropdown').hover(function () {
                jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function() {
                jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });
            //jQuery('ul.nav li.dropdown').hover(function () {

            //});
        });
    </script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- dynamic custom scripts and styles-->
    <?php echo $this->styles; ?>
    <?php echo $this->scripts; ?>
</head>
</head>
<body>
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse ">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">GameReview</a>

                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <?php echo $this->toolBarList ?>

                </div>
            </div>
        </nav>
    </div>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>


    <div class="container">
        <?php include 'application/views/' . $content_view . '.php'; ?>
    </div>

</div>

<div>
    <?php include 'application/views/view_popup.php'; ?>
</div>

</body>
</html>