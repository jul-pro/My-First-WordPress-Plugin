<form action="options.php" method="POST">
    <?php
        settings_fields('MFWMainSettings');
        do_settings_sections('mfw-development-plugin');
        submit_button();
    ?>
</form>

