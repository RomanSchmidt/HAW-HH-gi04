<?php

    echo '<div id="errorContainer" class="'.($error && sizeof($error) ? '' : 'hidden').'"><ui>';
    foreach ($error as $errorEntry) {
        echo '<li>' . $errorEntry . '</li>';
    }
    echo '</ui></div>';
