<?php
    class CopyrightComponent extends Component
    {
        public function print()
        {
            ?>
            <section class="copyright row">
                <p>Copyright © 2010-2024 GAME</p>
            </section>
            <?
        }
    }

    $copyright = new CopyrightComponent();
    $copyright->print();
?>