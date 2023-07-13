<form action="{{ route('licence.update', $licence->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div>
    <label for="licence_name">Lisans Adı:</label>
    <input type="text" id="licence_name" name="licence_name" value="{{$licence->lisansadi}}">
  </div>
  <div>
    <label for="name">İsim:</label>
    <input type="text" id="name" name="name" value="{{$licence->isim}}">
  </div>
  <div>
    <label for="surname">Soyisim:</label>
    <input type="text" id="surname" name="surname" value="{{$licence->soyisim}}">
  </div>
  <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{$licence->email}}">
  </div>
  <div>
    <label for="purchase_date">Alış Tarihi:</label>
    <input type="date" id="purchase_date" name="purchase_date" value="{{$licence->aliştarihi}}">
  </div>
  <div>
    <label for="duration">Süre:</label>
    <input type="text" id="duration" name="duration" value="{{$licence->süre}}">
  </div>
  <div>
    <label for="end_date">Bitiş Tarihi:</label>
    <input type="date" id="end_date" name="end_date" value="{{$licence->bitiştarihi}}">
  </div>
  <button type="submit">Güncelle</button>
</form>
