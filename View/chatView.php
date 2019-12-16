<?php ob_start(); ?>
    <div class="container">
        <div class="chatAffichage">

                    <table>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                        <?php
                        foreach ($lemsg AS $row) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['nom'];?>
                            </td>
                            <td>
                                <?php echo $row['contenu'];?>
                            </td>
                            <td>
                                <?php echo $row['datemsg'];?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>

        </div>
        <div class="chatInput">
            <form method="post">
               <?php if(isset($_SESSION['User'])) { ?>
                <?php
                echo 'Pseudo : '.$_SESSION['User'].' <br>';
               }else{?>
                   Pseudo :
                   <input class= "chat_input" type = "text"  pattern = "[A-Za-z0-9]+" name = "pseudo"autofocus /> <br >
                <?php }?>
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
    </div>
<?php $content = ob_get_clean();
require 'template.php';