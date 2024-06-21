<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../backEnd/engine.php");
    $engine->initEngine();

    setcookie('fromdate', $_POST['fromDate'], time()+3, '/');
    setcookie('todate', $_POST['toDate'], time()+3, '/');

    header('location: ../pages/historyPage.php');
    exit();
}

class HistoryComponent extends Component
{
    private $dates;
    private $path;

    public function __construct($dates, $path)
    {
        $this -> dates = $dates;
        $this -> path = $path;
    }

    public function print()
    {
        ?>
        <section class="history row row-cols-2 content">
            <form class="col-lg-4" action="../components/historyComp.php" method="post">
                <input name="fromDate" type="date"> -
                <input name="toDate" type="date"><br>
                <button class="big-yellow-btn" type="submit">Поиск</button>
            </form>
            <?php
                if(count($this -> dates) == 0)
                {
                    ?>
                    <picture class="col-lg-4 offset-lg-2">
                        <source srcset="<? echo $this->path?>/imgs/emptyHistory.webp" type="image/webp">
                        <img src="<? echo $this->path?>/imgs/emptyHistory.webp" style="max-width:80%;">
                    </picture>
                    <?php
                }
                else
                {
                    ?>
                    <div class="col-lg-1 offset-lg-1">
                        <div class='s-button-prev'></div>
                    </div>
                    <div class='slider col-lg-5'>
                        <div class='swiper'>
                            <div class='swiper-wrapper'>
                            <?php
                                usort($this->dates, "spheresSort");
                                foreach($this->dates as $date)
                                {
                                    $date->print();
                                }  
                            ?>
                            </div>
                            <div class="s-pagination"></div>
                    </div> 
                    </div>
                    <div class="col-lg-1">
                        <div class='s-button-next'></div>
                    </div>
                    <?php
                }
            ?>
        </section>
        <?php
    }
}

if(!isset($_COOKIE['fromdate']) || trim($_COOKIE['fromdate']) == '')
{
}
else
{
    $engine->initHistory();
}

$history = new HistoryComponent($engine->dates, $path);
$history->print();
$engine->dates = null;
?>
