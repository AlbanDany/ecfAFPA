<?php ob_start(); ?>
    <div class="container">
        Bienvenue sur le site de chat
    </div>
<?php $content = ob_get_clean();
require 'template.php';