<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>BWT TEST</title>
        <link rel="stylesheet" type="text/css" href="/bwt_test/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="js/jquery-2.2.0.js"></script>
	</head>
<body>
<div class="container">
    <div id="user_private">
    </div>
    <div id="menu" >
        <ul class="nav nav-tabs nav-stacked">
            <li><a href="/bwt_test/login">Вход/Регистрация</a></li>
            <li><a href="/bwt_test/weather">Посмотреть погоду</a></li>
            <li><a href="/bwt_test/feedbacks">Посмотреть отзывы</a></li>
            <li><a href="/bwt_test/feedbacks/add">Написать отзыв</a></li>
        </ul>
    </div>
    <div id="cont">
    <?php include $content_view;?>
    </div>
</div>
    
   
</body>
</html>