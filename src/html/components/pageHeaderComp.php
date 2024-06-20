<?php

    class PageHeaderComponent extends Component
    {
        private $name;

        public function __construct($name)
        {
            $this->name = $name;
        }

        public function print()
        {
            ?>
            <header class="page-header header">
                <h1 class="h1-page"><?php echo $this->name ?></h1>
                <a href ="mainPage.php">
                    <img src="../imgs/icons/close.svg"/>
                </a>
            </header>
            <?php
        }
    }
?>