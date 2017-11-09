<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $errorType; ?>错误</title>
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Nova+Flat' rel='stylesheet' type='text/css'>
    <style>
    body {
        background-color: #fff;
        color: #000;
    }
    .pad-top {
        padding-top:60px;
    }
    .text-center {
        text-align:center;
    }
    #error-link {
        font-size:150px;
        padding:10px;
    }
    #error-type {
        font-family: 'Nova Flat', cursive;
        font-size: 150px;
        padding: 10px;
    }
    </style>
</head>
<body>
    <div>
        <div class="pad-top text-center">
                 <div class="text-center">
                  <h1>  What have you done? </h1>
                   <h5> Now Go Back Using Below LInk</h5> 
                     <div id="error-type"><?php echo $errorType; ?></div>
                     <h2>ERROR DECETED !</h2>
                     <h2><?php echo $errorInfo; ?></h2>
                </div>
        </div>
        <div class="text-center">
            <div class="">
                <a href="#" class="btn btn-primary">GO TO HOME PAGE</a> 
                <br/><br/> <a href="http://www.ueepress.com/" target="_blank" title="ueepress">UeePress</a>
            </div>
        </div>
    </div>
</body>
</html>
