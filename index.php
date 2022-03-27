<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://atuin.ru/demo/wow/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

	<?php 
		include "config/config.php";
		mysqli_set_charset($connect, "utf8mb4");
	?>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First Site</title>
</head>
<body>
	<div class="header">
        <div class="container">
            <div class="header_body">
                <div class="header_logo">
                    <img src="content/logo.png" class="header_logo"> 
                </div>

                <nav class="header_menu">
                    <ul class="header_list" type=" ">
                        <li> <a href="#about" class="header_link">О компании</a> </li>
                        <li> <a href="#feedback" class="header_link">Обратная связь</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

<div class="background">

	<div id="about" class="about">
        <div class="container">
            <div class="about_body wow animate__animated animate__fadeInRight">
                <div class="main_about">
                    <h1>Онлайн библиотека COOP-lib</h1>
                </div>

                <div class="another_about">
                    <p>Наши плюсы:</p>
                </div>
                
                <nav class="about_pros_menu">
                    <ul class="about_pros_list" type="point">
                        <li>Очень большой ассортимент</li>
                        <li>Книги, аудиокниги, печатные версии</li>
                        <li>Удобный интерфейс работы</li>
                        <li>Бесплатный доступ почти ко всей библиотеке!</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

	<div class="book_folk">
		<div class="container">
			<?php 
				$base = mysqli_query($connect, "SELECT * FROM `books`");
				while($strSQL = mysqli_fetch_assoc($base)) { 
					echo '<div class="book wow animate__animated animate__fadeInLeft">'
					?>             
                        <div class="book_inf" id="<?=$strSQL['ID']?>"> 
                            <div class="book_name"> 
                                <?php echo $strSQL['name']; ?>
                            </div>
                            <div class="book_author"> 
                                <p>Автор: <?php echo $strSQL['author']; ?> </p>
                            </div>
                            <div class="book_rate"> 
                                <p>Оценка: <p class="<?php echo ("book_rate_" . (string)$strSQL['rate']); ?>"><?php echo $strSQL['rate'] ?>/5</p> </p>
                            </div>
                            <div class="book_action_button"> <button type="button" onclick="delete_book(event)"> <img src="content/trash_can.png"> </button> </div>
                            <div class="book_action_button"> <button type="button" onclick="edit_book(event)"> <img src="content/edit.png"> </button> </div>
                        </div>
                        <div class="book_icn"> <img src="<?php echo $strSQL['img']; ?>"> </div>
					<?php
					echo '</div>';
				} 
			?>
		</div>
	</div>
</div>
    
    <div class="feedback" id="feedback"> 
        <div class="container"> 
            <div class="down_about"> 

            </div>

            <div class="feedback_"> 

            </div>
        </div>
    </div>
</body>