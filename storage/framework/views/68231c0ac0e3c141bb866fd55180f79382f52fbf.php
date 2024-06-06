<table class="is-table">

  <?php if(isset($document->id)): ?> <?php if($document->doc_status == "project"): ?> selected <?php endif; ?> <?php endif; ?>

  <tr>
    <td>Статус документа</td>
    <td></td>
    <td style="padding: 12px 20px 12px 20px;">
      <select id="doc_status" name="doc_status">
        <option value="project" <?php if(isset($document->id)): ?> <?php if($document->doc_status == "project"): ?> selected <?php endif; ?> <?php endif; ?>>Проект</option>
        <option value="accepted" <?php if(isset($document->id)): ?> <?php if($document->doc_status == "accepted"): ?> selected <?php endif; ?> <?php endif; ?>>Утвержденная версия</option>
      </select>
    </td>
  </tr>

  <tr>
    <td>Язык документа</td>
    <td></td>
    <td style="padding: 12px 20px 12px 20px;">
      <select id="doc_lang" name="doc_lang">
        <option value="ru" <?php if(isset($document->id)): ?> <?php if($document->doc_lang == "ru"): ?> selected <?php endif; ?> <?php endif; ?>>Русский</option>
        <option value="kz" <?php if(isset($document->id)): ?> <?php if($document->doc_lang == "kz"): ?> selected <?php endif; ?> <?php endif; ?>>Казахский</option>
        <option value="en" <?php if(isset($document->id)): ?> <?php if($document->doc_lang == "en"): ?> selected <?php endif; ?> <?php endif; ?>>Английский</option>
        <option value="comb" <?php if(isset($document->id)): ?> <?php if($document->doc_lang == "comb"): ?> selected <?php endif; ?> <?php endif; ?>>Комбинированный</option>
      </select>
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Тип документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;"><input <?php if(isset($document->id)): ?> value="<?php echo e($document->doc_type); ?>" <?php endif; ?> id="doc_type" name="doc_type" type="text" minlength="3" maxlength="200">
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Версия документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;"><input <?php if(isset($document->id)): ?> value="<?php echo e($document->doc_version); ?>" <?php endif; ?> id="doc_version" name="doc_version" type="text" maxlength="30">
    </td>
  </tr>


  <tr>
    <td>Год документа</td>
    <td></td>
    <td style="padding: 12px 20px 12px 20px;">
      <select id="doc_year" name="doc_year">
        <option value="2008" label="2008" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2023"): ?> selected <?php endif; ?> <?php endif; ?>>2008</option>
        <option value="2009" label="2009" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2023"): ?> selected <?php endif; ?> <?php endif; ?>>2009</option>
        <option value="2010" label="2010" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2010"): ?> selected <?php endif; ?> <?php endif; ?>>2010</option>
        <option value="2011" label="2011" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2011"): ?> selected <?php endif; ?> <?php endif; ?>>2011</option>
        <option value="2012" label="2012" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2012"): ?> selected <?php endif; ?> <?php endif; ?>>2012</option>
        <option value="2013" label="2013" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2013"): ?> selected <?php endif; ?> <?php endif; ?>>2013</option>
        <option value="2014" label="2014" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2014"): ?> selected <?php endif; ?> <?php endif; ?>>2014</option>
        <option value="2015" label="2015" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2015"): ?> selected <?php endif; ?> <?php endif; ?>>2015</option>
        <option value="2016" label="2016" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2016"): ?> selected <?php endif; ?> <?php endif; ?>>2016</option>
        <option value="2017" label="2017" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2017"): ?> selected <?php endif; ?> <?php endif; ?>>2017</option>
        <option value="2018" label="2018" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2018"): ?> selected <?php endif; ?> <?php endif; ?>>2018</option>
        <option value="2019" label="2019" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2019"): ?> selected <?php endif; ?> <?php endif; ?>>2019</option>
        <option value="2020" label="2020" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2020"): ?> selected <?php endif; ?> <?php endif; ?>>2020</option>
        <option value="2021" label="2021" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2021"): ?> selected <?php endif; ?> <?php endif; ?>>2021</option>
        <option value="2022" label="2022" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2022"): ?> selected <?php endif; ?> <?php endif; ?>>2022</option>
        <option value="2023" label="2023" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2023"): ?> selected <?php endif; ?> <?php endif; ?>>2023</option>
        <option value="2024" label="2024" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2024"): ?> selected <?php endif; ?> <?php endif; ?>>2024</option>
        <option value="2025" label="2025" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2025"): ?> selected <?php endif; ?> <?php endif; ?>>2025</option>
        <option value="2026" label="2026" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2026"): ?> selected <?php endif; ?> <?php endif; ?>>2026</option>
        <option value="2027" label="2027" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2027"): ?> selected <?php endif; ?> <?php endif; ?>>2027</option>
        <option value="2028" label="2028" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2028"): ?> selected <?php endif; ?> <?php endif; ?>>2028</option>
        <option value="2029" label="2029" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2029"): ?> selected <?php endif; ?> <?php endif; ?>>2029</option>
        <option value="2030" label="2030" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2030"): ?> selected <?php endif; ?> <?php endif; ?>>2030</option>
        <option value="2031" label="2031" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2031"): ?> selected <?php endif; ?> <?php endif; ?>>2031</option>
        <option value="2032" label="2032" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2032"): ?> selected <?php endif; ?> <?php endif; ?>>2032</option>
        <option value="2033" label="2033" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2033"): ?> selected <?php endif; ?> <?php endif; ?>>2033</option>
        <option value="2034" label="2034" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2034"): ?> selected <?php endif; ?> <?php endif; ?>>2034</option>
        <option value="2035" label="2035" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2035"): ?> selected <?php endif; ?> <?php endif; ?>>2035</option>
        <option value="2036" label="2036" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2036"): ?> selected <?php endif; ?> <?php endif; ?>>2036</option>
        <option value="2037" label="2037" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2037"): ?> selected <?php endif; ?> <?php endif; ?>>2037</option>
        <option value="2038" label="2038" <?php if(isset($document->id)): ?> <?php if($document->doc_year == "2038"): ?> selected <?php endif; ?> <?php endif; ?>>2038</option>
      </select>
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Название документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;"><input <?php if(isset($document->id)): ?> value="<?php echo e($document->doc_name); ?>" <?php endif; ?> id="doc_name" name="doc_name" type="text" maxlength="399">
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Файл документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;">
    <input name="doc_file" id="doc_file" type="file" style="cursor: pointer;">
    <?php if(isset($document->id)): ?>
    <br><br>
    <p style="color: #000000;">Предыдуший документ: <a href="/storage/<?php echo e($document->file_name_upload); ?>" target="_blank"><?php echo e($document->file_name); ?></a></p>
    <br><br>
    <input type="hidden" value="<?php echo e($document->id); ?>" name="document_id" id="document_id">
    <?php endif; ?>
    </td>
  </tr>

</table><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/tabs_data/documents_edit.blade.php ENDPATH**/ ?>