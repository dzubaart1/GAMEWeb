<?php

    class Date
    {
        public $spheres;
        public $date;

        public function __construct($date)
        {
            $this -> spheres = array();
            $this -> date = $date;
        }

        public function print()
        {
            ?>
                <section class="date swiper-slide">
                    <div class="date-header" style="background-color: <? echo $this->spheres[0]->color ?>">
                    </div>
                    <div class="date-content">
                        <h1><? echo $this->date ?></h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Сфера</th>
                                    <th>XP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                    foreach($this->spheres as $sphere)
                                    {
                                        $sphere->printForTableOnlyXP();
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            <?
        }

        public function addSphere($sphere)
        {
            array_push($this->spheres, $sphere);
        }
    }
?>