<?php 
$lista_dischi = file_get_contents("dischi.json");
$dischi = json_decode($lista_dischi, true);

if (isset($_POST["newAlbum"])) {
    $newAlbum = $_POST["newAlbum"];
    $dischi[] = $newAlbum;
    file_put_contents("dischi.json", json_encode($dischi));
$risposta = [
    "risultati" => $dischi,
    "success" => true,
  ];
}

for ($i=0; $i <count($dischi) ; $i++) { 
    if(!isset($dischi[$i]["like"])){
        $dischi[$i]["like"]= false;
    };
};
file_put_contents("dischi.json", json_encode($dischi));
$risposta = [
    "risultati" => $dischi,
    "success" => true,
  ];
  $json_lista = json_encode($risposta);
  header("Content-Type: application/json");

    echo $json_lista;
?>