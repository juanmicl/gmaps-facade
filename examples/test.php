<?php
include __DIR__ . "/../vendor/autoload.php";

$gmaps = new \GmapsFacade\Gmaps();

$data = $gmaps->getCords('Madrid');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
echo '<br><br>';
$data = $gmaps->getPlace(40.4167754,-3.7037902);
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
