<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Phone Book</title>
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- 2 -->
    <link href="<?= asset('css/bootstrap-theme.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/angular-growl.min.css') ?>" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>
    <!-- 1 -->
    <script src="<?= asset('js/angular-growl.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.9/angular-animate.min.js"></script>

    <script src="<?= asset('js/jQuery-2.1.1.min.js') ?>"></script>
    <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('js/myFunctions.js') ?>"></script>
    <script src="js/PhoneBook.js"></script>
  </head>
  <body ng-app="myApp">

        <div id="main-content">
            <div class="phone-book-content">
                @yield('phone-book-content')
            </div>
        </div>

  </body>
</html>
