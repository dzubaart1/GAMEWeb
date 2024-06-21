<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include("../backEnd/engine.php");
        $engine->initEngine();


        if(strcmp($_POST['type'], 'add') == 0)
        {
            $engine->tryAddSphere($_POST['sphere']);
        }

        if(strcmp($_POST['type'], 'delete') == 0)
        {
            $engine->tryRemoveSphere($_POST['sphere']);
        }

        if(strcmp($_POST['type'], 'save') == 0)
        {
            $engine->tryUpdateSphere($_POST['sphere'], $_POST['oldsphere'], $_POST['color']);
        }
        
        header('location: ../pages/editSpheresPage.php');
        exit();
    }

    class EditSpheresComponent extends Component
    {
        public $spheres;
        private $path;

        public function __construct($spheres, $path)
        {
            $this -> spheres = $spheres;
            $this -> path = $path;
        }

        public function print()
        {
            ?>
           <section class="editSpheres row row-cols-2 content">
                <form class="col-lg-4" action="<? echo $this->path ?>/components/editSpheresComp.php" method="post">
                    <input class="search-input" name="sphere" type="text" placeholder="Название сферы"><br>
                    <button type="button" class="big-yellow-btn search-btn">Поиск</button>
                    <button class="big-yellow-btn"type="submit" name="type" value="add">Добавить</button>
                </form>

                <?php
                if(count($this -> spheres) == 0)
                {
                    ?>
                    <figure class="col-lg-4 offset-lg-3">
                        <picture>
                            <source srcset="<?echo $this->path?>/imgs/emptySpheres.webp" type="image/webp">
                            <img src="<?echo $this->path?>/imgs/emptySpheres.webp" style="max-width:100%;">
                        </picture>
                        <figcaption>Пока что нет сфер для отображения</figcaption>
                    </figure>
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
                                $sphere->printForEditing();
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

    $editSpheres = new EditSpheresComponent($engine->userSpheres, $path);
    $editSpheres->print();
?>