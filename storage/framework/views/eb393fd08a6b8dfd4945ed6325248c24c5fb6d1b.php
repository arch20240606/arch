<?php if( isset($document->id) ): ?>
  <table class="is-table">

    <tr>
      <td>Статус документа</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
        <?php if($document->doc_status == "project"): ?>
          Проект
        <?php elseif($document->doc_status == "accepted"): ?>
          Утвержденная версия
        <?php else: ?>
          Не указано
        <?php endif; ?>
      </td>
    </tr>

    <tr>
      <td>Язык документа</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;">
        <?php if($document->doc_lang == "ru"): ?>
          Русский
        <?php elseif($document->doc_lang == "kz"): ?>
          Казахский
        <?php elseif($document->doc_lang == "en"): ?>
          Английский
        <?php elseif($document->doc_lang == "comb"): ?>
          Комбинированный
        <?php else: ?>
          Не указано
        <?php endif; ?>
      </td>
    </tr>

    <tr>
      <td style="width: 30%;">Тип документа</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;"><?php echo e($document->doc_type); ?></td>
    </tr>

    <tr>
      <td style="width: 30%;">Версия документа</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;"><?php echo e($document->doc_version); ?></td>
    </tr>


    <tr>
      <td>Год документа</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;"><?php echo e($document->doc_year); ?></td>
    </tr>

    <tr>
      <td style="width: 30%;">Название документа</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;"><?php echo e($document->doc_name); ?></td>
    </tr>

    <tr>
      <td style="width: 30%;">Файл документа</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;">
      <p style="color: #000000;">Файл: <a href="/storage/<?php echo e($document->file_name_upload); ?>" target="_blank"><?php echo e($document->file_name); ?></a></p>
      </td>
    </tr>

  </table>


<?php else: ?>
  <div class="notice">В разделе <b>Документы</b> отсутствуют файлы</div>
<?php endif; ?>


<?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/expertise/info/documents.blade.php ENDPATH**/ ?>