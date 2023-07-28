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

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Value</div>
        <div class="card-body">
          <form action="{{ route('values.update', $value) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Column Name</th>
                    <th>Value</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($columns as $column)
                    <tr>
                      <td>
                        <label for="column_{{ $column->id }}">{{ $column->name }}</label>
                      </td>
                      <td>
                        <input type="text" name="values[{{ $column->id }}]" id="column_{{ $column->id }}" class="form-control" value="{{ $value->where('column_id', $column->id)->first()->value }}" required>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="text-center mt-3">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
