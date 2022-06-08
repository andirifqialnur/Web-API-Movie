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
    <nav class="navbar navbar-expand-lg">
        <div class="container">
        <a class="navbar-brand" href="index.php">API Movie</a>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-6">
                <br>
                <h1 class="text-center">Search Movie</h1>
                <h3 class="text-center">OMDb API - The Open Movie Database</h3>
                <br>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="search-input" placeholder="Movie Title" aria-label="Recepient's Username"/>
                    <button class="btn btn-search" type="button" id="search-button" onclick="searchMovie();">Search</button>
                </div>
            </div>
        </div>

        <hr>
        <br>

        <div class="row" id="movie-list">
            
        </div>


    </div>

    <script>
      
      function searchMovie() {
          var judul = document.getElementById("search-input").value;
          
          var xmlhttp = new XMLHttpRequest();
          
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("movie-list").innerHTML = this.responseText;
            }
          };
          
          xmlhttp.open("GET", "http://localhost/apimovie2/searchMovie.php?judul="+judul, true);
          xmlhttp.send();
      }
      
      var input = document.getElementById("search-input");
      input.addEventListener("keyup", function(event) {
          if (event.keyCode === 13) {
              event.preventDefault();
              document.getElementById("search-button").click();
          }
      });

    //   function detailMovie() {
    //       var idMovie = document.getElementById("idMovie").value;
          
    //       var xmlhttp = new XMLHttpRequest();
          
    //       xmlhttp.onreadystatechange = function() {
    //           if (this.readyState == 4 && this.status == 200) {
    //               document.getElementById("isi").innerHTML = this.responseText;
    //         }
    //       };
          
    //       xmlhttp.open("GET", "http://localhost/apimovie2/detailMovie.php?idMovie="+idMovie, true);
    //       xmlhttp.send();
    //   }

    </script>

</body>
</html>