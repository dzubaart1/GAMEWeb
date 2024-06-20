<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include("../backEnd/engine.php");
        $engine->initEngine();

        $engine->addResultsToSphere($_POST['sphere'], $_POST['easyTasks'], $_POST['mediumTasks'], $_POST['hardTasks']);

        header('location: ../pages/addResultsPage.php');
        exit();
    }

    class AddResultsComponent extends Component
    {
        private $spheres;

        public function __construct($spheres)
        {
            $this -> spheres = $spheres;
        }

        public function print()
        {
            ?>
            <section class="addResults row row-cols-2 content">
                <form class="col-lg-4">
                    <div class="row row-col-1">
                        <input class="search-input" name="sphereName" type="text" placeholder="Название сферы"><br>
                        <button type="button" class="big-yellow-btn search-btn">Поиск</button>
                    </div>
                </form>
                <?php
                if(count($this -> spheres) == 0)
                {
                    ?>
                    <picture class="col-lg-4 offset-lg-2">
                        <source srcset="../imgs/emptySpheres.webp" type="image/webp">
                        <img src="../imgs/emptySpheres.webp" style="max-width:100%;">
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
                            foreach($this -> spheres as $sphere)
                            {
                                $sphere->printForAdding();
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

    $addResults = new AddResultsComponent($engine->userSpheres);
    $addResults->print();
?>


