<?php

function igk_rebuild_frontend()
{
    echo '<div id="igk-admin"
        data-module="players"
        data-view="' . esc_attr($_GET['page']) . '"> 
        <h1>Rebuilding Frontend...</h1>
        <p>This process may take a few moments. Please do not navigate away from this page until the rebuild is complete.</p>   
    </div>';
}
