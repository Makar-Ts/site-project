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

        $statuses = ['нет в продаже', 'на заказ', 'есть на складе', 'есть в ближайшем магазине'];
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
                <div class="add_menu_background">
                    <div class="add_menu" id="add_menu"> 
                        <p class="book_add_h"> Добавление новой книги </p>
                        <p class="book_add_textarea">Фото: <input type="text" name="img" placeholder="img URL from mybook.ru"> </p>
                        <p class="book_add_textarea">Название: <input type="text" name="name" placeholder="Book name">  </p>
                        <p class="book_add_textarea">Автор: <input type="text" name="author" placeholder="Book author">  </p>
                        <p class="book_add_textarea">Оценка: <input type="text" name="rate" placeholder="book rate (from 1 to 5)">  </p>
                        <p class="book_add_textarea">Статус: <input type="text" name="status" placeholder="book status (from 1 to 4)">  </p>

                        <div class="book_add_button_leveler">
                            <div class="book_add_button2"> <button type="button" onclick="add_book_accept(event)"> <img src="content/checkmark.png"> </button> </div>
                            <div class="book_add_button2"> <button type="button" onclick="add_book_unaccept(event)"> <img src="content/cross.png"> </button> </div>
                        </div>
                    </div>
                </div>
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
                                Оценка: <div class="<?php echo ("book_rate_" . (string)$strSQL['rate']); ?>"><?php echo $strSQL['rate'] ?>/5</div>
                            </div>
                            <div class="book_rate"> 
                                Статус: <?php $book_class = "book_status_" .(int)$strSQL['status']; 
                                                 echo "<div class='$book_class'>" .$statuses[(int)$strSQL['status']] ."</div>"; ?>
                            </div>
                            <div class="book_action_button"> <button type="button" onclick="delete_book(event)"> <img src="content/trash_can.png"> </button> </div>
                            <div class="book_action_button"> <button type="button" onclick="edit_book(event)"> <img src="content/edit.png"> </button> </div>
                        </div>
                        <div class="book_icn"> <img src="<?php echo $strSQL['img']; ?>"> </div>

                        <form class="book_edit"> 
                            <p class="book_edit_textarea">Фото: <input type="text" name="img" placeholder="<?=$strSQL['img']?>"> </p>
                            <p class="book_edit_textarea">Название: <input type="text" name="name" placeholder="<?=$strSQL['name']?>">  </p>
                            <p class="book_edit_textarea">Автор: <input type="text" name="author" placeholder="<?=$strSQL['author']?>">  </p>
                            <p class="book_edit_textarea">Оценка: <input type="text" name="rate" placeholder="<?=$strSQL['rate']?>">  </p>
                            <p class="book_edit_textarea">Статус: <input type="text" name="status" placeholder="<?=$strSQL['status']+1?>">  </p>

                            <div class="book_edit_button"> <button type="button" onclick="edit_book_accept(event)"> <img src="content/checkmark.png"> </button> </div>
                            <div class="book_edit_button"> <button type="button" onclick="edit_book_unaccept(event)"> <img src="content/cross.png"> </button> </div>
                        </form>
					<?php
					echo '</div>';
				} 
			?>
            <div class="book_add_button"> <button type="button" onclick="add_book(event)"> Добавить книгу </button> </div>
		</div>
	</div>
</div>
    
    <div class="feedback" id="feedback"> 
        <div class="container"> 
            <div class="feedback_body wow animate__animated animate__fadeInLeft"> 
                <p class="feedback_title">
                    Пожалуйста отправьте отзыв!
                </p>

                <div class="form_input" id="form_input">
                    <div class="feedback_name">
                        Имя:
                    </div>
                    <input type="text" class="feedback_input" name="name" placeholder="Ваше имя"/>

                    <div class="feedback_name">
                        Телефон:
                    </div>
                    <input type="text" class="feedback_input" name="phone" placeholder="Ваш телефон"/>

                    <div class="feedback_name">
                        Почта:
                    </div>
                    <input type="text" class="feedback_input" name="mail" placeholder="Ваша почта"/>

                    <div class="feedback_name">
                        Комментарий:
                    </div>
                    <textarea id="feedback_textarea" class="feedback_textarea" name="comm" placeholder="Ваш коментарий"></textarea>

                    <div class="feedback_button"> <button type="button" onclick="feedback_send(event)">Отправить</button> </div>
                </div>
            </div>
        </div>
    </div>
</body>