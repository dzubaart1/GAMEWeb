<?php
	if(trim($_COOKIE['email']) != '')
	{
		header('location: mainPage.php');
		exit();
	}

    include('../backEnd/engine.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<?
        include('../backEnd/commonHead.php');
    ?>

	<title>GAME: Вход</title>
</head>
<body>
	<div class="page container">
		<?
			include('../components/loginHeaderComp.php');
			include('../components/loginComp.php');
			include('../components/copyrightComp.php');
		?>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>	<script src="/js/swiper.js"></script>
</body>
</html>
