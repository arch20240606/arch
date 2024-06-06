@extends('layouts.app')

@section('title')Создание запроса на добавление - {{ trans('app.myreqests') }}@endsection

<?php
if (app()->getLocale() == "ru") {
  $names = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $names = 'name_en';
} else {
  $names = 'name_kz';
}
?>

@section('header')
@include ('layouts.header')
@endsection

@section('content')
<main class="content">

  <div class="container">

    <div class="breadcrumbs">
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <a href="{{ route('accounting.information') }}">{{ trans('app.m_uchet') }}</a>
      /
      <a href="{{ route('accounting.index') }}">Запросы на добавление</a>
      /
      <span>Создание запроса</span>
    </div>

    <h1 class="page-title">Создание запроса на добавление</h1>



    @include ('accounting.reqests.menu')




    @if(!empty($successMsg))
    <div class="success-info">{!! $successMsg !!}</div>
    @endif

    @if(!empty($errorMsg))
    <div class="info-box-error"><b>{{ trans('app.reg_error') }}:</b> {!! $errorMsg !!}</div>
    @endif




    <div class="is-info">

      <form class="form" method="POST" action="{{ route('accounting.store') }}">
        @csrf

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Формирование данных</span></h2>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th style="width: 20%; border: 0px;"></th>
              <th style="width: 80%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>Государственный орган</td>
              <td>
                <p>{{ Auth::user()->government->$names }}</p>
              </td>
            </tr>

            <tr>
              <td>Наименование на государственном языке</td>
              <td><input class="form__field" id="name_kz" name="name_kz" value="" type="text" minlength="5" maxlength="500" required tabindex="1" autofocus></td>
            </tr>

            <tr>
              <td>Наименование на русском языке</td>
              <td><input class="form__field" id="name_ru" name="name_ru" value="" type="text" minlength="5" maxlength="500" required tabindex="2"></td>
            </tr>

            <tr>
              <td>Наименование на английском языке</td>
              <td><input class="form__field" id="name_en" name="name_en" value="" type="text" minlength="5" maxlength="500" required tabindex="3"></td>
            </tr>

            <tr>
              <td>Аббревиатура</td>
              <td><input class="form__field" id="abbreviation" name="abbreviation" value="" type="text" minlength="1" maxlength="500" required tabindex="4"></td>
            </tr>

            <tr>
              <td>Название организации</td>
              <td><input class="form__field" id="cgo_mio" name="cgo_mio" value="" type="text" minlength="1" maxlength="500" required tabindex="5"></td>
            </tr>

            <tr>
              <td>БИН организации</td>
              <td><input class="form__field" id="bin" name="bin" value="" type="text" minlength="12" maxlength="12" required tabindex="6"></td>
            </tr>

            <tr>
              <td>Комментарий</td>
              <td>
                <textarea class="form__field" id="comment" name="comment" tabindex="7"></textarea>
              </td>
            </tr>



            <tr>
              <td>Тип</td>
              <td>
                <select id="type_select" name="type_select" required>
                  @foreach ($types as $type)
                  <option value="{{ $type->id }}">{{ $type->$names }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

          </tbody>
        </table>










        <div class="is-info__header" style="margin-top: 50px;">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Развернутая информация</span></h2>
        </div>



        <nav class="is-tabs tabs" style="margin: 0px;">
          <a class="tabs__link tabs__link_active" href="#" data-id="1">Основная информация</a>
          <a class="tabs__link" href="#" data-id="2">Хранимые данные</a>
          <a class="tabs__link" href="#" data-id="3">Инсталляции</a>
          <a class="tabs__link" href="#" data-id="4">Внедрение</a>
          <a class="tabs__link" href="#" data-id="5">Затраты</a>
          <a class="tabs__link" href="#" data-id="6">Автоматизация</a>
          <a class="tabs__link" href="#" data-id="7">Исходный код</a>
          <a class="tabs__link" href="#" data-id="8">Классификатор</a>
        </nav>




        <div class="is-tab-content" data-id="1" style="display: block;">
          <div class="is-menu-navigation">
            <div class="is-menu">
              <div class="is-menu__title">
                Содержание
                <span class="is-menu__toggle">
                  <svg>
                    <use xlink:href="/assets/images/sprite.svg#chevron-right-small"></use>
                  </svg>
                </span>
              </div>
              <ul class="is-menu__list">
                <li class="is-menu__item is-menu__item_active" data-id="1">
                  <span class="is-menu__item-title">Детальная информация</span>
                </li>
                <li class="is-menu__item is-menu__item_has-submenu" data-id="2">
                  <span class="is-menu__item-title">Характеристики</span>
                  <ul class="is-menu__item-submenu">
                    <li data-id="3">Охват</li>
                    <li data-id="4">Сложность</li>
                    <li data-id="5">Критичность</li>
                    <li data-id="6">Значимость</li>
                  </ul>
                </li>
                <li class="is-menu__item" data-id="7">
                  <span class="is-menu__item-title">Архитектура программного продукта</span>
                </li>
                <li class="is-menu__item" data-id="8">
                  <span class="is-menu__item-title">ИКТ-проекты</span>
                </li>
                <li class="is-menu__item" data-id="9">
                  <span class="is-menu__item-title">Интеграции, направленные на предоставление данных</span>
                </li>
                <li class="is-menu__item" data-id="10">
                  <span class="is-menu__item-title">Интеграции, направленные на получение данных</span>
                </li>
                <li class="is-menu__item" data-id="11">
                  <span class="is-menu__item-title">Имущественные и авторские права</span>
                </li>
                <li class="is-menu__item" data-id="12">
                  <span class="is-menu__item-title">Статусы жизненного цикла</span>
                </li>
                <li class="is-menu__item" data-id="13">
                  <span class="is-menu__item-title">Функциональные компоненты и функциональные требования</span>
                </li>
                <li class="is-menu__item" data-id="15">
                  <span class="is-menu__item-title">Нефункциональные требования</span>
                </li>
                <li class="is-menu__item" data-id="16">
                  <span class="is-menu__item-title">Технологии</span>
                </li>
                <li class="is-menu__item" data-id="17">
                  <span class="is-menu__item-title">Роли пользователей (уровень доступа)</span>
                </li>
                <li class="is-menu__item" data-id="18">
                  <span class="is-menu__item-title">Техническая документация</span>
                </li>
              </ul>
            </div>


            <div class="is-menu-content" data-id="1" style="display: block;">
              <h2 class="is-content-title">Детальная информация</h2>
              <table class="is-table">
                <tr>
                  <td style="vertical-align: middle;">Регистрационный номер</td>
                  <td></td>
                  <td><input class="form__field" id="cgo_mio" name="cgo_mio" value="" type="text" minlength="1" maxlength="500" placeholder="Например: KZ-П-12-0000118" required></td>
                </tr>


                <tr>
                  <td style="vertical-align: middle;">Статус <span style="color: #FF6A97">*</span></td>
                  <td></td>
                  <td><input class="form__field" id="cgo_mio" name="cgo_mio" value="" type="text" minlength="1" maxlength="500" required></td>
                </tr>

                <tr>
                  <td style="vertical-align: middle;">Статус подтверждения системы</td>
                  <td></td>
                  <td><input class="form__field" id="cgo_mio" name="cgo_mio" value="" type="text" minlength="1" maxlength="500" required></td>
                </tr>

                <tr>
                  <td style="vertical-align: middle;">Назначение</td>
                  <td></td>
                  <td><textarea class="form__field" id="comment" name="comment"></textarea></td>
                </tr>

                <tr>
                  <td style="vertical-align: middle;">Основные задачи программного продукта</td>
                  <td></td>
                  <td><textarea class="form__field" id="comment" name="comment"></textarea></td>
                </tr>

                <tr>
                  <td style="vertical-align: middle;">Доступность в сети</td>
                  <td></td>
                  <td>
                    <div class="is-checkboxes">
                      <label class="toggle-checkbox">
                        <input type="checkbox">
                        <span></span>
                        <p>Доступен в ЕТС ГО</p>
                      </label>
                      <label class="toggle-checkbox">
                        <input type="checkbox">
                        <span></span>
                        <p>Доступен в ЛВС</p>
                      </label>
                      <label class="toggle-checkbox">
                        <input type="checkbox">
                        <span></span>
                        <p>Доступен в Интернет</p>
                      </label>
                      <label class="toggle-checkbox">
                        <input type="checkbox">
                        <span></span>
                        <p>Трансграничный</p>
                      </label>
                      <label class="toggle-checkbox">
                        <input type="checkbox">
                        <span></span>
                        <p>Доступен через ip/vpn</p>
                      </label>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td style="vertical-align: middle;">Дата начала жизненного цикла</td>
                  <td></td>
                  <td><input class="form__field" id="date_start" name="date_start" type="date" required></td>
                </tr>

                <tr>
                  <td style="vertical-align: middle;">Дата окончания жизненного цикла</td>
                  <td></td>
                  <td><input class="form__field" id="date_end" name="date_end" type="date" required></td>
                </tr>

                <tr>
                  <td style="vertical-align: middle;">Номер версии</td>
                  <td></td>
                  <td><input class="form__field" id="cgo_mio" name="cgo_mio" value="" type="text" minlength="1" maxlength="500" required></td>
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="3">
              <h2 class="is-content-title">Охват</h2>
              <table class="is-table">
                <tr>
                  <td>Внешние пользователи</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Отсутствует</option>
                        <option>Слабо востребованный</option>
                        <option>Умеренно востребованный</option>
                        <option>Востребованный</option>
                        <option>Наиболее востребованный</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Отсутствует</b><br>
                            Не используется для предоставления информации и государственных услуг населению
                          </span>
                          <span>
                            <b>2) Слабо востребованный</b><br>
                            От 0,1 % до 1 % экономически активного населения, являются активными пользователями программного продукта
                          </span>
                          <span>
                            <b>3) Умеренно востребованный</b><br>
                            От 1 % до 5 % экономически активного населения являются активными пользователями программного продукта
                          </span>
                          <span>
                            <b>4) Востребованный</b><br>
                            От 5 % до 10 % экономически активного населения являются активными пользователями программного продукта
                          </span>
                          <span>
                            <b>5) Наиболее востребованный</b><br>
                            Более 10 % экономически активного населения являются активными пользователями программного продукта
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Доля активных пользователей программного продукта среди экономически активного населения</p>
                  </td>
                </tr>
                <tr>
                  <td>Внутренние пользователи</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Отсутствует</option>
                        <option>Объектный</option>
                        <option>Локальный</option>
                        <option>Ведомственный</option>
                        <option>Межведомственный</option>
                        <option>Республиканский</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Отсутствует</b><br>
                            Не используется для предоставления информации и государственных услуг населению
                          </span>
                          <span>
                            <b>2) Слабо востребованный</b><br>
                            От 0,1 % до 1 % экономически активного населения, являются активными пользователями программного продукта
                          </span>
                          <span>
                            <b>3) Умеренно востребованный</b><br>
                            От 1 % до 5 % экономически активного населения являются активными пользователями программного продукта
                          </span>
                          <span>
                            <b>4) Востребованный</b><br>
                            От 5 % до 10 % экономически активного населения являются активными пользователями программного продукта
                          </span>
                          <span>
                            <b>5) Наиболее востребованный</b><br>
                            Более 10 % экономически активного населения являются активными пользователями программного продукта
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Доля активных пользователей программного продукта среди сотрудников организаций отрасли и (или) государственных служащих</p>
                  </td>
                </tr>
                <tr>
                  <td>Мощность</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Малая</option>
                        <option>Средняя</option>
                        <option>Крупная</option>
                        <option>Сверхбольшая</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Отсутствует</b><br>
                            Не используется для предоставления информации и государственных услуг населению
                          </span>
                          <span>
                            <b>2) Слабо востребованный</b><br>
                            От 0,1 % до 1 % экономически активного населения, являются активными пользователями программного продукта
                          </span>
                          <span>
                            <b>3) Умеренно востребованный</b><br>
                            От 1 % до 5 % экономически активного населения являются активными пользователями программного продукта
                          </span>
                          <span>
                            <b>4) Востребованный</b><br>
                            От 5 % до 10 % экономически активного населения являются активными пользователями программного продукта
                          </span>
                          <span>
                            <b>5) Наиболее востребованный</b><br>
                            Более 10 % экономически активного населения являются активными пользователями программного продукта
                          </span>
                        </span>
                      </span>
                      {{-- <a style="padding: 10px; background-color: rgb(62, 62, 240); border-radius: 5px; cursor:pointer;">
                        <img src="/assets/images/note-blank.svg" alt="Подтверждающие документы">
                      </a> --}}
                      <!-- Модальное окно -->
                      <div id="myModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">

                        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%;">

                          <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold;">&times;</span>

                          <h2>Мои документы</h2>
                          
                          <ul id="documentList" style="list-style-type: none; padding: 0;"></ul>
                          
                          <button id="addDocumentBtn" style="padding: 10px; background-color: rgb(62, 62, 240); border-radius: 5px; cursor: pointer; color: white; border: none;">Добавить документ</button>

                        </div>

                      </div>
                    <!-- Кнопка для открытия модального окна -->
                    <a id="openModalBtn" style="padding: 10px; background-color: rgb(62, 62, 240); border-radius: 5px; cursor:pointer;">
                      <img src="/assets/images/note-blank.svg" alt="Подтверждающие документы">
                    </a>
                    </p>
                    <p>Пиковая нагрузка (параллельные пользователи и (или) транзакции в час на вычислительный узел системы)</p>
                  </td>
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="4">
              <h2 class="is-content-title">Сложность</h2>
              <table class="is-table">
                <tr>
                  <td>Функциональный охватНет информации </td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Малый</option>
                        <option>Средний</option>
                        <option>Высокий</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Малый</b><br>
                            Программное обеспечение обеспечивает автоматизацию обеспечивающих типовых функций организации
                          </span>
                          <span>
                            <b>2) Средний</b><br>
                            Программное обеспечение обеспечивает автоматизацию основной деятельности и отраслевых функций организации
                          </span>
                          <span>
                            <b>3) Высокий</b><br>
                            Программное обеспечение одновременно обеспечивает автоматизацию отраслевых и обеспечивающих типовых функций организации
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Охват функций организации автоматизируемых посредством программного продукта</p>
                  </td>
                </tr>
                <tr>
                  <td>Объем вариантов использования</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Стандартное</option>
                        <option>Повышенное</option>
                        <option>Высокое</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Стандартное</b><br>
                            Перечень уникальных вариантов использования (функций) составляет менее 20 и (или) перечень уникальных вариантов использования (функций) на роль пользователя не превышает 6
                          </span>
                          <span>
                            <b>2) Повышенное</b><br>
                            Перечень уникальных вариантов использования (функций) составляет от 20 до 40 и (или) перечень уникальных вариантов использования (функций) на роль пользователя составляет от 6 до 9
                          </span>
                          <span>
                            <b>3) Высокое</b><br>
                            Перечень уникальных вариантов использования (функций) превышает 40 и (или) перечень уникальных вариантов использования (функций) на роль пользователя составляет более 10
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Объем уникальных вариантов использования (функций)</p>
                  </td>
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="5">
              <h2 class="is-content-title">Критичность</h2>
              <table class="is-table">
                <tr>
                  <td>Чувствительность</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Несущественный</option>
                        <option>Чувствительный</option>
                        <option>Важный</option>
                        <option>Критический для деятельности</option>
                        <option>Критический для безопасности</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Несущественный</b><br>
                            Поддерживаемые процессы могут выполняться в альтернативном ручном режиме без использования программного продукта в течении длительного периода времени от 3 до 14 дней, без каких-либо социальных, политических и финансовых последствий, и не требуют дополнительных трудозатрат для переноса данных по мере восстановления работоспособности
                          </span>
                          <span>
                            <b>2) Чувствительный</b><br>
                            Поддерживаемые процессы могут выполняться в альтернативном ручном режиме без использования программного продукта от 1 до 3 дней без существенных социальных, политических и финансовых последствий, однако это приводит к спаду производительности и требует привлечения дополнительных человеческих ресурсов для выполнения процессов на требуемом уровне
                          </span>
                          <span>
                            <b>3) Важный</b><br>
                            Поддерживаемые процессы могут выполняться в альтернативном ручном режиме без использования программного продукта, но только в течение очень короткого периода времени от 3 до 24 часов, что может привести к незначительным социальным, политическим и финансовым последствиям, в том числе повлечь дополнительные административные и экономические издержки для граждан и коммерческих организаций в части оказания государственных услуг, а также не полноценное достижение стратегических целей и целевых индикаторов либо существенную отсрочку сроков их достижения
                          </span>
                          <span>
                            <b>4) Критический для деятельности</b><br>
                            Поддерживаемые процессы не могут выполняться в альтернативном ручном режиме, что приводит к существенным социальным, политическим и финансовым последствиям, нарушению работы объектов критической инфраструктуры и ключевых ресурсов, отсутствию возможности предоставления государственных услуг, и не возможности достижения стратегических целей и целевых индикаторов организации
                          </span>
                          <span>
                            <b>5) Критический для безопасности</b><br>
                            Поддерживаемые процессы не могут выполняться в альтернативном ручном режиме, что приводит к нарушению организационной, внутренней и национальной безопасности, и (или) ставит под угрозу имущество, здоровье и жизнь людей
                          </span>
                      </span>
                    </p>
                    <p>Возможность выполнения поддерживаемых процессов в альтернативном ручном режиме</p>
                  </td>
                </tr>
                <tr>
                  <td>Частота использования</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Крайне редко</option>
                        <option>Редко</option>
                        <option>Умеренно</option>
                        <option>Часто</option>
                        <option>Очень часто</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Крайне редко</b><br>
                            Программный продукт используется 1-2 раза в год, а 95 % времени эксплуатации программный продукт не имеет нагрузки либо несет минимальную нагрузку
                          </span>
                          <span>
                            <b>2) Редко</b><br>
                            Программное обеспечение используется ежемесячно либо еженедельно, а 80 % времени эксплуатации программное обеспечение не имеет нагрузки либо несет минимальную нагрузку
                          <span>
                            <b>3) Умеренно</b><br>
                            Программное обеспечение используется ежедневно, при этом разница между средней нагрузкой и пиковой нагрузкой составляет 1.000 раз
                          </span>
                          <span>
                            <b>4) Часто</b><br>
                            Программное обеспечение используется несколько раз в день, при этом разница между средней нагрузкой и пиковой нагрузкой составляет 100 раз
                          </span>
                          <span>
                            <b>5) Очень часто</b><br>
                            Программное обеспечение используется постоянно, при этом разница между средней и пиковой нагрузкой несущественна
                          </span>
                        </span>
                      </span>
                      <!-- Модальное окно -->
                      <div id="myModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">

                        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%;">

                          <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold;">&times;</span>

                          <h2>Мои документы</h2>
                          
                          <ul id="documentList" style="list-style-type: none; padding: 0;"></ul>
                          
                          <button id="addDocumentBtn" style="padding: 10px; background-color: rgb(62, 62, 240); border-radius: 5px; cursor: pointer; color: white; border: none;">Добавить документ</button>

                        </div>

                      </div>
                    <!-- Кнопка для открытия модального окна -->
                    <a id="openModalBtn" style="padding: 10px; background-color: rgb(62, 62, 240); border-radius: 5px; cursor:pointer;">
                      <img src="/assets/images/note-blank.svg" alt="Подтверждающие документы">
                    </a>
                    </p>
                    <p>Частота использования программного продукта</p>
                  </td>
                </tr>
                <tr>
                  <td>Значимость потоков данных</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Отсутствует</option>
                        <option>Крайне низкая</option>
                        <option>Низкая</option>
                        <option>Умеренная</option>
                        <option>Высокая</option>
                        <option>Повышенная</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Отсутствует</b><br>
                            Исходящие информационные потоки отсутствуют
                          </span>
                          <span>
                            <b>2) Крайне низкая</b><br>
                            Производительность и достоверность приложений-получателей данных будет несущественно снижена в случае отказа приложения, а качество поддержки процессов и функций не изменится
                          <span>
                            <b>3) Низкая</b><br>
                            Производительность и достоверность приложений-получателей данных будет несущественно снижена в случае отказа программного обеспечения, качество поддержки процессов и функций не изменится в случае отказа приложения, но работоспособность не будет нарушена
                          </span>
                          <span>
                            <b>4) Умеренная</b><br>
                            Качество поддержки процессов и функций будет существенно снижена в случае отказа программного обеспечения
                          </span>
                          <span>
                            <b>5) Высокая</b><br>
                            Приложения-получатели данных не будут иметь возможность обеспечить поддержку процессов и функций, и не смогут быть использованы в случае отказа программного обеспечения
                          </span>
                          <span>
                            <b>6) Повышенная</b><br>
                            Работоспособность приложений-получателей данных будет нарушена в случае отказа программного обеспечения
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Оценка влияния на другие приложения-получатели в случае отказа программного продукта</p>
                  </td>
                </tr>
                <tr>
                  <td>Критичность информации</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Низкая</option>
                        <option>Умеренная</option>
                        <option>Высокая</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Низкая</b><br>
                            Все электронные информационные ресурсы создаваемые, передаваемые или обрабатываемые в программном продукте относятся к 3 классу электронных информационных ресурсов и являются операционными или производными
                          </span>
                          <span>
                            <b>2) Умеренная</b><br>
                            Ни один создаваемый, передаваемый или обрабатываемый в программном продукте электронный информационный ресурс не относятся к 1 классу электронных информационных ресурсов, при этом хотя бы один создаваемый, передаваемый или обрабатываемый в программном продукте электронный информационный ресурс относится к 2 классу электронных информационных ресурсов и является вторичным
                          <span>
                            <b>3) Высокая</b><br>
                            По меньшей мере один, создаваемый, передаваемый или обрабатываемый в приложении электронный информационный ресурс относится к 1 классу электронных информационных ресурсов и является первичным и (или) эталонным
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Критичность информации согласно класса электронных информационных ресурсов создаваемых, передаваемых или обрабатываемых в программном продукте (для правильной оценки необходимо заполнить информационные ресурсы во вкладке Хранимые данные)</p>
                  </td>
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="6">
              <h2 class="is-content-title">Значимость</h2>
              <table class="is-table">
                <tr>
                  <td>Степень автоматизации</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Низкая</option>
                        <option>Частичная</option>
                        <option>Высокая</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Низкая</b><br>
                            Программный продукт, обеспечивает базовую частичную автоматизацию функций и процессов
                          </span>
                          <span>
                            <b>2) Частичная</b><br>
                            Программный продукт, обеспечивает профильную частичную автоматизацию функций и процессов
                          </span>
                          <span>
                            <b>3) Высокая</b><br>
                            Программный продукт, обеспечивает профильную полную автоматизацию функций и процессов
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Степень автоматизации, обеспечиваемый программным продуктом</p>
                  </td>
                </tr>
                <tr>
                  <td>Функциональный охват</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Локальное узкоспециализированное решение</option>
                        <option>Отраслевое решение</option>
                        <option>Межотраслевое решение</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Локальное узкоспециализированное решение</b><br>
                            Обеспечивает информационную поддержку и автоматизацию отдельных функций и процессов одного структурного подразделения либо отрасли
                          </span>
                          <span>
                            <b>2) Отраслевое решение</b><br>
                            Обеспечивает информационную поддержку и автоматизацию функций и процессов в рамках отдельной отрасли
                          </span>
                          <span>
                            <b>3) Межотраслевое решение</b><br>
                            Обеспечивает информационную поддержку и автоматизацию функций и процессов в рамках нескольких отраслей
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Охват информационной поддержки и автоматизации функций и процессов, обеспечиваемые программным продуктом</p>
                  </td>
                </tr>
                <tr>
                  <td>Важность результата</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Нет информации</option>
                        <option>Не явные</option>
                        <option>Общественные выгоды</option>
                        <option>Внутренние выгоды путем обеспечения сокращения затрат организации (правительства)</option>
                        <option>Внутренние выгоды путем получения дополнительного дохода для организации (правительства)</option>
                        <option>Внешние выгоды для клиентов/населения (нерезидентов) Республики Казахстан</option>
                        <option>Комплексные выгоды</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Не явные</b><br>
                            Явные выгоды от эксплуатации программного продукта отсутствуют либо не могут быть выявлены и объективно обоснованы
                          </span>
                          <span>
                            <b>2) Общественные выгоды</b><br>
                            Эксплуатация программного продукта, приводит к качественным результатам или косвенным выгодам, где не может быть определен явный экономический эффект и конкретные выгодополучатели, в частности повышение доступности социальных благ, повышение уровня здравоохранения или образования, повышение безопасности, снижение уровня преступности, повышение уровня жизни, повышение уровня экономического развития и улучшение инвестиционного климата, повышение репутации и имиджа Республики Казахстан, повышение прозрачности деятельности правительства (повышение открытости административных данных, облегчение участия граждан в формировании государственной политики и государственном управлении)
                          </span>
                          <span>
                            <b>3) Внутренние выгоды путем обеспечения сокращения затрат организации (правительства)</b><br>
                            Эксплуатация программного продукта, приводит к явным выгодам посредством повышения эффективности и результативности деятельности организации, в том числе эффективности использования бюджетных средств и активов (снижение и исключение затрат, уменьшение финансовых потерь), человеческих ресурсов (повышение производительности, высвобождение ресурсов, сокращение рабочих циклов), информационного взаимодействия (сокращение сроков передачи, получения и обработки информации, повышение качества принятия решений)
                          </span>
                          <span>
                            <b>4) Внутренние выгоды путем получения дополнительного дохода для организации (правительства)</b><br>
                            Эксплуатация программного продукта, приводит к явным выгодам посредством получение дополнительного дохода за счет приращения упущенной и неявной выгоды, повышение эффективности управления активами
                          </span>
                          <span>
                            <b>5) Внешние выгоды для клиентов/населения (нерезидентов) Республики Казахстан</b><br>
                            Эксплуатация программного продукта, приводит к явным выгодам посредством сокращения последствий от контрольной и надзорной деятельности (сокращение временных затрат, сокращение финансовых издержек), обеспечения эффективного предоставления услуг (новые формы предоставления услуг, снижения административных барьеров, повышение доступности и качества)
                          </span>
                          <span>
                            <b>6) Комплексные выгоды</b><br>
                            Эксплуатация программного продукта, приводит к получению выгод из нескольких групп, в том числе для нации, организации и населения (нерезидентов) Республики Казахстан
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Оценка явных и косвенных выгод от использования программного продукта</p>
                  </td>
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="7">
              <h2 class="is-content-title">Архитектура программного продукта</h2>
              <table class="is-table">
                <tr>
                  <td>Тип архитектуры системы</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Выберите значение</option>
                        <option>Монолитная</option>
                        <option>Компонентная/модульная</option>
                        <option>Разнородная</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Монолитная</b><br>
                            Архитектура программного обеспечения, в которой пользовательский интерфейс и доступ к данным объединены в одну программу на базе единой платформы, все ее компоненты являются составными частями одной программы и не могут работать обособленно, что приводит к повышенной зависимости компонентов, так как используются общие структуры данных и компоненты, которые становятся тесно интегрированы между собой
                          </span>
                          <span>
                            <b>2) Компонентная/модульная</b><br>
                            Архитектура программного обеспечения, состоящая из емких слабосвязанных повторно-используемых разработанных компонентов либо готовых компонентных блоков от разных поставщиков и производителей, характеризуемая универсальностью и слабой зависимостью компонент между собой
                          </span>
                          <span>
                            <b>3) Разнородная</b><br>
                            Архитектура программного обеспечения, при которой все ее компоненты обладают повышенной избыточностью, могут являться отдельными информационными системами, разработанными на базе различных стандартных решений и технологических платформ, имеющих различный функциональный характер и область применения (класс решаемых задач), а также могут успешно функционировать и развиваться независимо друг от друга
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Степень автоматизации, обеспечиваемый программным продуктом</p>
                  </td>
                </tr>
                <tr>
                  <td>Тип архитектуры хранения данных</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Выберите значение</option>
                        <option>Централизованная</option>
                        <option>Распределенная</option>
                        <option>Параллельная</option>
                        <option>Гибридная</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Централизованная</b><br>
                            Имеется единственная копия базы данных, расположенная на одном узле
                          </span>
                          <span>
                            <b>2) Распределенная</b><br>
                            Имеется единственная копия базы данных, непересекающиеся подмножества которых распределены по нескольким узлам
                          </span>
                          <span>
                            <b>3) Параллельная</b><br>
                            Имеется несколько копий подмножеств базы данных, где в каждом узле содержится произвольный фрагмент базы данных, либо где несколько копий базы данных в последствии реплицируются на одном узле
                          </span>
                          <span>
                            <b>4) Гибридная</b><br>
                            Является комбинацией нескольких схем хранения данных
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Стратегия хранения данных, определяющая место хранения, а также количество и роль копий базы данных программного продукта</p>
                  </td>
                </tr>
                <tr>
                  <td>Тип архитектуры клиента</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Выберите значение</option>
                        <option>Тонкий клиент</option>
                        <option>Толстый клиент</option>
                        <option>Гибридный клиент</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Тонкий клиент</b><br>
                            Клиент не устанавливается на рабочем месте пользователя и доступен через браузер
                          </span>
                          <span>
                            <b>2) Толстый клиент</b><br>
                            Клиент и пакет дополнительного программного обеспечения устанавливается на рабочем месте пользователя
                          </span>
                          <span>
                            <b>3) Гибридный клиент</b><br>
                            Система использует доступ к функциональным возможностям одних или разных подсистем параллельно через тонкий и толстый клиент
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Уровень функциональности и независимости клиента от центрального обрабатывающего узла программного продукта</p>
                  </td>
                </tr>
                <tr>
                  <td>Способ реализации</td>
                  <td></td>
                  <td>
                    <p>
                      <select style="width: 270px;">
                        <option>Выберите значение</option>
                        <option>Исходное готовое решение</option>
                        <option>Сконфигурированное готовое решение</option>
                        <option>Адаптированное (кастомизированное) готовое решение</option>
                        <option>Доработанное готовое решение</option>
                        <option>Гибридное решение</option>
                        <option>Заказная разработка</option>
                      </select>
                      <span class="tooltip">
                        <span class="tooltip__content">
                          <span>
                            <b>1) Исходное готовое решение</b><br>
                            Функциональность и логика более 60 % компонентов программного обеспечения организована на базе общедоступной (известной) методики и используется в исходном виде без дополнительной настройки
                          </span>
                          <span>
                            <b>2) Сконфигурированное готовое решение</b><br>
                            Функциональность и логика более 60 % компонентов программного обеспечения адаптирована под методику организации бизнес-процессов заказчика с использованием стандартных средств настройки программного обеспечения
                          </span>
                          <span>
                            <b>3) Адаптированное (кастомизированное) готовое решение</b><br>
                            Более 60 % компонентов программного обеспечения разработано на основе готового программного обеспечения, функциональность и логика функционирования которого изменена не существенно (менее чем на 20 % от исходного состояния) без использования стандартных средств настройки программного обеспечения
                          </span>
                          <span>
                            <b>4) Доработанное готовое решение</b><br>
                            Баммного обеспечения, функциональность и логика функционирования которого изменена не существенно (менее чем на 20 % от исходного состояния) без использования стандартных средств настройки программного обеспечения
                          </span>
                          <span>
                            <b>5) Гибридное решение</b><br>
                            Программного обеспечение, представляющее собой композитное решение, объединяющее в себе готовые и разработанные компоненты
                          </span>
                          <span>
                            <b>6) Заказная разработка</b><br>
                            Программный продукт, разработанный сторонним разработчиком, в соответствии со специфической методикой организации процессов заказчика либо поставщика, права на которое принадлежат разработчику
                          </span>
                        </span>
                      </span>
                    </p>
                    <p>Способ реализации программного продукта относительно использования функциональных возможностей исходного/готового программного обеспечения</p>
                  </td>
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="9" style="padding-top: 10px;">
              <table style="border-collapse: collapse; overflow: hidden;">
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Цель</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Программный продукт, из которого берутся данные</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Проксирующая ИС</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Статус</td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;"><textarea style="width: 100%; height: 100%; box-sizing: border-box;"></textarea></td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      @foreach($iss as $is)
                        <option>{{$is->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      @foreach($iss as $is)
                        <option>{{$is->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      <option>Планируемая</option>
                      <option>Текущая</option>
                      <option>Не функционирует</option>
                      <option>Не указано</option>
                    </select>
                  </td>
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="10" style="padding-top: 10px;">
              <table style="border-collapse: collapse; overflow: hidden;">
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Цель</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Программный продукт, из которого берутся данные</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Проксирующая ИС</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Статус</td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;"><textarea style="width: 100%; height: 100%; box-sizing: border-box;"></textarea></td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      @foreach($iss as $is)
                        <option>{{$is->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      @foreach($iss as $is)
                        <option>{{$is->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      <option>Планируемая</option>
                      <option>Текущая</option>
                      <option>Не функционирует</option>
                      <option>Не указано</option>
                    </select>
                  </td>
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="11">
              <h2>Необходимо добавить: Разработчик,Владелец,Сопровождающая организация</h2>
              <table style="border-collapse: collapse; overflow: hidden;">
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">Роль заинтересованной стороны</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">Организация</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">Время начала взаимоотношений</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">Время окончания взаимоотношений</td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      <option>Разработчик</option>
                      <option>Владелец</option>
                      <option>Сопровождающая организация</option>
                      <option>Спонсор (владелец бюджета)</option>
                      <option>Собственник</option>
                    </select></td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      @foreach($gos as $gosorg)
                        <option>{{$gosorg->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 12px; font-size: 14px;">
                    <input type="date" placeholder="Выберите дату" style="width: 100%; box-sizing: border-box; border: none; background-color: #f9f9f9;">
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 12px; font-size: 14px;">
                    <input type="date" placeholder="Выберите дату" style="width: 100%; box-sizing: border-box; border: none; background-color: #f9f9f9;">
                  </td>                  
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="12">
              <h2>Необходимо добавить: Создание системы</h2>
              <table style="border-collapse: collapse; overflow: hidden;">
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Тип</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Функциональный компонент</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Дата начала операции жизненного цикла</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Время окончания взаимоотношений</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Документы</td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;"><select style="width: 100%; box-sizing: border-box;">
                    <option>Создание системы</option>
                    <option>Пилот</option>
                    <option>Развитие системы</option>
                    <option>Сдача в опытную эксплуатацию</option>
                    <option>Аттестация</option>
                    <option>Испытания</option>
                    <option>Сдача в промышленную эксплуатацию</option>
                    <option>Планируемый</option>
                    <option>Экспертиза технической документации</option>
                    <option>Вывод из эксплуатации</option>
                    <option>Передача на баланс другой организации</option>
                    <option>Постановка на баланс</option>
                    <option>Снятие с баланса</option>
                  </select></td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      <option>Пусто</option>
                    </select>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 12px; font-size: 14px;">
                    <input type="date" placeholder="Выберите дату" style="width: 100%; box-sizing: border-box; border: none; background-color: #f9f9f9;">
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 12px; font-size: 14px;">
                    <input type="date" placeholder="Выберите дату" style="width: 100%; box-sizing: border-box; border: none; background-color: #f9f9f9;">
                  </td>                  
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="13">
              <h2>Необходимо добавить: Создание системы</h2>
              <table style="border-collapse: collapse; overflow: hidden;">
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Название</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Назначение</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Тип</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Функциональные возможности (название и тип)</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Дата добавления компонента</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Дата исключения компонента</td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                      <textarea></textarea>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <textarea></textarea>
                </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      <option>Пусто</option>
                      <option>Пусто</option>
                    </select>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <textarea></textarea>
                </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 12px; font-size: 14px;">
                    <input type="date" placeholder="Выберите дату" style="width: 100%; box-sizing: border-box; border: none; background-color: #f9f9f9;">
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 12px; font-size: 14px;">
                    <input type="date" placeholder="Выберите дату" style="width: 100%; box-sizing: border-box; border: none; background-color: #f9f9f9;">
                  </td>                  
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="16">
              <table style="border-collapse: collapse; overflow: hidden;">
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Наименование</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Функциональные компонент</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Дата добавления компонента</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Дата исключения компонента</td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <textarea></textarea>
                </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      @foreach($funccomp as $funccomps)
                      <option>{{$funccomps->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 12px; font-size: 14px;">
                    <input type="date" placeholder="Выберите дату" style="width: 100%; box-sizing: border-box; border: none; background-color: #f9f9f9;">
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 12px; font-size: 14px;">
                    <input type="date" placeholder="Выберите дату" style="width: 100%; box-sizing: border-box; border: none; background-color: #f9f9f9;">
                  </td>                  
                </tr>
              </table>
            </div>

            <div class="is-menu-content" data-id="17">
              <table style="border-collapse: collapse; overflow: hidden;">
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Функциональные компонент</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Наименование</td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px; border-radius: 10px;">Контур пользователей</td>
                </tr>
                <tr>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <select style="width: 100%; box-sizing: border-box;">
                      @foreach($funccomp as $funccomps)
                      <option>{{$funccomps->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                    <textarea></textarea>
                </td>  
                <td style="border: 1px solid rgb(72, 69, 69); padding: 8px;">
                  <select style="width: 100%; box-sizing: border-box;">
                    @foreach($funccomp as $funccomps)
                    <option>{{$funccomps->name}}</option>
                    @endforeach
                  </select>
                </td>               
                </tr>
              </table>
            </div>

          </div>
        </div>

        
        


        













        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← {{ trans('app.but_cancel') }}</a>
          <button class="btn" type="submit" id="save_draft" name="save_draft" style="font-size: 14px; background: #00317B;">{{ trans('app.but_save') }}</button>
          <button class="btn" type="submit" id="save_send" name="save_send" style="font-size: 14px; background: #0178BC;">{{ trans('app.but_send') }}</button>
        </div>

      </form>

    </div>




  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

@endsection

@section('scripts')
<script>
  // Получаем ссылки на элементы DOM
  var modal = document.getElementById("myModal");
  var openModalBtn = document.getElementById("openModalBtn");
  var addDocumentBtn = document.getElementById("addDocumentBtn");
  var documentList = document.getElementById("documentList");
  
  // Обработчик события для открытия модального окна
  openModalBtn.onclick = function() {
    modal.style.display = "block";
  }
  
  // Обработчик события для закрытия модального окна
  document.getElementsByClassName("close")[0].onclick = function() {
    modal.style.display = "none";
  }
  
  // Обработчик события для добавления документа
  addDocumentBtn.onclick = function() {
    var fileInput = document.createElement("input");
    fileInput.type = "file";
  
    // Обработчик события выбора файла
    fileInput.onchange = function(event) {
      var file = event.target.files[0];
      var listItem = document.createElement("li");
      listItem.innerHTML = `
        <span>${file.name}</span>
        <span class="saveIcon">💾</span>
        <span class="downloadIcon">⬇️</span>
        <span class="deleteIcon">❌</span>
      `;
      documentList.appendChild(listItem);
  
      // Обработчик события для скачивания документа
      listItem.querySelector(".downloadIcon").onclick = function() {
        var url = URL.createObjectURL(file);
        var a = document.createElement("a");
        a.href = url;
        a.download = file.name;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
      }
  
      // Обработчик события для удаления документа
      listItem.querySelector(".deleteIcon").onclick = function() {
        listItem.remove();
      }
    };
  
    fileInput.click();
  }
  </script>
  
@endsection