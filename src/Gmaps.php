<?php
namespace GmapsFacade;

use GuzzleHttp\Client;

/**
 *
 */
class Gmaps
{
  const BASE_URI = 'https://www.google.com';
  const TIMEOUT = 3.0;

  public function getCords($place)
  {
    $client = new Client([
      'base_uri' => self::BASE_URI,
      'timeout'  => self::TIMEOUT,
    ]);

    $response = $client->request('GET', 'search?gl=en&tbm=map&q='.$place.'&pb=%214m8%211m3%211d12778.663241744238%212d-2.4840032%213d36.81256%213m2%211i494%212i403%214f13.1%217i20%2110b1%2112m11%2117m2%211e1%211e0%2120m5%211e0%212e3%213b0%215e2%216b1%2126b1%2127b1%2119m3%212m2%211i376%212i111%2120m30%216m3%211m2%211i360%212i256%217m24%211m3%211e1%212b0%213e3%211m3%211e2%212b1%213e2%211m3%211e2%212b0%213e3%211m3%211e3%212b0%213e3%211m3%211e8%212b0%213e3%211m3%211e3%212b1%213e2%219b0%2122m4%217e140%219sajMOXJnOCaiQlwTj55z4DA%2115i26171%2117sajMOXJnOCaiQlwTj55z4DA%3A497401462785%2124m3%212b1%215m1%216b1%2126m7%211e12%211e15%211e13%211e3%212m2%211i80%212i80');
    $body = $response->getBody();
    $data = json_decode(preg_replace("/\)]}'/", '', $body), true);

    $name = $data[0][1][0][14][11];
    $xCord = $data[0][1][0][14][9][2];
    $yCord = $data[0][1][0][14][9][3];

    $array = [
      [
        'nombre' => $name,
        'x' => $xCord,
        'y' => $yCord,
        'm' => $xCord.','.$yCord,
      ],
      'successful' => true,
    ];

    if(empty($name)){
      $array['successful'] = false;
    }

    return $array;
  }

  public function getPlace($xCord, $yCord)
  {
    $client = new Client([
      'base_uri' => self::BASE_URI,
      'timeout'  => self::TIMEOUT,
    ]);

    $response = $client->request('GET', 'https://www.google.com/maps/preview/entity?authuser=0&hl=en&gl=en&pb=!1m14!1s!3m9!1m3!1d1385.1724138907683!2d'.$yCord.'!3d'.$xCord.'!2m0!3m2!1i605!2i666!4f13.1!4m2!3d36.797846899999996!4d'.$yCord.'!12m4!2m3!1i360!2i120!4i8!13m57!2m2!1i203!2i100!3m2!2i4!5b1!6m6!1m2!1i86!2i86!1m2!1i408!2i200!7m42!1m3!1e1!2b0!3e3!1m3!1e2!2b1!3e2!1m3!1e2!2b0!3e3!1m3!1e3!2b0!3e3!1m3!1e8!2b0!3e3!1m3!1e3!2b1!3e2!1m3!1e9!2b1!3e2!1m3!1e10!2b0!3e3!1m3!1e10!2b1!3e2!1m3!1e10!2b0!3e4!2b1!4b1!9b0!14m2!1suG8dXOXcCMGKlwSW749Q!7e81!15m21!2b1!5m4!2b1!3b1!5b1!6b1!10m1!8e3!14m1!3b1!17b1!24b1!25b1!26b1!30m1!2b1!36b1!43b1!52b1!56m1!1b1!21m0!22m1!1e81!29m0!30m1!3b1&q='.$xCord.'%2C'.$yCord);
    $body = $response->getBody();
    $data = json_decode(preg_replace("/\)]}'/", '', $body), true);

    $place = $data[0][1][0][14][37][0][0][17][0];

    if (preg_match("/^([a-zÁáÉéÍíÓóÚúÑñ\s]*),\s([0-9-]*),\s([0-9]*)\s([a-zÁáÉéÍíÓóÚúÑñ\s]*)$/i", $place)) {
      preg_match_all("/^([a-zÁáÉéÍíÓóÚúÑñ\s]*),\s([0-9-]*),\s([0-9]*)\s([a-zÁáÉéÍíÓóÚúÑñ\s]*)$/i", $place, $array);
      $lugar = $array[1][0];
      $cp = $array[3][0];
      $localidad = $array[4][0];
    } elseif (preg_match("/^([a-zÁáÉéÍíÓóÚúÑñ\s]*),\s([0-9]*)\s([a-zÁáÉéÍíÓóÚúÑñ\s]*)$/i", $place)) {
      preg_match_all("/([a-zÁáÉéÍíÓóÚúÑñ\s]*),\s([0-9]*)\s([a-zÁáÉéÍíÓóÚúÑñ\s]*)/i", $place, $array);
      $lugar = $array[1][0];
      $cp = $array[2][0];
      $localidad = $array[3][0];
    } elseif (preg_match("/^([a-zÁáÉéÍíÓóÚúÑñ\s]*),\s([0-9-]*),\s([0-9]*)\s([a-zÁáÉéÍíÓóÚúÑñ\s]*),\s([a-zÁáÉéÍíÓóÚúÑñ\s]*)$/i", $place)) {
      preg_match_all("/([a-zÁáÉéÍíÓóÚúÑñ\s]*),\s([0-9-]*),\s([0-9]*)\s([a-zÁáÉéÍíÓóÚúÑñ\s]*),\s([a-zÁáÉéÍíÓóÚúÑñ\s]*)/i", $place, $array);
      $lugar = $array[1][0];
      $cp = $array[3][0];
      $localidad = $array[4][0];
    } else {
      $lugar = 'uknown';
      $cp = 'uknown';
      $localidad = 'uknown';
    }

    $array = [
      [
        'place' => $lugar,
        'pc' => $cp,
        'location' => $localidad,
      ],
      'found' => true,
    ];

    if(empty($place)){
      $array['found'] = false;
    }

    return $array;
  }
}

?>
