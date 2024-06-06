<div class="is-menu-navigation" style="grid-template-columns: auto;">

  <div class="is-menu-content" data-id="1" style="display: block;">
    <table class="is-table">

      <tr>
        <td style="width: 30%;">1.1. Полное наименование системы</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="width: 70%; padding: 12px 20px 12px 20px;"><input type="text" value="<?php echo e($type_project_name); ?> «<?php echo e($expertise->it_project->$names); ?>»" minlength="2" maxlength="255" required autofocus>
        </td>
      </tr>

      <tr>
        <td>Условное обозначение системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->abbr); ?>" id="abbr" name="abbr" type="text" minlength="2" maxlength="255" autofocus>
        </td>
      </tr>

      <tr>
        <td>1.2. Шифр темы или шифр (номер) договора</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->num_poject); ?>" id="num_poject" name="num_poject" type="text" minlength="2" maxlength="255" autofocus>
        </td>
      </tr>

      <tr>
        <td>1.3. Наименование предприятий (объединений) разработчика системы</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->company); ?>" id="company" name="company" type="text" minlength="2" maxlength="255" required autofocus>
        </td>
      </tr>

      <tr>
        <td>Реквизиты разработчика системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->address); ?>" id="address" name="address" type="text" minlength="2" maxlength="255" autofocus>
        </td>
      </tr>

      <tr>
        <td>Наименование предприятий (объединений) заказчика (пользователя) системы</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->сustomer); ?>" id="сustomer" name="сustomer" type="text" minlength="2" maxlength="255" required autofocus>
        </td>
      </tr>

      <tr>
        <td>Реквизиты заказчика (пользователя) системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->address_customer); ?>" id="address_customer" name="address_customer" type="text" minlength="2" maxlength="255" autofocus>
        </td>
      </tr>

      <tr>
        <td>1.4. Перечень документов, на основании которых создана система</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;">
          <input value="<?php echo e($expertise->list_docs); ?>" id="list_docs" name="list_docs" type="text" minlength="2" maxlength="255" required autofocus>
          <p>Может быть название ИП, ТЭО, ФЭО или международный проект</p>
        </td>
      </tr>

      <tr>
        <td>1.5. Плановые сроки начала и окончания работы по созданию (развитию) системы</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;">
          <input value="<?php echo e($expertise->dates_start_end); ?>" id="dates_start_end" name="dates_start_end" type="text" minlength="2" maxlength="255" required autofocus>
          <p>В данном поле необходимо указать Плановые сроки начала и окончания работы по созданию (развитию) системы "Дата начала работ - Дата завершения работ", например: "01.01.2021-31.12.2022"</p>
        </td>
      </tr>

      <tr>
        <td>1.6. Сведения об источниках и порядке финансирования работ</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;">
          <input value="<?php echo e($expertise->finanсes); ?>" id="finanсes" name="finanсes" type="text" minlength="2" maxlength="255" required autofocus>
          <p>В данном поле необходимо указать Сведения об источниках и порядке финансирования работ в формате "Источник финансирования – республиканский бюджет; Порядок финансирования – согласно договорным условиям"</p>
        </td>
      </tr>

      <tr>
        <td>2.1. Назначение системы</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->is_appointment); ?>" id="is_appointment" name="is_appointment" type="text" minlength="2" maxlength="255" required autofocus>
        </td>
      </tr>

      <tr>
        <td>2.2. Цели создания системы</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->is_target); ?>" id="is_target" name="is_target" type="text" minlength="2" maxlength="255" required autofocus>
        </td>
      </tr>

      <tr>
        <td>Тип НТД</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->type_ntd); ?>" id="type_ntd" name="type_ntd" type="text" minlength="2" maxlength="255" required autofocus>
        </td>
      </tr>

      <tr>
        <td>Основание разработки</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px;">
          <input value="<?php echo e($expertise->basis_development); ?>" id="basis_development" name="basis_development" type="text" minlength="2" maxlength="255" autofocus>
          <p>Может быть название Договора</p>
        </td>
      </tr>

      <tr>
        <td>Ссылка на документ по основанию разработки</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px;">
          <input value="<?php echo e($expertise->links); ?>" id="links" name="links" type="text" minlength="2" maxlength="255" autofocus>
          <p>Ссылка на ТЭО или ИП на архпортале</p>
        </td>
      </tr>

      <tr>
        <td>Год реализации</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->build_year); ?>" id="build_year" name="build_year" type="text" minlength="4" maxlength="4" required autofocus>
        </td>
      </tr>

      <tr>
        <td>Проект из госпрограммы</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;">
          <input value="<?php echo e($expertise->gosproject); ?>" id="gosproject" name="gosproject" type="text" minlength="2" maxlength="255" required autofocus>
          <p>Может принимать любые значения – к примеру, ГП ЦК, ГП Денсаулык и т.д.</p>
        </td>
      </tr>

      <tr>
        <td>Состав ИС</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;">
          <input value="<?php echo e($expertise->sostav); ?>" id="sostav" name="sostav" type="text" minlength="2" maxlength="255" required autofocus>
          <p>Перечисление модулей или подсистем ИС</p>
        </td>
      </tr>

      <tr>
        <td>Функции модуля или подсистемы</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->modules); ?>" id="modules" name="modules" type="text" minlength="2" maxlength="255" required autofocus>
        </td>
      </tr>

      <tr>
        <td>Используемое ПО</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;"><input value="<?php echo e($expertise->po); ?>" id="po" name="po" type="text" minlength="2" maxlength="255" required autofocus>
        </td>
      </tr>

      <tr>
        <td>Наличие хостинга</td>
        <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <td style="padding: 12px 20px 12px 20px;">
          <select id="hosting" name="hosting" required>
            <option value="server" <?php if($expertise->hosting == "server"): ?> selected <?php endif; ?>>Приобретение серверного оборудования</option>
            <option value="nit" <?php if($expertise->hosting == "nit"): ?> selected <?php endif; ?>>АО НИТ</option>
            <option value="kt" <?php if($expertise->hosting == "kt"): ?> selected <?php endif; ?>>АО Казахтелеком</option>
            <option value="other" <?php if($expertise->hosting == "other"): ?> selected <?php endif; ?>>Другой хостинг</option>
          </select>
        </td>
      </tr>


    </table>
  </div>


</div><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/expertise/tabs_data/passport_edit.blade.php ENDPATH**/ ?>