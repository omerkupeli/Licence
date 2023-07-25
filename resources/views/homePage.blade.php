<!DOCTYPE html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Uygulama Lisansları</title>
    <link rel="stylesheet" href="styles.css">
    <link href="index.css" rel="stylesheet">
  </head>
  <body>

  <nav class="navbar navbar-dark bg-mynav">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Lisans</a>
      
      @auth
        <div class="d-flex align-items-center">
        <button class= "btn btn-link text-white" >Ayarlar</button>
          <span class="navbar-text me-3">
            Hoşgeldin, {{ Auth::user()->name }}
          </span>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link text-white">Çıkış</button>
          </form>
        </div>
      @endauth
    </div>
  </nav>

  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Lisans Adı</th>
          <th scope="col">İsim</th>
          <th scope="col">Email</th>
          <th scope="col">Başlangıç</th>
          <th scope="col">Bitiş</th>
          <th scope="col">Süre (Ay)</th>
          <th scope="col">Kalan Süre</th>
          <th scope="col">Durum</th>
          <th scope="col">Düzenle/Sil</th>
        </tr>
      </thead>
      <tbody id="mytable">
        @foreach($licences as $licence)
          <?php
            $sıra = $loop->index + 1;
            $kalansüre = strtotime($licence->bitiştarihi) - strtotime('now');
            
          ?>
          <tr>
            <th scope="row">{{$sıra}}</th>
            <td>{{$licence->lisansadi}}</td>
            <td>{{$licence->isim}}</td>
            <td>{{$licence->email}}</td>
            <td>{{$licence->aliştarihi}}</td>
            <td>{{$licence->bitiştarihi}}</td>
            <td>{{$licence->süre}}</td>
            <td>
              @if($kalansüre < 0)
                <span style="color: red;">Süre Doldu</span>
              @else
                <span style="color: green;">{{floor($kalansüre / 86400)}} Gün</span>
              @endif
            </td>
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
            <td>
            <a href="{{ route('licence.edit', $licence->id) }}" class="btn btn-primary">
  <i class="fas fa-pencil-alt"></i>
</a>

              <form action="{{ route('licence.delete', $licence->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
  <i class="fas fa-trash"></i>
</button>

              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="container">
    <h2>Kayıt Formu</h2>
    <form id="registrationForm" method="POST" action="/createLicence">
      @csrf
      <div class="form-row">
        <div class="form-group">
          <label for="licence_name">Lisans Adı</label>
          <input id="licence_name" class="form-control" type="text" name="licence_name" placeholder="Lisans Adı" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" class="form-control" type="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="purchase_date">Alış Tarihi</label>
          <input id="purchase_date" class="form-control" type="date" name="purchase_date" required>
          </div><div class="form-group">
          <label for="duration">Süre (Ay)</label>
          <input id="duration" class="form-control" type="text" name="duration" required>
        </div>  
      </div>
      <button type="submit" class="btn2">Kaydet</button>
    </form>
  </div>
  <!-- send email -->
  <div class="container">
    <h2>Email Gönder</h2>
    <form id="sendEmailForm" method="POST" action="/send-welcome-email">
      @csrf
      
      <button type="submit" class="btn2">Gönder</button>
    </form>


  <script src="index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
