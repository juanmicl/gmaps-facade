<?php
include __DIR__ . "/../vendor/autoload.php";

$gmaps = new \GmapsFacade\Gmaps();

$data = $gmaps->getCords('Madrid');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
