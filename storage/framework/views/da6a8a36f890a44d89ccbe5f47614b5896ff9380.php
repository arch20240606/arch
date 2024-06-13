<div class="is-menu-navigation" style="grid-template-columns: auto;">



  <div class="is-menu-content" data-id="1" style="display: block;">
    <table class="is-table">
      <tr>
        <td style="width: 30%;">1.1. Полное наименование системы</td>
        <td></td>
        <td style="width: 70%; padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($type_project_name); ?></span> «<?php echo e($expertise->it_project->$names); ?>»
        </td>
      </tr>
      
      <tr>
        <td>Условное обозначение системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->abbr); ?>

        </td>
      </tr>

      <tr>
        <td>1.2. Шифр темы или шифр (номер) договора</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->num_poject); ?>

        </td>
      </tr>

      <tr>
        <td>1.3. Наименование предприятий (объединений) разработчика системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->company); ?>

        </td>
      </tr>

      <tr>
        <td>Реквизиты разработчика системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->address); ?>

        </td>
      </tr>

      <tr>
        <td>Наименование предприятий (объединений) заказчика (пользователя) системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->сustomer); ?>

        </td>
      </tr>

      <tr>
        <td>Реквизиты заказчика (пользователя) системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->address_customer); ?>

        </td>
      </tr>

      <tr>
        <td>1.4. Перечень документов, на основании которых создана система</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->list_docs); ?>

        </td>
      </tr>

      <tr>
        <td>1.5. Плановые сроки начала и окончания работы по созданию (развитию) системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->dates_start_end); ?>

        </td>
      </tr>

      <tr>
        <td>1.6. Сведения об источниках и порядке финансирования работ</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->finanсes); ?>

        </td>
      </tr>

      <tr>
        <td>2.1. Назначение системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->is_appointment); ?>

        </td>
      </tr>

      <tr>
        <td>2.2. Цели создания системы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->is_target); ?>

        </td>
      </tr>

      <tr>
        <td>Тип НТД</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->type_ntd); ?>

        </td>
      </tr>

      <tr>
        <td>Основание разработки</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->basis_development); ?>

        </td>
      </tr>

      <tr>
        <td>Ссылка на документ по основанию разработки</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->links); ?>

        </td>
      </tr>

      <tr>
        <td>Год реализации</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->build_year); ?>

        </td>
      </tr>

      <tr>
        <td>Проект из госпрограммы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->gosproject); ?>

        </td>
      </tr>

      <tr>
        <td>Состав ИС</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->sostav); ?>

        </td>
      </tr>

      <tr>
        <td>Функции модуля или подсистемы</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->modules); ?>

        </td>
      </tr>

      <tr>
        <td>Используемое ПО</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->po); ?>

        </td>
      </tr>

      <tr>
        <td>Наличие хостинга</td>
        <td></td>
        <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          <?php echo e($version->hosting); ?>

        </td>
      </tr>
    </table>
  </div> 
  
  </div>
<?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/info/passport.blade.php ENDPATH**/ ?>