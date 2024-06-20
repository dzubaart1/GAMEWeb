<?php
    class LoginHeaderComponent extends Component
    {
        public function print()
        {
            ?>
            <header class="login-header header">
                <h1 class="logo">GAME</h1>
                <a href ="/index.php">
                    <img src="../imgs/icons/close.svg"/>
                </a>
            </header>
            <?php
        }
    }

    $loginHeader = new LoginHeaderComponent();
    $loginHeader->print();
?>