<?php

    class PageHeaderComponent extends Component
    {
        private $name;
        private $path;

        public function __construct($name, $path)
        {
            $this->name = $name;
            $this->path = $path;
        }

        public function print()
        {
            ?>
            <header class="page-header header">
                <h1 class="h1-page"><?php echo $this->name ?></h1>
                <a href ="<? echo $this->path?>/pages/mainPage.php">
                    <img src="<? echo $this->path?>/imgs/icons/close.svg"/>
                </a>
            </header>
            <?php
        }
    }
?>