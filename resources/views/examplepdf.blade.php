<!doctype html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Example PDF</title>
  <style>
    body {
      font-family: 'DejaVu Serif';
    }
    td {
      padding-bottom: 10px;
      font-size: 11pt;
    }
  </style>
</head>

<body>
<h3 style="text-align: center; font-size: 13pt;">{{ $type_project }}<br>«{{ $name }}»</h3>
<p style="text-align: center; font-size: 12pt;"><b>Паспорт</b></p>

<table style="width: 100%;">
  <tbody>
    <tr>
      <td style="width: 40%; font-weight: bold;">1.1. Полное наименование системы</td>
      <td style="width: 60%;">{{ $type_project }} «{{ $name }}»</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Условное обозначение системы</td>
      <td>{{ $abbr }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">1.2. Шифр темы или шифр (номер) договора</td>
      <td>{{ $num_poject }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Реквизиты разработчика системы</td>
      <td>{{ $company }}, {{ $address}}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Реквизиты заказчика (пользователя) системы</td>
      <td>{{ $сustomer }}, {{ $address_customer}}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">1.4. Перечень документов, на основании которых создана система</td>
      <td>{{ $list_docs }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">1.5. Плановые сроки начала и окончания работы по созданию (развитию) системы</td>
      <td>{{ $dates_start_end }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">1.6. Сведения об источниках и порядке финансирования работ</td>
      <td>{{ $finanсes }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">2.1. Назначение системы</td>
      <td>{{ $is_appointment }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">2.2. Цели создания системы</td>
      <td>{{ $is_target }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Тип НТД</td>
      <td>{{ $type_ntd }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Основание разработки</td>
      <td>{{ $basis_development }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Ссылка на документ по основанию разработки</td>
      <td>{{ $links }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Год реализации</td>
      <td>{{ $build_year }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Состав ИС</td>
      <td>{{ $sostav }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Функции модуля или подсистемы</td>
      <td>{{ $modules }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Используемое ПО</td>
      <td>{{ $po }}</td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Наличие хостинга</td>
      <td>{{ $hosting }}</td>
    </tr>
  </tbody>
</table>

<br><br><br><br>

<div>
  <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $type_project }} «{{ $name }}»&size=200x200">
  &nbsp;&nbsp;
  <img src="https://api.qrserver.com/v1/create-qr-code/?data=Подписант со стороны МЦРИАП: {{ $ecp_name_mcriap }} - {{ $ecp_mcriap }}&size=200x200">
  &nbsp;&nbsp;
  <img src="https://api.qrserver.com/v1/create-qr-code/?data=Подписант со стороны ГО: {{ $ecp_name_go }} - {{ $ecp }}&size=200x200">
</div>

</body>
</html>