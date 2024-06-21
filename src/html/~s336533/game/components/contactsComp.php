<?php
    class ContactsComponent extends Component
    {
        private $path;

        public function __construct($path)
        {
            $this -> path = $path;
        }

        public function print()
        {
            ?>
            <section class="contacts" id="contacts">
                <h2>Остались вопросы? Напиши нам!</h2>
                <div class="row">
                    <table class="col-lg-4">
                        <tr>
                            <td><p>Почта:</p></td>
                            <td><a href="mailto:game_manager@gmail.com">game_manager@gmail.com</a></td>
                        </tr>
                        <tr>
                            <td><p>Телефон:</p></td>
                            <td><a href="tel:79006270352">+7(900)627-03-52</a></td>
                        </tr>
                        <tr>
                            <td><p>Адрес:</p></td>
                            <td><p>г. Санкт-Петербург, ул. Павла 9</p></td>
                        </tr>
                    </table>
                    <picture class="col-lg-6 offset-lg-2">
                        <source srcset="<? echo $this->path?>/imgs/contacts.webp" type="image/webp">
                        <img src="<? echo $this->path?>/imgs/contacts.webp" style="max-width:80%;">
                    </picture>
                </div>
            </section>
            <?php
        }
    }

    $contacts = new ContactsComponent($path);
    $contacts->print();
?>