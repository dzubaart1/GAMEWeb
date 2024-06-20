<?php

    class InsetComponent extends Component
    {
        public function print()
        {
            ?>
            <section class="inset" id="inset">
                <p>
                    GAME&nbsp;&mdash; это система тайм-менеджмента, которая будет считать твой
                    прогресс<br> в&nbsp;различных проектах. Ты&nbsp;не&nbsp;только будешь понимать свое текущие
                    состояние по&nbsp;делам, но<br> и&nbsp;также отслеживать динамику своей продуктивности.
                </p>
            </section>
            <?php
        }
    }

    $inset = new InsetComponent();
    $inset->print();
?>