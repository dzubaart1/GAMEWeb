<?php

    class PromoComponent extends Component
    {
        private $path;

        public function __construct($path)
        {
            $this -> path = $path;
        }

        public function print()
        {
            ?>
            <section class="promo row">
                <section class="promo-text col-lg-4">
                    <h2>Твой успех уже совсем<br> близко&nbsp;&mdash; не&nbsp;упусти его</h2>
                    <button type="button" onclick="OnClickRegisterBtn()" class="big-yellow-btn">Начать</button>
                </section>
                <picture class="col-lg-6 offset-lg-2">
                    <source srcset="<? echo $this->path ?>/imgs/promoImg.webp" type="image/webp">
                    <img src="<? echo $this->path ?>/imgs/promoImg.webp" style="max-width:80%;">
                </picture>
            </section>
            <?php
        }
    }

    $promo = new PromoComponent($path);
    $promo->print();
?>