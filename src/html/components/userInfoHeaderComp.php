<?php

    class UserInfo extends Component
    {
        private $user;
        private $xp;

        function __construct($user, $xp)
        {
            $this -> user = $user;
            $this -> xp = $xp;
        }

        public function print()
        {
            ?>
            <header class="userInfo header">
                <div class="hello-block">
                    <p>
                        Привет, <? echo $this->user['name'] ?>
                    </p>
                    <a href="registerPage.php" onclick="onExit();">
                        <img src="/imgs/icons/exit.svg" width="15">
                    </a>
                </div>
                <div class="info">
                    <span class="xp">
                        <? echo $this->xp ?> XP
                    </span>
                    <span class="level">
                        <? echo intdiv($this->xp, 100) ?> Level
                    </span>
                <div>
            </header>
            <?
        }
    }

    $sum = 0;
    foreach($engine->userSpheres as $sphere)
    {
        $sum += $sphere->xp;
    }

    $userInfo = new UserInfo($engine->user, $sum);
    $userInfo->print();
?>