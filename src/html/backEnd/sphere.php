<?php
    class Sphere
    {
        public $name;
        public $color;
        public $xp;
        public $id;

        function __construct($name, $color, $id)
        {
            $this -> name = $name;
            $this -> color = $color;
            $this -> xp = 0;
            $this -> id = $id;
        }

        function printForEditing()
        {
            ?>
            <section class="swiper-slide">
                <form method="post" action="../components/editSpheresComp.php" class="sphere">
                    <div class="sphere-header" sphereID="<? echo $this->id ?>" sphereName="<? echo $this->name ?>" style="background-color: <? echo $this->color ?> !important;">
                        <label>
                            <img src="/imgs/icons/colorIcon.svg" width="30"/>
                            <input type='color' name="color" sphereName="<? echo $this->name ?>" class="color-pickers" value="<? echo $this->color ?>">
                        </label>
                    </div>
                    <div class="sphere-inputs">
                        <input class="sphere-editing-input-field"  type='text' name="sphere" value='<? echo $this -> name?>'>
                        <input type='hidden' name="oldsphere" value='<? echo $this -> name?>'>
                        <br>
                        <button class="green-primary-btn" type="submit" value="save" name="type">Сохранить</button>
                        <button class="red-primary-btn" type="submit" value="delete" name="type">Удалить</button>
                    </div>
                </form>
            </section>
            <?
        }

        function printForAdding()
        {
            ?>
            <section class="swiper-slide">
                <form method="post" action="../components/addResultsComp.php" class="sphere">
                    <div class="sphere-header" sphereID="<? echo $this->id ?>" sphereName="<? echo $this->name ?>" style="background-color: <? echo $this->color ?>"></div>
                    <div class="sphere-inputs">
                        <h1><?echo $this -> name?></h1>
                        <div class="sphere-adding-inputs">
                            <table>
                                <tr>
                                    <td>
                                        <img src="/imgs/icons/question.svg" style="max-width:100%;" class="hint-img">
                                        <div class="hint" class="disabled">
                                            <p>Впиши сюда, то кол-во задач по этой сфере, которые дались легко</p>
                                        </div>
                                    </td>
                                    <td><p>Легкие задачи:</p></td>
                                    <td><input type='number' name="easyTasks"placeholder='0'></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/imgs/icons/question.svg" style="max-width:100%;" class="hint-img">
                                        <div class="hint" class="disabled">
                                            <p>Впиши сюда, то кол-во задач по этой сфере, которые дались с трудом</p>
                                        </div>
                                    </td>
                                    <td><p>Средние задачи:</p></td>
                                    <td><input type='number' name="mediumTasks"placeholder='0'></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/imgs/icons/question.svg" style="max-width:100%;" class="hint-img">
                                        <div class="hint" class="disabled">
                                            <p>Впиши сюда, то кол-во задач по этой сфере, которые чудом получилось сделать</p>
                                        </div>
                                    </td>
                                    <td><p>Сложные задачи:</p></td>
                                    <td><input type='number' name="hardTasks"placeholder='0'></td>
                                </tr>
                            </table>
                            <button class="green-primary-btn" type="submit">Добавить</button>
                        </div>
                        <input type="hidden" name="sphere" value="<? echo $this->name ?>">
                    </div>
                </form>
            </section>
            <?
        }

        function printForTableOnlyXP()
        {
            ?>
            <tr>
                <td width="20%"><? echo $this->name ?></td>
                <td width="20%"><? echo $this->xp ?></td>
            </tr>
            <?
        }

        function printForTableAtAll()
        {
            $xpPercent = $this->xp;

            if($xpPercent > 100)
            {
                $xpPercent = 100;
            }

            ?>
            <tr>
                <td width="15%">
                    <? echo $this->name ?>
                </td>
                <td width="40%">
                    <div class="progress-bar-grey">
                        <div class="progress-bar-current" style="background-color: <? echo $this->color ?>; width: <? echo $xpPercent ?>%;">
                        </div>
                    </div>
                </td>
                <td width="8%">
                    <? echo $this->xp ?>
                </td>
            </tr>
            <?
        }
    }
?>