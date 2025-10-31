<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Beylikler') }}</title>
  <style>
    body{background:#0b0b0f;color:#f3f4f6;font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,Noto Sans,sans-serif;display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0}
    .card{background:#15151d;border:1px solid #262636;border-radius:14px;padding:28px;max-width:720px;width:92%}
    h1{margin:0 0 8px}
    .muted{color:#9aa0a6}
    a.btn{display:inline-block;margin-top:16px;padding:10px 14px;border-radius:8px;background:#ef4444;color:#fff;text-decoration:none}
  </style>
</head>
<body>
  <div class="card">
    <h1>Beylikler</h1>
    <p class="muted">MVP arayüz kuruluyor. Burada beylik oluşturma ve şehir paneli görünecek.</p>
    <p class="muted">Kurulum başarılı. Laravel varsayılan sayfası yerine bu ekran gösteriliyor.</p>
    <a class="btn" href="#" onclick="alert('Yakında: Beylik oluşturma akışı');return false;">Devam</a>
  </div>
</body>
</html>
