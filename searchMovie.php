<?php

$judul = $_GET['judul'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.omdbapi.com/?apikey=b4726e10&s=".$judul,
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
  
  foreach ($data->Search as $movie) {
    echo '<div class="col-md-3 mb-3">';
    echo    '<div class="card h-100">';
    echo         '<img src="'.$movie->Poster.'" style="height:500px" class="card-img-top rounded" alt="...">';
    echo         '<div class="card-body">';
    echo             '<input type=hidden id="idMovie" name="idMovie" value="'.$movie->imdbID.'">';
    echo             '<h5 class="card-title" id="title">'.$movie->Title.'</h5>';
    echo             '<p class="card-text">'.$movie->Year.'</p>';
    // echo             '<button class="btn btn-primary" onclick="detailMovie();" data-bs-target="#exampleModal"> Detail </button>';
    echo             '<p class="submit"><a href="detailMovie.php?idMovie='.$movie->imdbID.'" class="btn" name="detail" data-bs-toggle="modal" data-bs-target="#myModal">Detail</a></p>';
    echo         '</div>';
    echo    '</div>';
    echo '</div>';    
  }
}

// foreach ($data->Search as $movie) {
//   echo '<div class="col-md-3">';
//   echo    '<div class="card">';
//   echo         '<img src="'.$movie->Poster.'" class="card-img-top" alt="...">';
//   echo         '<div class="card-body">';
//   echo             '<input type="hidden" id="id-movie" name="id-movie" value="'.$movie->imdbID.'">';
//   echo             '<h5 class="card-title" id="title">'.$movie->Title.'</h5>';
//   echo             '<p class="card-text">'.$movie->Year.'</p>';
//   // echo             '<button class="btn btn-primary" onclick="detailMovie();" data-bs-target="#exampleModal"> Detail </button>';
//   echo             '<a class="btn btn-primary see-detail" onclick="detailMovie();" data-bs-toggle="modal" data-bs-target="#exampleModal" > Detail </a>';
//   echo         '</div>';
//   echo    '</div>';
//   echo '</div>';    
// }

?>

