<?php ob_start(); ?>
    <div class="container">
        <form method="post">
            Pseudo :
            <input class= "chat_input" type="text"  pattern="[A-Za-z0-9]+" name="pseudo"autofocus/> <br>
            Message :
            <input class= "chat_input" type="text"  name="message" /> <br>
            <input class="chat_button" type="submit" value="Envoi" name="envoimsg">

            <?php if (isset ($_SESSION['message']))
            {
                echo $_SESSION['message'];
                $_SESSION['message'] = '';
            } ?>
        </form>
    </div>
<?php $content = ob_get_clean();
require 'template.php';