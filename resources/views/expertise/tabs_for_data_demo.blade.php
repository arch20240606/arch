<nav class="is-tabs tabs">
  <a style="width: 25%; font-size: 16px;" class="tabs__link tabs__link_active" href="#" data-id="1">Паспорт</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="2">Функциональная часть</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="3">Документы</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="4">Комментарии/Заключение</a>
</nav>




<div class="is-tab-content" data-id="1" style="display: block;">
  <div class="is-menu-navigation" style="grid-template-columns: auto;">

    <div class="is-menu-content" data-id="1" style="display: block;">
      <table class="is-table">

        <tr>
          <td style="width: 30%;">1.1. Полное наименование системы</td>
          <td></td>
          <td style="width: 70%; padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $type_project_name }}</span> «{{ $expertise->it_project->$names }}»
          </td>
        </tr>

        <tr>
          <td>Условное обозначение системы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->abbr }}
          </td>
        </tr>

        <tr>
          <td>1.2. Шифр темы или шифр (номер) договора</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->num_poject }}
          </td>
        </tr>

        <tr>
          <td>1.3. Наименование предприятий (объединений) разработчика системы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->company }}
          </td>
        </tr>

        <tr>
          <td>Реквизиты разработчика системы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->address }}
          </td>
        </tr>

        <tr>
          <td>Наименование предприятий (объединений) заказчика (пользователя) системы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->сustomer }}
          </td>
        </tr>

        <tr>
          <td>Реквизиты заказчика (пользователя) системы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->address_customer }}
          </td>
        </tr>
       
        <tr>
          <td>1.4. Перечень документов, на основании которых создана система</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->list_docs }}
          </td>
        </tr>

        <tr>
          <td>1.5. Плановые сроки начала и окончания работы по созданию (развитию) системы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->dates_start_end }}
          </td>
        </tr>

        <tr>
          <td>1.6. Сведения об источниках и порядке финансирования работ</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->finanсes }}
          </td>
        </tr>

        <tr>
          <td>2.1. Назначение системы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->is_appointment }}
          </td>
        </tr>

        <tr>
          <td>2.2. Цели создания системы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->is_target }}
          </td>
        </tr>

        <tr>
          <td>Тип НТД</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->type_ntd }}
          </td>
        </tr>

        <tr>
          <td>Основание разработки</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->basis_development }}
          </td>
        </tr>

        <tr>
          <td>Ссылка на документ по основанию разработки</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->links }}
          </td>
        </tr>

        <tr>
          <td>Год реализации</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->build_year }}
          </td>
        </tr>

        <tr>
          <td>Проект из госпрограммы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->gosproject }}
          </td>
        </tr>

        <tr>
          <td>Состав ИС</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->sostav }}
          </td>
        </tr>

        <tr>
          <td>Функции модуля или подсистемы</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->modules }}
          </td>
        </tr>

        <tr>
          <td>Используемое ПО</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->po }}
          </td>
        </tr>

        <tr>
          <td>Наличие хостинга</td>
          <td></td>
          <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
            {{ $expertise->hosting }}
          </td>
        </tr>
      </table>

      <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
        <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← Вернуться назад</a>
        <a class="btn" href="/files/passport_000001_1.pdf" target="_blank" style="font-size: 14px; background: #00317B;">Экспорт паспорта в PDF</a>

        <form class="form" method="POST" action="{{ route('expertise.signing.export') }}">
          @csrf
          <a class="btn" href="#" onclick="exportPassport({{ $expertise->id }})" style="font-size: 14px; background: #00317B;">Генерация PDF</a>
        </form>

      </div>

    </div>


  </div>
</div>













<div class="is-tab-content" data-id="2">

  <h2 class="is-content-title" style="padding-left: 15px; font-size: 15px; color: #0075ff;">Информационные системы</h2>


  <div class="is-menu-content" data-id="1" style="display: block;">
    <table class="is-table">

      <tr>
        <td style="width: 30%;">Выбранные системы для изменения</td>
        <td></td>
        <td style="width: 70%; padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          ИС Архитектурный портал электронного правительства
        </td>
      </tr>

      <tr>
        <td style="width: 30%;">Выбранные системы для вывода из эксплуатации</td>
        <td></td>
        <td style="width: 70%; padding: 12px 20px 12px 20px;">

        </td>
      </tr>


    </table>
  </div>


  <h2 class="is-content-title" style="padding-left: 15px; font-size: 15px; color: #0075ff;">Интеграции</h2>

  <div class="is-menu-content" data-id="1" style="display: block;">
    <table class="is-table">
      <tr>
        <td style="width: 30%;">Планируемые интеграции для создания</td>
        <td></td>
        <td style="width: 70%; padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
          ИC ГБД ФЛ, ИС НОБД, ИС БМГ
        </td>
      </tr>
    </table>
  </div>


</div>


























<div class="is-tab-content" data-id="3">
  <div class="info-box-error" style="margin-bottom: 5px;">Отсутствуют документы, приложенные пользователем</div>
</div>




<div class="is-tab-content" data-id="4">
  
  <div class="info-box-error" id="error_sign_box" style="display: none; margin-bottom: 5px;"></div>
  <div class="success-info" id="success_sign_box" style="display: none; margin-bottom: 5px;"></div>

  <h2 class="is-content-title">Создание комментария либо заключения</h2>
  <form class="form" method="POST" action="{{ route('expertise.store') }}">
    @csrf

    <textarea class="form__field" style="min-height: 300px;" id="comment" name="comment">{{ $expertise->comment_discart }} {{ $expertise->comment_accept }}</textarea>

    <div class="buttons-wrapper" style="padding-top: 25px;">
      <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← Вернуться назад</a>
      <a class="btn" href="#" onclick="acceptPassport()" style="font-size: 14px; background: #00317B;">Подписать ЭЦП</a>
      <button type="submit" name="discart" id="discart" class="btn" style="font-size: 14px; background: #b90404;">Отклонить</a>
    </div>
  </form>

</div>
