<!doctype html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Заключение экспертизы на {{ $type_project }} «{{ $name }}»</title>
  <style>
    body {
      font-family: 'DejaVu Serif';
      font-size: 10pt;
    }
    td {
      padding-bottom: 10px;
      font-size: 10pt;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body>
<p style="text-align: center; font-size: 14pt;"><b>Заключение экспертизы на {{ $type_project }} «{{ $name }}»</b></p>

<p><b>1. Документы, представленные на рассмотрение</b></p>
{!! $comm_1 !!}
<br>

<p><b>2. Документы, принятые во внимание при рассмотрении</b></p>
{!! $comm_2 !!}
<br>

<p><b>3. Используемые сокращения</b></p>
{!! $comm_3 !!}
<br>

<p><b>4.1. Проверка раздела «Назначение и цели создания (развития) системы»</b></p>
{!! $comm_4 !!}
<br>

<p><b>4.2 Проверка раздела «Характеристика объектов автоматизации»</b></p>
{!! $comm_5 !!}
<br>

<p><b>4.3 Проверка подраздела «Требования к системе в целом» раздела «Требования к системе»</b></p>
{!! $comm_6 !!}
<br>

<p><b>4.4 Проверка подраздела «Требование к функциям (задачам)» раздела «Требования к системе»</b></p>
{!! $comm_7 !!}
<br>

<p><b>4.5 Проверка подраздела «Требования к видам обеспечения» раздела «Требования к системе»</b></p>
{!! $comm_8 !!}
<br>

<p><b>4.6 Проверка раздела «Состав и содержание работ по созданию/модификации системы»</b></p>
{!! $comm_9 !!}
<br>

<p><b>4.7 Проверка раздела «Порядок контроля и приемки системы»</b></p>
{!! $comm_10 !!}
<br>

<p><b>4.8 Проверка раздела «Требования к составу и содержанию работ по подготовке объекта автоматизации к вводу системы в действие»</b></p>
{!! $comm_11 !!}
<br>

<p><b>4.9 Проверка раздела «Требования к документированию»</b></p>
{!! $comm_12 !!}
<br>

<p><b>4.10 Проверка раздела «Источники разработки»</b></p>
{!! $comm_13 !!}
<br>

<p><b>Выводы и рекомендации</b></p>
{!! $comment_accept !!}

<br><br>
<p><b>Подписи:</b></p>
<div>
  <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $type_project }} «{{ $name }}»&size=200x200">
  &nbsp;&nbsp;
  <img src="https://api.qrserver.com/v1/create-qr-code/?data=Подписант со стороны МЦРИАП: {{ $ecp_name_mcriap }} - {{ $ecp_mcriap }}&size=200x200">
  &nbsp;&nbsp;
  <img src="https://api.qrserver.com/v1/create-qr-code/?data=Подписант со стороны ГО: {{ $ecp_name_go }} - {{ $ecp }}&size=200x200">
</div>

</body>
</html>