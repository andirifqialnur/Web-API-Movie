<?php

$idMovie = $_GET['idMovie'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.omdbapi.com/?apikey=b4726e10&i=".$idMovie,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
  // cek perubahan json to array
  $data = json_decode($response);
  // echo "<pre>"; print_r($data); echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>API Movie</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
        <a class="navbar-brand" href="index.php">API Movie</a>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-6">
                <br>
                <h1 class="text-center">Movie Details</h1>
                <h3 class="text-center">OMDb API - The Open Movie Database</h3>
                <br>
            </div>
        </div>

        <hr>
        <br>

        <div class="row" id="movie-detail">
            
        </div>


    </div>

<?php
  echo '<div class="container-fluid">';
  echo '  <div class="row">';
  echo '      <div class="col-md-1 text-center">';

  echo '      </div>';
  echo '      <div class="col-md-3">';
  echo '          <img src="'.$data->Poster.'" style="width:280px" class="card-img-top h-auto text-center mb-3" alt="...">';
  echo '<p class="fw-bold">RATINGS</p>';
  
  foreach ($data->Ratings as $ratings ) { 
    echo '  <div class="row">';
    echo '      <div class="col-md-7">';
    echo '<p>'.$ratings->Source.'</p>';
    echo '      </div>';
    echo '      <div class="col-md-3">';
    echo '<p>: '.$ratings->Value.'</p>';
    echo '      </div>';
    echo '      </div>';
   } 
    echo '      </div>';

  echo '      <div class="col-md-7 padding-right">';
  echo '<h1 class="fw-bold">'.$data->Title.'</h1>';
  echo '<p class="fst-italic">'.$data->Plot.'</p>';
  echo '<br>';
  echo '  <div class="row">';
  echo '      <div class="col-md-2">';
  echo '<p>Year</p>';
  echo '<p>Rated</p>';
  echo '<p>Runtime</p>';
  echo '<p>Genre</p>';
  echo '<p>Released Date</p>';
  echo '<p>Language</p>';
  echo '<p>Actors</p>';
  echo '<p>Director</p>';
  echo '<p>Writer</p>';
  echo '<p>Country</p>';
  echo '<p>Awards</p>';
  echo '<br>';

  echo '      </div>';
  echo '      <div class="col-md-10">';

  echo '<p>:  '.$data->Year.'</p>';
  echo '<p>:  '.$data->Rated.'</p>';
  echo '<p>:  '.$data->Runtime.'</p>';
  echo '<p>:  '.$data->Genre.'</p>';
  echo '<p>:  '.$data->Released.'</p>';
  echo '<p>:  '.$data->Language.'</p>';
  echo '<p>:  '.$data->Actors.'</p>';
  echo '<p>:  '.$data->Director.'</p>';
  echo '<p>:  '.$data->Writer.'</p>';
  echo '<p>:  '.$data->Country.'</p>';
  echo '<p>:  '.$data->Awards.'</p>';

  // echo '          <img src="'.$data->Poster.'" style="width:280px" class="card-img-top h-auto" alt="...">';
  echo '      </div>';
  echo '<br>';
  
  // echo '          <ul class="list-group">';
  // echo '              <li class="list-group-item active" aria-current="true"><h1>'.$data->Title.'</h1></li>';

  // echo '              <li class="list-group-item">'.$data->Year.'</li>';
  // echo '              <li class="list-group-item">'.$data->Rated.'</li>';
  // echo '              <li class="list-group-item">'.$data->Released.'</li>';
  // echo '              <li class="list-group-item">'.$data->Runtime.'</li>';
  // echo '              <li class="list-group-item">'.$data->Genre.'</li>';
  // echo '              <li class="list-group-item">'.$data->Director.'</li>';
  // echo '              <li class="list-group-item">'.$data->Writer.'</li>';
  // echo '              <li class="list-group-item">'.$data->Language.'</li>';
  
  // echo '          </ul>';
  echo '      </div>';
  echo '  </div>';
  echo '      <div class="col-md-1 text-center">';

  echo '      </div>';
  echo '</div>';

}
?>

</body>
</html>