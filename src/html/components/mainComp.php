<?php
    class MainComponent extends Component
    {
        private $spheres;

        public function __construct($spheres)
        {
            $this -> spheres = $spheres;
        }

        public function print()
        {
            ?>
            <section class="mainComp row content">
                <ul class="col-lg-6 menu">
                    <div class="row">
                        <button onclick="OnClickHistoryBtn()" type="button" class="menu-button col-lg-5">
                            <h2>История XP</h2>
                        </button>
                        <button onclick="OnClickEditSpheresBtn()" type="button" class="menu-button col-lg-5">
                            <h2>Правка сфер</h2>
                        </button>
                    </div>
                    <div class="row">
                        <button onclick="OnClickAddResultsBtn()" type="button" class="menu-button col-lg-10">
                            <h2>Добавление результатов</h2>
                        </button>
                    </div>
                </ul>

                <?
                    if(count($this -> spheres) == 0)
                    {
                        ?>
                        <picture class="col-lg-4 offset-lg-1">
                            <source srcset="../imgs/emptySpheres.webp" type="image/webp">
                            <img src="../imgs/emptySpheres.webp" style="max-width:100%;">
                        </picture>
                        <?
                    }
                    else
                    {
                        ?>
                        <div class="dashboard col-lg-5 offset-lg-1">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Сфера</th>
                                        <th>Прогресс</th>
                                        <th>XP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                        foreach($this->spheres as $sphere)
                                        {
                                            $sphere->printForTableAtAll();
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?
                    }
                ?>
            </section>
            <?
        }
    }

    $main = new MainComponent($engine->userSpheres);
    $main->print();
?>




