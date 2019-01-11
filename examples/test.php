<?php
include __DIR__ . "/../vendor/autoload.php";

$gmaps = new \GmapsFacade\Gmaps();

echo $gmaps->getCords('Madrid');
?>
