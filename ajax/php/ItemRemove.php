<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
$reply = $_GET['removeItem'];

if($reply == "1"){
    echo 'Item removed from your cart!';
}
echo '</response>';
