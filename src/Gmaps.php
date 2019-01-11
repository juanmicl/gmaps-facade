<?php
namespace GmapsFacade;

use GuzzleHttp\Client;

/**
 *
 */
class Gmaps
{

  public function getCords($place)
  {
    $client = new Client([
      'base_uri' => 'https://www.google.es',
      'timeout'  => 3.0,
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

    return json_encode($array, JSON_UNESCAPED_UNICODE);
  }
}

?>
