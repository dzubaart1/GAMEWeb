<?php
    include('../backEnd/engine.php');
	$engine->initEngine();
	$engine->initSpheresByXpForAllTime();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<?php
        include("../backEnd/commonHead.php");
    ?>

	<title>GAME: Дашборд</title>
</head>

<body>
	<div class="page container">
		<?php
			include("../components/userInfoHeaderComp.php");
			include("../components/mainComp.php");
			include("../components/copyrightComp.php");
		?>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>	<script src="/js/swiper.js"></script>
	<script src="<?echo $path?>/js/mainPage.js"></script>	
</body>

</html>
