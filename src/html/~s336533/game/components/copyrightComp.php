<?php
    class CopyrightComponent extends Component
    {
        public function print()
        {
            ?>
            <section class="copyright row col-lgl-12">
                <p>Copyright © 2010-2024 GAME</p>
            </section>
            <?php
        }
    }

    $copyright = new CopyrightComponent();
    $copyright->print();
?>