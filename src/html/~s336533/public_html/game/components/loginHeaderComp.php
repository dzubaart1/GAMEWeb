<?php
    class LoginHeaderComponent extends Component
    {
        private $path;

        public function __construct($path)
        {
            $this->path = $path;
        }

        public function print()
        {
            ?>
            <header class="login-header header">
                <h1 class="logo">GAME</h1>
                <a href ="<? echo $this->path?>/index.php">
                    <img src="<? echo $this->path?>/imgs/icons/close.svg"/>
                </a>
            </header>
            <?php
        }
    }

    $loginHeader = new LoginHeaderComponent($path);
    $loginHeader->print();
?>