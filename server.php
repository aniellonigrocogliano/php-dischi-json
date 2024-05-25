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

if (isset($_POST["action"]) && $_POST["action"] === "togglelike") {
    $album_index = $_POST["album_index"];
    $dischi[$album_index]["like"] = !$dischi[$album_index]["like"];
  };
  if (isset($_POST["action"]) && $_POST["action"] === "delete") {
    $album_index = $_POST["album_index"];
    array_splice($dischi, $album_index, 1);
  };

for ($i=0; $i <count($dischi) ; $i++) { 
    if(!isset($dischi[$i]["like"])){
        $dischi[$i]["like"]= false;
    };
    if(($dischi[$i]["title"]==="")){
        $dischi[$i]["title"]="ND";
    };
    if(($dischi[$i]["author"]==="")){
        $dischi[$i]["author"]="ND";
    };
    if(($dischi[$i]["year"]==="")){
        $dischi[$i]["year"]="ND";
    };
    if(($dischi[$i]["genre"]==="")){
        $dischi[$i]["genre"]="ND";
    };
    if(($dischi[$i]["poster"]==="")){
        $dischi[$i]["poster"]="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg";
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