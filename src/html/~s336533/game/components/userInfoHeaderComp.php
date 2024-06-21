<?php

    class UserInfo extends Component
    {
        private $user;
        private $xp;
        private $path;

        function __construct($user, $xp, $path)
        {
            $this -> user = $user;
            $this -> xp = $xp;
            $this -> path = $path;
        }

        public function print()
        {
            ?>
            <header class="userInfo header">
                <div class="hello-block">
                    <p>
                        Привет, <?php echo $this->user['name'] ?>
                    </p>
                    <a href="<?echo $this->path?>/pages/registerPage.php" onclick="onExit();">
                        <img src="<? echo $this->path ?>/imgs/icons/exit.svg" width="15">
                    </a>
                </div>
                <div class="info">
                    <span class="xp">
                        <?php echo $this->xp ?> XP
                    </span>
                    <span class="level">
                        <?php echo intdiv($this->xp, 100) ?> Level
                    </span>
                <div>
            </header>
            <?php
        }
    }

    $sum = 0;
    foreach($engine->userSpheres as $sphere)
    {
        $sum += $sphere->xp;
    }

    $userInfo = new UserInfo($engine->user, $sum, $path);
    $userInfo->print();
?>