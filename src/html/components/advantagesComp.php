<?php

    class AdvantagesComponent extends Component
    {
        public function print()
        {
            ?>
            <section class="advantages" id="advantages">
            <h2>Почему именно&nbsp;мы?</h2>
            <ul class="row">
                <li class="advantage col-lg-3 offset-lg-1">
                    <picture>
                        <source srcset="../imgs/icons/star.webp" type="image/webp">
                        <img src="../imgs/icons/star.webp">
                    </picture>
                    <p class="p">XP&nbsp;и&nbsp;Level позволяют отслеживать прогресс</p>
                </li>
                <li class="advantage col-lg-4">
                    <picture>
                        <source srcset="../imgs/icons/loupe.webp" type="image/webp">
                        <img src="../imgs/icons/loupe.webp">
                    </picture>
                    <p class="p">Просмотр истории достижений для анализа продуктивности</p>
                </li>
                <li class="advantage col-lg-3">
                    <picture>
                        <source srcset="../imgs/icons/mail.webp" type="image/webp">
                        <img src="../imgs/icons/mail.webp">
                    </picture>
                    <p class="p">Делись победами в&nbsp;соц сетях и&nbsp;мотивируй других</p>
                </li>
            </ul>
            </section>
            <?
        }
    }

    $advantages = new AdvantagesComponent();
    $advantages->print();
?>