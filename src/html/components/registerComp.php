<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include("../backEnd/engine.php");

        $res = $engine->tryAddUser($_POST['name'], $_POST['email'], $_POST['password']);
		$location = $res ? 'location:../pages/mainPage.php' : 'location:../pages/registerPage.php';
        header($location);
        exit();
    }

    class RegisterComponent extends Component
    {
        public function print()
        {
            ?>
           <section class="register row content">
				<form class="col-lg-4" action="../components/registerComp.php" method="post" >
					<input name="name" type="text" placeholder="Имя">
					<br>
					<input name="email" type="email" placeholder="Email">
					<br>
					<input name="password" type="password" placeholder="Пароль">
					<br>
					<button class="big-yellow-btn" type="submit" style="margin-bottom: 15px">Регистрация</button><br>
					<a href="loginPage.php">Вход</a>
					<?php
						if(isset($_COOKIE['message']))
						{
							$message = $_COOKIE['message'];
							echo "<p>$message</p>";
						}
					?>
				</form>
				<picture class="col-lg-6 offset-lg-2">
					<source srcset="../imgs/register.webp" type="image/webp">
					<img src="../imgs/register.webp" style="max-width:80%;">
				</picture>
			</section>
            <?
        }
    }

    $register = new RegisterComponent();
    $register->print();
?>