<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <!-- İhtiyacınıza göre CSS dosyalarınızı buraya ekleyebilirsiniz -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="admin.css">
  <style>
    /* Reset CSS */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }

    /* Genel stiller */
    h1 {
      text-align: center;
      margin-top: 40px;
      color: #333;
    }

    /* Sol menü */
    .sidebar {
      background-color: #2c3e50;
      color: #fff;
      width: 240px;
      height: 100vh;
      padding: 20px;
      position: fixed; /* Yeni eklenen stil: Sol menünün sabitlenmesi */
      top: 0; /* Yeni eklenen stil: Sol menünün üstte başlaması */
      left: 0; /* Yeni eklenen stil: Sol menünün solda başlaması */
    }

    .sidebar h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar li {
      margin-bottom: 10px;
    }

    .sidebar a {
      color: #fff;
      text-decoration: none;
    }

    .sidebar a:hover {
      color: #f0f0f0;
    }

    /* İçerik alanı */
    .content {
      padding: 20px;
      margin-left: 260px; /* Yeni eklenen stil: İçerik alanını sağa kaydırma */
    }

    .content h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }

    /* Dashboard içeriği stilini güncelliyoruz */
    #dashboard {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .widget {
      flex: 1 1 300px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .widget h3 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #333;
    }

    .widget-data {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    /* Kullanıcıları düzenleme alanı */
    .user-table {
      width: 100%;
    }

    .user-table th,
    .user-table td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }

    .user-table th {
      background-color: #f2f2f2;
    }

    .user-role {
      padding: 6px 10px;
      border-radius: 4px;
      font-weight: bold;
    }

    .admin {
      background-color: #f2f2f2;
      color: #000;
    }

    .user {
      background-color: #f2f2f2;
      color: #000;
    }

    .change-role-btn {
      padding: 6px 12px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      color: #fff;
    }

    .change-role-btn.admin {
      background-color: #f44336;
    }

    .change-role-btn.user {
      background-color: #4caf50;
    }

    /* Ürün tablosu stilini güncelliyoruz */
    .product-table {
      width: 100%;
    }

    .product-table th,
    .product-table td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }

    .product-table th {
      background-color: #f2f2f2;
    }

    .add-btn,
    .edit-btn,
    .delete-btn {
      padding: 8px 12px;
      background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }

    .edit-btn {
      background-color: #2980b9;
    }

    .delete-btn {
      background-color: #e74c3c;
    }

    .add-btn:hover,
    .edit-btn:hover,
    .delete-btn:hover {
      background-color: #555;
    }

    /* Responsive tasarım için */
    @media screen and (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: static; /* Yeni eklenen stil: Sol menünün responsive görünümde sabitlenmesi kaldırıldı */
        margin-bottom: 20px; /* Yeni eklenen stil: Sol menü ile içerik arasında boşluk bırakma */
      }
      #dashboard {
        flex-direction: column;
      }
      .widget {
        margin: 10px 0;
      }
      .content {
        margin-left: 0; /* Yeni eklenen stil: İçerik alanının responsive görünümde sol kenara yapışık kalması */
      }
    }
  </style>
</head>

<body>
  <!-- Sol menü -->
  <aside class="sidebar">
    <h1>Admin Panel</h1>
    <ul>
      <li><a href="#dashboard">Dashboard</a></li>
      <li><a href="#users">Users</a></li>
      <li><a href="#products">Products</a></li>
      <!-- Diğer sayfalara yönlendiren menü öğeleri -->
    </ul>
  </aside>

  <!-- İçerik alanı -->
  <main class="content">
    <!-- Dashboard içeriği -->
    <section id="dashboard">
      <h2>Dashboard</h2>
      <div class="widget">
        <h3>Toplam Kullanıcı Sayısı</h3>
        <?php $userCount = DB::table('users')->count(); ?>
        <p class="widget-data">{{$userCount}}</p>
      </div>
      <div class="widget">
        <h3>Toplam Yönetici Sayısı</h3>
        <?php $adminCount = DB::table('users')->where('role', 'admin')->count(); ?>
        <p class="widget-data">{{$adminCount}}</p>
      </div>
      <div class="widget">
        <h3>Günlük Ziyaretçi Sayısı</h3>
        <p class="widget-data">3</p>
      </div>
    </section>

    <!-- Kullanıcıları düzenleme alanı -->
    <section id="users">
      <h2>Users</h2>
      <table class="user-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Adı</th>
            <th>Email</th>
            <th>Yetki Seviyesi</th>
            <th>Yetki Değiştir</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>
      @if($user->role === 'admin')
        <span class="user-role admin">Admin</span>
      @else
        <span class="user-role">Kullanıcı</span>
      @endif
    </td>
    <td>
    @if($user->role === 'admin')
        <form action="{{ route('setUserRole') }}" method="POST" style="display: inline;">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="hidden" name="role" value="user">
            <button type="submit" class="change-role-btn admin" style="background-color: red; color: white;">Kullanıcı Yap</button>
        </form>
    @else
        <form action="{{ route('setUserRole') }}" method="POST" style="display: inline;">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="hidden" name="role" value="admin">
            <button type="submit" class="change-role-btn" style="background-color: green; color: white;">Admin Yap</button>
        </form>
    @endif
</td>

@endforeach




          <!-- Diğer kullanıcılar için benzer satırlar ekleyebilirsiniz -->
        </tbody>
      </table>
    </section>

    <!-- Ürünleri düzenleme alanı -->
    <section id="products">
      <h2>Products</h2>
      <button id="add-product-btn" class="add-btn">Ekle</button>
      <table class="product-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Parametre Adı</th>
            <th>Parametre Türü</th>
            <th>Uzunluk</th>
            <th>Düzenle/Sil</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            
         
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <button class="edit-btn">Düzenle</button>
              <button class="delete-btn">Sil</button>
            </td>
          </tr>
          <!-- Diğer ürünler için benzer satırlar ekleyebilirsiniz -->
        </tbody>
      </table>
    </section>
  </main>
</body>

</html>
