<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>LİSANS</title>

    <link href="index.css" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-dark bg-mynav">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Lisans</a>
      </div>
    </nav>

    <div class="container">
      <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight"><h2>Lisanslarım</div>
        <div class="p-2 bd-highlight">
          <button type="button" class="btn btn-secondary" onclick="showUserCreateBox()">EKLE</button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col"> </th>
              <th scope="col">Lisans Adı</th>
              <th scope="col">İsim      </th>
              <th scope="col">    Soyisim </th>
              <th scope="col">Email</th>
              <th scope="col">Alış Tarihi</th>
              <th scope="col">Süre</th>
              <th scope="col">Bitiş Tarihi</th>
            </tr>
          </thead>
          <tbody id="mytable">
            @foreach($licences as $licence)
            <tr>
              <th scope="row">{{$licence->id}}</th>
              <td>{{$licence->licence_name}}</td>
              <td>{{$licence->name}}</td>
              <td>{{$licence->surname}}</td>
              <td>{{$licence->email}}</td>
              <td>{{$licence->purchase_date}}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
    <form id="registrationForm" method="POST"  action="/createLicence"> 
    @csrf 
    <input id="id" type="hidden" name="id"> 
    <input id="licence_name" class="swal2-input" placeholder="Lisans Adı" name="licence_name"> 
    <input id="name" class="swal2-input" placeholder="İsim" name="name"> 
    <input id="surname" class="swal2-input" placeholder="Soyisim" name="surname"> 
    <input id="email" class="swal2-input" placeholder="Email" name="email"> 
    <input id="purchase_date" class="swal2-input" placeholder="Alış Tarihi" name="purchase_date"> 
    
    <button type="submit">Kayıt</button> 
    </form>

    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>