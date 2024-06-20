<?php

    class IndexHeaderComponent extends Component
    {
        public function print()
        {
            ?>
            <header class="index-header navbar navbar-light navbar-expand-lg fixed-top container">
                <h1 class="logo">GAME</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="false" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="#inset">О проекте</a></li>
                        <li class="nav-item"><a href="#advantages">Преимущества</a></li>
                        <li class="nav-item"><a href="#contacts">Контакты</a></li>
                    </ul>
                    <section>   
                        <button type="submit" class="green-secondary-btn" onclick="OnClickLoginBtn()">Вход</button>
                        <button type="submit" class="red-secondary-btn" onclick="OnClickRegisterBtn()">Регистрация</button>
                    </section>
                </div>
            </header>
            <?
        }
    }

    $indexHeader = new IndexHeaderComponent();
    $indexHeader->print();
?>