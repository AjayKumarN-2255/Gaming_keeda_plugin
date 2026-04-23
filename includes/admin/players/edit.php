<?php

function igk_players_edit_page()
{

    echo '<div id="igk-admin"
        data-module="players"
        data-view="' . esc_attr($_GET['page']) . '">
    </div>';
}
