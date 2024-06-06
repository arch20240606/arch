<!doctype html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Заключение экспертизы на <?php echo e($type_project); ?> «<?php echo e($name); ?>»</title>
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
<p style="text-align: center; font-size: 14pt;"><b>Заключение экспертизы на <?php echo e($type_project); ?> «<?php echo e($name); ?>»</b></p>

<p><b>1. Документы, представленные на рассмотрение</b></p>
<?php echo $comm_1; ?>

<br>

<p><b>2. Документы, принятые во внимание при рассмотрении</b></p>
<?php echo $comm_2; ?>

<br>

<p><b>3. Используемые сокращения</b></p>
<?php echo $comm_3; ?>

<br>

<p><b>4.1. Проверка раздела «Назначение и цели создания (развития) системы»</b></p>
<?php echo $comm_4; ?>

<br>

<p><b>4.2 Проверка раздела «Характеристика объектов автоматизации»</b></p>
<?php echo $comm_5; ?>

<br>

<p><b>4.3 Проверка подраздела «Требования к системе в целом» раздела «Требования к системе»</b></p>
<?php echo $comm_6; ?>

<br>

<p><b>4.4 Проверка подраздела «Требование к функциям (задачам)» раздела «Требования к системе»</b></p>
<?php echo $comm_7; ?>

<br>

<p><b>4.5 Проверка подраздела «Требования к видам обеспечения» раздела «Требования к системе»</b></p>
<?php echo $comm_8; ?>

<br>

<p><b>4.6 Проверка раздела «Состав и содержание работ по созданию/модификации системы»</b></p>
<?php echo $comm_9; ?>

<br>

<p><b>4.7 Проверка раздела «Порядок контроля и приемки системы»</b></p>
<?php echo $comm_10; ?>

<br>

<p><b>4.8 Проверка раздела «Требования к составу и содержанию работ по подготовке объекта автоматизации к вводу системы в действие»</b></p>
<?php echo $comm_11; ?>

<br>

<p><b>4.9 Проверка раздела «Требования к документированию»</b></p>
<?php echo $comm_12; ?>

<br>

<p><b>4.10 Проверка раздела «Источники разработки»</b></p>
<?php echo $comm_13; ?>

<br>

<p><b>Выводы и рекомендации</b></p>
<?php echo $comment_accept; ?>


<br><br>
<p><b>Подписи:</b></p>
<div>
  <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo e($type_project); ?> «<?php echo e($name); ?>»&size=200x200">
  &nbsp;&nbsp;
  <img src="https://api.qrserver.com/v1/create-qr-code/?data=Подписант со стороны МЦРИАП: <?php echo e($ecp_name_mcriap); ?> - <?php echo e($ecp_mcriap); ?>&size=200x200">
  &nbsp;&nbsp;
  <img src="https://api.qrserver.com/v1/create-qr-code/?data=Подписант со стороны ГО: <?php echo e($ecp_name_go); ?> - <?php echo e($ecp); ?>&size=200x200">
</div>

</body>
</html><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/expertise_result.blade.php ENDPATH**/ ?>