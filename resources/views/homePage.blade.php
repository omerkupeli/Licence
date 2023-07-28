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
        @if(Auth::user()->role === 'admin')
   <a href="{{ route('admin') }}"> <button class="btn btn-link text-white">Ayarlar</button></a>
@endif
 
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
          @foreach($columns as $column)
            <th scope="col">{{$column->name}}</th>
          @endforeach
          <th scope="col">Düzenle/Sil</th>
        </tr>
      </thead>
      <tbody id="mytable">
        <!-- @foreach($licences as $licence)
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
        @endforeach -->
        @foreach($values->groupBy('rowNumber') as $groupedValues)
  <tr>
    <th scope="row">{{ $loop->index + 1 }}</th>
    @foreach($columns as $column)
      @php
        $valueForColumn = $groupedValues->where('column_id', $column->id)->first();
      @endphp
      <td>{{ $valueForColumn ? $valueForColumn->value : 'Girilmemiş' }}</td>
    @endforeach
    <td>
      <a href="#" class="btn btn-primary edit-row">
        <i class="fas fa-pencil-alt"></i>
      </a>
      <form action="#" method="POST" style="display: inline;">
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

 
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Yeni Bir Lisans Ekle</div>
        <div class="card-body">
          <form action="{{ route('values.store') }}" method="POST">
            @csrf
            <table class="table table-bordered">
              <thead>
                <tr>
                  @foreach($columns as $column)
                    <th>{{ $column->name }}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach($columns as $column)
                    <td>
                      <input type="text" name="values[{{ $column->id }}]" class="form-control" required>
                    </td>
                  @endforeach
                </tr>
              </tbody>
            </table>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Lisansı Kaydet</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
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
