<?php
include __DIR__ . "/../vendor/autoload.php";

$gmaps = new \GmapsFacade\Gmaps();

echo $gmaps->getCords('Madrid');
echo '<br><br>';
echo $gmaps->getPlace(40.4167754,-3.7037902);
?>
