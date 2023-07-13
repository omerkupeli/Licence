<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet">
    <title>Document</title>
</head>
</body>
<div class="giris">
  <div class="form">
  <form class="giris-from"  method="POST" action="{{ route('register')}}">
    @csrf
      <input type="text" name="name" value="{{ old('name') }}" placeholder="Adınız"/>
      <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"/>
      <input type="password" name="password" value="{{ old('password') }}" placeholder="Şifreniz"/>
      <button type="submit">Kayıt ol</button>
      <p class="mesaj">Üye Misin ? <a href="/login">Giriş Yap</a></p>
    </form>

  </div>
</div>
</body>
</html>