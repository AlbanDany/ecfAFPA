<?php ob_start(); ?>
    <div class="container">
        <form method="post">
            <fieldset>
                    Entrer un utilisateur <br>
                    <input class="register" type="text" name="utilisateur" pattern="[A-Za-z0-9]+"  required title="Lettres ou chiffre uniquement" autofocus/><br>
                    Entrer un mot de passe          </br>
                    <input class="register" type="password"  required title="8 caracteres minimum, 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial" name="motdepasse" /><br>
                    Confirmer votre mot de passe <br>
                    <input class="register" type="password" name="mdpConfirm" /><br>
                    Entrer votre adresse mail<br>
                    <input class="register" type="email" pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$" required title = "Adresse mail non valide" name="adresseMail" /><br>
                    <input class="register_button" type="submit" name="btnRegister" value="S'inscrire">


                        <?php
                            if (isset($_SESSION['erreur'])){ // Affiche les erreurs
                                echo $_SESSION['erreur'];
                                $_SESSION['erreur'] =""; // ràz de la variable
                            }?>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
<?php $content = ob_get_clean();
require 'template.php';