<?php

require_once('./courses.php');

session_save_path('./tmp');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ReadyOnline</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <?php
    if (isset($_SESSION['form_message'])) {
      echo $_SESSION['form_message'];
    }
  ?>

  <div class="container min-h-screen">
    <section class="bg-yellow hero px-9 h-full px py pb-9">
      <img src="./images/logo.png" alt="logo" id="logo" />
      <p id="hero">
        Вкладывайте незначительные деньги каждый день в копилку своих знаний.
      </p>
      <div id="hero-information" class="flex">
        <span class="text-base">Следующий курс для вас будет стоить всего
          <span class="font-bold">178 рублей в день</span></span>
      </div>
      <div class="flex">
        <div class="calendars">
          <div class="date-1 flex items-center">
            <span class="text-white date">21</span>
            <div>
              <p class="text-white">Октября</p>
              <p class="text-yellow text-sm">Конец акции</p>
            </div>
          </div>
          <div class="date-1 flex items-center">
            <span class="text-white date">01</span>
            <div>
              <p class="text-white">Ноября</p>
              <p class="text-yellow text-sm">Ближайший старт</p>
            </div>
          </div>
        </div>
      </div>
      <div class="info">
        <a href="#courses" class="no-underline">
          <div class="other-information bg-red text-center">
            <p class="text-white">Узнать подробнее</p>
          </div>
        </a>
        <a href="#form-block" class="no-underline">
          <div class="free-course text-center text-black">
            <p>Бесплатная консультация</p>
          </div>
        </a>
      </div>
      <div class="flex justify-between absolute top-24 right-0 left-0 z-auto">
        <div class="flex w-auto">
          <img src="./images/coffee-left.png" class="img left blur absolute coffee-left" alt="coffee left" />
        </div>
        <div class="flex w-auto">
          <img src="./images/coffee-right.png" class="img absolute right-0 coffee-right" alt="coffee right" />
        </div>
        <img src="./images/person.png" class="img person right-0 absolute top-24" alt="person" />
      </div>
    </section>
    <section id="courses" class="courses px-9 px">
      <h1 class="courses-header text-center">
        Выберите свой вариант обучения
      </h1>
      <div id="card" class="grid">
        <?php
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="course rounded-2xl my-6">
                <p class="course-header text-center text-3xl font-bold">
                  ' . $row["title"] . '
                </p>
                <div class="course-price flex items-end justify-center">
                  <span class="text-center text-5xl">' . $row["price"] . ' ₽</span>
                  <span class="text-center text-xl bg-red p-2 px-3 text-white relative top-3 right-10 rounded-md">-' . floor($row["price"] * 100 / $row["oldprice"]) . '%</span>
                </div>
                <div class="course-sail my-6">
                  <span class="text-gray-500 text-3xl px-9 line-through decoration-red-500">' . $row["oldprice"] . ' ₽</span>
                </div>
                <div class="px-9">
                  <div class="my-2 w-auto">
                    <i class="fa-solid fa-check font-bold"></i>
                    <span class="font-bold">' . $row["months"] . ' месяца обучения</span>
                  </div>
                  <div class="my-2 w-auto">
                    <i class="fa-solid fa-check font-bold"></i>
                    <span>Грамматическая выжимка</span>
                  </div>
                  <div class="my-2 w-auto">
                    <i class="fa-solid fa-check font-bold"></i>
                    <span>Разговорный тренажёр</span>
                  </div>
                  <div class="my-2 w-auto">
                    <i class="fa-solid fa-check font-bold"></i>
                    <span>Слова с ассоциациями</span>
                  </div>
                  <div class="my-2 w-auto">
                    <i class="fa-solid fa-check font-bold"></i>
                    <span>Регулярные мини-задания</span>
                  </div>
                  <div class="my-2 w-auto">
                    <i class="fa-solid fa-check font-bold"></i>
                    <span>Персональный куратор</span>
                  </div>
                  <div class="my-2 w-auto">
                    <i class="fa-solid fa-check font-bold"></i>
                    <span>Сертификат об обучении</span>
                  </div>
                  <div class="my-2 w-auto">
                    <i class="fa-solid fa-check font-bold"></i>
                    <span>Best Teachers</span>
                  </div>
                  <div class="my-2 w-auto">
                    <i class="fa-solid fa-check font-bold"></i>
                    <span class="font-bold">Звонки от Second Teacher</span>
                  </div>
                  <p class="text-gray-500 text-3xl mt-6">Предоплата</p>
                  <p class="text-3xl">' . $row["prepay"] . ' ₽</p>
                  <a href="http://example.com/pay/ru/' . $row["id"] . '" class="no-underline">
                    <div class="my-4 p-4 bg-red text-center uppercase rounded-2xl">
                      <p class="text-white p-2">внести предоплату из рф</p>
                    </div>
                  </a>
                  <a href="http://example.com/pay/en/' . $row["id"] . '" class="no-underline">
                    <div class="my-4 p-4 bg-red text-center uppercase rounded-2xl mb-8">
                      <p class="text-white p-2">внести предоплату из-за границы</p>
                    </div>
                  </a>
                </div>
              </div>';
            }
          } else {
            echo "0 results";
          }
        ?>
      </div>
    </section>
    <section class="px-9 px">
      <img src="./images/gift.png" alt="gift" class="w-full my-4" />
    </section>
    <section class="course-special px-9 px mb-4">
      <div>
        <h1 class="my-10 text-center">Спецкурсы</h1>
        <div id="grid" class="w-full grid grid-cols-2 gap-x-8">
          <div>
            <div class="card flex items-center justify-between rounded-md py-9">
              <span class="bg-fuchsia-500 text-white px-3 p-2 rounded-2xl">ХИТ</span>
              <a href="" class="text-black font-bold">Подробнее</a>
            </div>
            <div id="card" class="shadow">
              <img src="./images/course-special1.png" alt="" class="w-full" />
            </div>
            <div class="course-special-sail my-6 text-center">
              <span class="text-gray-500 text-2xl px-3 line-through">9 900 ₽</span>
            </div>
          </div>
          <div>
            <div class="card flex items-center justify-between rounded-md py-9">
              <span class="bg-fuchsia-500 text-white px-3 p-2 rounded-2xl">ХИТ</span>
              <a href="" class="text-black font-bold">Подробнее</a>
            </div>
            <div id="card" class="shadow">
              <img src="./images/course-special2.png" alt="" class="w-full" />
            </div>
            <div class="course-special-sail my-6 text-center">
              <span class="text-gray-500 text-2xl px-3 line-through">9 900 ₽</span>
            </div>
          </div>
          <div>
            <div class="card flex items-center justify-between rounded-md py-9">
              <span class="bg-fuchsia-500 text-white px-3 p-2 rounded-2xl">ХИТ</span>
              <a href="" class="text-black font-bold">Подробнее</a>
            </div>
            <div id="card" class="shadow">
              <img src="./images/course-special3.png" alt="" class="w-full" />
            </div>
            <div class="course-special-sail my-6 text-center">
              <span class="text-gray-500 text-2xl px-3 line-through">9 900 ₽</span>
            </div>
          </div>
          <div>
            <div class="card flex items-center justify-between rounded-md py-9">
              <span class="bg-fuchsia-500 text-white px-3 p-2 rounded-2xl">ХИТ</span>
              <a href="" class="text-black font-bold">Подробнее</a>
            </div>
            <div id="card" class="shadow">
              <img src="./images/course-special4.png" alt="" class="w-full" />
            </div>
            <div class="course-special-sail my-6 text-center">
              <span class="text-gray-500 text-2xl px-3 line-through">9 900 ₽</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="text-center">
      <input type="submit" value="Показать еще" class="bg-red border-none rounded-md py-4 text-white px-9 my-10 text-xl"></input>
    </section>
    <?php if (!isset($_SESSION['form_message'])) : ?>
      <section id="form-block" class="bg-yellow h-auto py-10 px-9 px">
        <div class="w-full text-center mx-auto h-auto form">
          <h1 class="text-center my-4">Еще думаете?</h1>
          <p class="text-center my-2 uppercase">Записывайтесь на бесплатный урок и попробуйте сами, это поможет принять решение</p>
          <form id="form" action="form.php" method="post">
            <input type="text" name="name" id="name" placeholder="Введите ваше имя" required class="py-4 text-center rounded-md border-white w-full my-2 rounded-xl">
            <input type="tel" name="tel" id="tel" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" placeholder="Введите ваш телефон" required class="py-4 text-center rounded-md border-white w-full my-2 rounded-xl">
            <input type="email" name="email" id="email" placeholder="Введите ваш email" required class="py-4 text-center rounded-md border-white w-full my-2 rounded-xl">
            <input type="submit" value="Записаться" class="bg-red text-white p-4 rounded-md border-red-500 font-bold w-full my-2 rounded-xl uppercase text-2xl">
          </form>
          <p class="text-center text-xs">Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь с политикой конфиденциальности</p>
        </div>
      </section>
    <?php endif;
      unset($_SESSION['form_message']);
    ?>
    <footer class="p-9">
      <div class="flex items-center justify-center py-4">
        <img src="./images/icons8-english-96 2.png" alt="icons-english" class="w-16">
        <p class="text-white text-2xl font-bold px-3">English</p>
      </div>
      <p class="uppercase text-white text-center my-2">
        2015 - 2021 © English. Все права защищены. Политика конфиденциальности
      </p>
      <p class="uppercase text-white text-center my-2">
        Соглашение об обработке персональных данных
      </p>
      <p class="text-white text-center my-2">
        ООО "Инглиш", юридический адрес: 000000, Санкт-Петербург, ул. Улица, д. 0/00 лит. 0, пом. 0
      </p>
      <p class="text-white text-center my-2">
        ОГРН: 000000000000 | ИНН: 000000000 | КПП: 000000000
      </p>
      <div class="flex items-cecnter justify-center py-4">
        <img src="./images/vk_red copy.svg" alt="vk" class="w-10 mx-2">
        <img src="./images/bxl_telegram.svg" alt="telegram" class="w-10 mx-2">
      </div>
    </footer>
  </div>
</body>

</html>