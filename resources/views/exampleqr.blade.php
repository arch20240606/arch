<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Тестовая страница генерации QR-кода</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>
  <div class="container mt-4">
    {!! QrCode::size(300)->generate(utf8_decode('Проверка генерации QR-кода')) !!}
  </div>
</body>
</html>