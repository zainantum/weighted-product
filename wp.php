<?php
class Wp(){
$category = ["pasar", "pendapatan", "infrastruktur", "transportasi"];
$weight = [
    "pasar" => 40,
    "pendapatan" => 70,
    "infrastruktur" => 20,
    "transportasi" => 25
];

$dataExample = [
    "Alt 1" => [
        "pasar" => 2100000,
        "pendapatan" => 7200,
        "infrastruktur" => 800,
        "transportasi" => 100
    ],
    "Alt 2" => [
        "pasar" => 2000000,
        "pendapatan" => 7200,
        "infrastruktur" => 600,
        "transportasi" => 150
    ],
    "Alt 3" => [
        "pasar" => 2450000,
        "pendapatan" => 7200,
        "infrastruktur" => 1000,
        "transportasi" => 200
    ]
];

function calculateWp(){
  $vector_vi = [];
  foreach($dataExample as $key => $value){
      $calc = 1;
      foreach($value as $kAlt => $dataAlt){
          $calc = $calc * pow($dataAlt,($weight[$kAlt]/array_sum($weight)));
      }
      $vector_vi[$key] = $calc;
  }
  $vector_si = array_sum($vector_vi);
  foreach($vector_vi as $key => $value){
      $vector_vi[$key] = $value/$vector_si;
  }
  
  // sort alt 
  usort($vector_vi, function ($a, $b) { return $a < $b; });
}

}
?>
