<?php

    class PromoComponent extends Component
    {
        public function print()
        {
            ?>
            <section class="promo row">
                <section class="promo-text col-lg-4">
                    <h2>Твой успех уже совсем<br> близко&nbsp;&mdash; не&nbsp;упусти его</h2>
                    <button type="submit" class="big-yellow-btn">Начать</button>
                </section>
                <picture class="col-lg-6 offset-lg-2">
                    <source srcset="../imgs/promoImg.webp" type="image/webp">
                    <img src="../imgs/promoImg.webp" style="max-width:80%;">
                </picture>
            </section>
            <?php
        }
    }

    $promo = new PromoComponent();
    $promo->print();
?>