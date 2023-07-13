<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Uygulama Lisansları</title>

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
        <div class="me-auto p-2 bd-highlight"><h2>Kullanıcı</div>
        <div class="p-2 bd-highlight">
          <button type="button" class="btn btn-secondary" onclick="showUserCreateBox()">Ekle</button>
        </div>
      </div>

      <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Lisans Adı</th>
        <th scope="col">Ad</th>
        <th scope="col">Soyad</th>
        <th scope="col">Email</th>
        <th scope="col">Başlangıç</th>
        <th scope="col">Bitiş</th>
        <th scope="col">Süre</th>
        <th scope="col">Durum</th>
      </tr>
    </thead>
    <tbody id="mytable">
      @foreach($licences as $licence)
      <tr>
        <th scope="row">{{$licence->id}}</th>
        <td>{{$licence->lisansadi}}</td>
        <td>{{$licence->isim}}</td>
        <td>{{$licence->soyisim}}</td>
        <td>{{$licence->email}}</td>
        <td>{{$licence->aliştarihi}}</td>
        <td>{{$licence->bitiştarihi}}</td>
        <td>{{$licence->süre}}</td>
        <td>
  <div style="display: flex; align-items: center;">
    @if(strtotime($licence->bitiştarihi) < strtotime('now'))
      <div style="background-color: red; width: 20px; height: 20px; border-radius: 50%;"></div>
      <span style="margin-left: 5px;">Pasif</span>
    @else
      <div style="background-color: green; width: 20px; height: 20px; border-radius: 50%;"></div>
      <span style="margin-left: 5px;">Aktif</span>
    @endif
  </div>
</td>

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
      <input id="duration" class="swal2-input" placeholder="Süre" name="duration">
      <input id="end_date" class="swal2-input" placeholder="Bitiş Tarihi" name="end_date">
      
      <button type="submit">Kayıt</button> 
      </form>

    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>