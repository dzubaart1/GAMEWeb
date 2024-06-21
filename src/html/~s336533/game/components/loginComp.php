<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include("../backEnd/engine.php");

        $success = $engine->tryLoginUser($_POST['email'], $_POST['password']);

		$location = $success ? 'location: ../pages/mainPage.php' : 'location: ../pages/loginPage.php';

		header($location);
        exit();
    }

    class LoginComponent extends Component
    {
        private $path;

        function __construct($path)
        {
            $this -> path = $path;
        }


        public function print()
        {
            ?>
           <section class="login content row">
				<form class="col-lg-4" action="<? echo $this->path?>/components/loginComp.php" method="post" >
					<input name="email" type="email" placeholder="Email">
					<br>
					<input name="password" type="password" placeholder="Пароль">
					<br>
					<button class="big-yellow-btn" type="submit" style="margin-bottom: 15px">Вход</button><br>
					<a href="<? echo $this->path?>/pages/registerPage.php">Нет аккаунта?</a>
					<?php
						if(isset($_COOKIE['message']))
						{
							$message = $_COOKIE['message'];
							echo "<p class='error'>$message</p>";
						}
					?>
				</form>

				<picture class="col-lg-6 offset-lg-2">
					<source srcset="<? echo $this->path?>/imgs/login.webp" type="image/webp">
					<img src="<? echo $this->path?>/imgs/login.webp" style="max-width:80%;">
				</picture>
			</section>
            <?php
        }
    }

    $login = new LoginComponent($path);
    $login->print();
?>