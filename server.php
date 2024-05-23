<?php 
$lista_dischi = file_get_contents("dischi.json");
$dischi = json_decode($lista_dischi, true);
$risposta = [
    "risultati" => $dischi,
    "success" => true,
  ];
  $json_lista = json_encode($risposta);
  header("Content-Type: application/json");

    echo $json_lista;
?>