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
  
    <form class="giris-from"  method="POST" action="{{ route('login') }}">
      @csrf
      <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email"/>
      <input id="password" type="password" name="password" value="{{ old('password') }}" placeholder="Şifreniz"/>
      <button type="submit">Giriş Yap</button>
      <p class="mesaj">Üye Değil Misin ? <a href="/kayıt">Hesap Oluştur</a></p>
    </form>
  </div>
</div>
</body>
</html>