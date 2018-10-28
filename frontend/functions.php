<?php

function debug($arr) {
        echo '<pre>' . print_r($arr, true) . '</pre>';
        echo ob_end_clean();
}