<?php

function _dump($value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}
function _redirectRe($page){
    header("refresh:0.5;url=$page");
}
function _redirectLo($page){
    header("Location: $page");
}

?>