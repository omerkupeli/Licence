<style>
  .form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 5px;
  }

  .form-container label {
    font-weight: bold;
  }

  .form-container input[type="text"],
  .form-container input[type="date"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .form-container button[type="submit"] {
    background-color: #2c3e50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .form-container button[type="submit"]:hover {
    background-color: #2c3e50;
  }
</style>

<div class="form-container">
  <form action="{{ route('licence.update', $licence->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
      <label for="licence_name">Lisans Adı:</label>
      <input type="text" id="licence_name" name="licence_name" value="{{$licence->lisansadi}}">
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" value="{{$licence->email}}">
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
</div>
