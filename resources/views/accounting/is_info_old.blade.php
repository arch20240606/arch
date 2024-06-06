@extends('layouts.app')

@section('title')Детальная информация@endsection

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
      <span>Информационные системы</span>
    </div>

    <h1 class="page-title">Информационная система</h1>



    <div class="buttons-wrapper">
      <a class="btn btn_white" onclick="history.back()">← Назад</a>
    </div>







    <div class="is-info">
      <div class="is-info__header">
        <div class="is-info__header-logo">
          <img src="/assets/images/coordinate-system 1.svg" alt="">
        </div>
        <h2 class="is-info__header-title">{{ $is->$names }}</h2>
      </div>
      <div class="is-info__body">
        <div class="is-info__left is-info__col">
          <div class="is-info__row" style="background: #F3F8FA;">
            <p><b>Год заявки</b></p>
            <p>Система тестирования сотрудников органов прокуратуры</p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Процент наполнения</b></p>
            <p class="value value_green">94.0%</p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Текущий статус системы</b></p>
            <p>Зарегистрирован</p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Характеристика</b></p>
            <p><b>Оценка</b></p>
          </div>
          <div class="is-info__row">
            <p>Охват:</p>
            <p class="value">0.92</p>
            <p class="value">Низкий</p>
          </div>
          <div class="is-info__row">
            <p>Сложность:</p>
            <p class="value value_green">3.40</p>
            <p class="value value_green">Высокий</p>
          </div>
          <div class="is-info__row">
            <p>Критичность:</p>
            <p class="value value_yellow">2.20</p>
            <p class="value value_yellow">Средний</p>
          </div>
          <div class="is-info__row">
            <p>Ценность:</p>
            <p class="value value_green">2.95</p>
            <p class="value value_green">Высокий</p>
          </div>
          <div class="is-info__row" style="background: #F3F8FA;">
            <p><b>Предварительный уровень класса</b></p>
            <span class="status status_edit">Класс 3 - Малоприоритетное ПО</span>
          </div>
        </div>
        <div class="is-info__right is-info__col">
          <div class="is-info__right-header">Ход заполнения основной информации</div>
          <div class="is-info__right-section">
            <div class="is-info__right-row">
              <div class="is-info__right-label">Поле:</div>
              <div class="is-info__right-value">Название</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Поле:</div>
              <div class="is-info__right-value">Назначение приложения</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Поле:</div>
              <div class="is-info__right-value">Основные задачи</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Поле:</div>
              <div class="is-info__right-value">Владелец объекта</div>
            </div>
          </div>
          <div class="is-info__right-section">
            <div class="is-info__right-row">
              <div class="is-info__right-label">Документ:</div>
              <div class="is-info__right-value">Техническое задание</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Документ:</div>
              <div class="is-info__right-value">Политика информационной безопасности</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Документ:</div>
              <div class="is-info__right-value">Программа и методика испытаний</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Документ:</div>
              <div class="is-info__right-value">Руководство администратора</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Документ:</div>
              <div class="is-info__right-value">Руководство пользователя</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Документ:</div>
              <div class="is-info__right-value">Описание системы</div>
            </div>
          </div>
          <div class="is-info__right-section">
            <div class="is-info__right-row">
              <div class="is-info__right-label">Статус ЖЦ:</div>
              <div class="is-info__right-value">Создание системы</div>
            </div>
          </div>
          <div class="is-info__right-section">
            <div class="is-info__right-row">
              <div class="is-info__right-label">Роль пользователя:</div>
              <div class="is-info__right-value">Разработчик</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Роль пользователя:</div>
              <div class="is-info__right-value">Вледелец</div>
            </div>
            <div class="is-info__right-row">
              <div class="is-info__right-label">Роль пользователя:</div>
              <div class="is-info__right-value">Сопровождающая организация</div>
            </div>
          </div>
          <div class="is-info__right-section">
            <div class="is-info__right-row">
              <div class="is-info__right-label">Все замечания устранены</div>
            </div>
          </div>
          <div class="is-info__right-section">
            <div class="is-info__right-row">
              <div class="is-info__right-label">Характеристики заполнены</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <nav class="is-tabs tabs">
      <a class="tabs__link tabs__link_active" href="#" data-id="1">
        <span class="tabs__num" style="background: #FF852C;">20/30%</span>
        Основная информация
      </a>
      <a class="tabs__link" href="#" data-id="2">
        <span class="tabs__num" style="background: #FF852C;">6/20%</span>
        Хранимые данные
      </a>
      <a class="tabs__link" href="#" data-id="3">
        <span class="tabs__num" style="background: #39C07F;">20/20%</span>
        Инсталляции
      </a>
      <a class="tabs__link" href="#" data-id="4">
        <span class="tabs__num" style="background: #39C07F;">20/20%</span>
        Внедрение
      </a>
      <a class="tabs__link" href="#" data-id="5">
        <span class="tabs__num" style="background: #B5BBCA; ">0/20%</span>
        Затраты
      </a>
      <a class="tabs__link" href="#" data-id="6">
        Автоматизация
      </a>
      <a class="tabs__link" href="#" data-id="7">
        Исходный код
      </a>
      <a class="tabs__link" href="#" data-id="8">
        Классификатор
      </a>
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
              <span class="is-menu__item-progress" style="color: #39C07F;">2/2%</span>
              <span class="is-menu__item-title">Характеристики</span>
              <ul class="is-menu__item-submenu">
                <li data-id="3">Охват</li>
                <li data-id="4">Сложность</li>
                <li data-id="5">Критичность</li>
                <li data-id="6">Значимость</li>
              </ul>
            </li>
            <li class="is-menu__item" data-id="7">
              <span class="is-menu__item-progress" style="color: #39C07F;">2/2%</span>
              <span class="is-menu__item-title">Архитектура программного продукта</span>
            </li>
            <li class="is-menu__item" data-id="8">
              <span class="is-menu__item-progress">0/2%</span>
              <span class="is-menu__item-title">ИКТ-проекты</span>
              <span class="is-menu__item-count">0</span>
            </li>
            <li class="is-menu__item" data-id="9">
              <span class="is-menu__item-progress">0/2%</span>
              <span class="is-menu__item-title">Интеграции, направленные на предоставление данных</span>
              <span class="is-menu__item-count">0</span>
            </li>
            <li class="is-menu__item" data-id="10">
              <span class="is-menu__item-progress">0/2%</span>
              <span class="is-menu__item-title">Интеграции, направленные на получение данных</span>
              <span class="is-menu__item-count">0</span>
            </li>
            <li class="is-menu__item" data-id="11">
              <span class="is-menu__item-progress" style="color: #39C07F;">2/2%</span>
              <span class="is-menu__item-title">Имущественные и авторские права</span>
              <span class="is-menu__item-count">3</span>
            </li>
            <li class="is-menu__item" data-id="12">
              <span class="is-menu__item-progress" style="color: #39C07F;">3/3%</span>
              <span class="is-menu__item-title">Статусы жизненного цикла</span>
              <span class="is-menu__item-count">3</span>
            </li>
            <li class="is-menu__item" data-id="13">
              <span class="is-menu__item-progress" style="color: #39C07F;">2/2%</span>
              <span class="is-menu__item-title">Функциональные компоненты и функциональные требования</span>
              <span class="is-menu__item-count">5</span>
            </li>
            <li class="is-menu__item" data-id="14">
              <span class="is-menu__item-progress" style="color: #39C07F;">3/3%</span>
              <span class="is-menu__item-title">Функциональные компоненты и функциональные требования</span>
              <span class="is-menu__item-count">5</span>
            </li>
            <li class="is-menu__item" data-id="15">
              <span class="is-menu__item-progress">0/2%</span>
              <span class="is-menu__item-title">Нефункциональные требования</span>
              <span class="is-menu__item-count">0</span>
            </li>
            <li class="is-menu__item" data-id="16">
              <span class="is-menu__item-progress" style="color: #39C07F;">2/2%</span>
              <span class="is-menu__item-title">Технологии</span>
              <span class="is-menu__item-count">1</span>
            </li>
            <li class="is-menu__item" data-id="17">
              <span class="is-menu__item-progress" style="color: #39C07F;">2/2%</span>
              <span class="is-menu__item-title">Роли пользователей (уровень доступа)</span>
              <span class="is-menu__item-count">5</span>
            </li>
            <li class="is-menu__item" data-id="18">
              <span class="is-menu__item-progress" style="color: #39C07F;">3/3%</span>
              <span class="is-menu__item-title">Техническая документация</span>
              <span class="is-menu__item-count">26</span>
            </li>
          </ul>
        </div>

        <div class="is-menu-content" data-id="1" style="display: block;">
          <h2 class="is-content-title">Детальная информация</h2>
          <table class="is-table">
            <tr>
              <td>Регистрационный номер</td>
              <td></td>
              <td>
                <p><b>KZ-П-12-0000118</b></p>
                <p>Регистрационный номер</p>
              </td>
            </tr>

            <tr>
              <td>Наименование</td>
              <td></td>
              <td>
                <p><b>{{ $is->$names }}</b></p>
                <p>Полное наименование приложения согласно документации</p>
              </td>
            </tr>

            <tr>
              <td>Владелец</td>
              <td></td>
              <td>
                <p><a href="#" target="_blank">{{ $is->government->$names }}</a></p>
                <p>Владелец информационной системы</p>
              </td>
            </tr>

            <tr>
              <td>Статус <span style="color: #FF6A97">*</span></td>
              <td></td>
              <td>
                <p><b>Нет значения</b></p>
                <p>Статус информационной системы</p>
              </td>
            </tr>

            <tr>
              <td>Статус подтверждения системы</td>
              <td></td>
              <td>
                <p><b>Подтверждено</b></p>
                <p>Статус подтверждения системы</p>
              </td>
            </tr>

            <tr>
              <td>Аббревиатура</td>
              <td></td>
              <td>
                <p><b>СТСОП</b></p>
                <p>Краткое наименование приложения согласно документации</p>
              </td>
            </tr>

            <tr>
              <td>Категория ПО</td>
              <td></td>
              <td>
                <p><b>Нет категории</b></p>
                <p>Категория программного обеспечения</p>
              </td>
            </tr>

            <tr>
              <td>Назначение</td>
              <td style="color: #39C07F;">2/2%</td>
              <td>
                <p><b>Пользователю предоставляется возможность в режиме реального времени отвечать на предоставленные вопросы. Результаты тестирования формируются автоматически. По окончании тестирования результат может быть распечатан</b></p>
                <p>Назначение приложения согласно документации</p>
              </td>
            </tr>

            <tr>
              <td>Основные задачи программного продукта</td>
              <td style="color: #39C07F;">2/2%</td>
              <td>
                <p><b>1. Автоматизация процессов проведения проверки знаний сотрудников органов прокуратуры РК. Тестирование должно проводиться в режиме онлайн. Вся регистрация и обработка данных процесса тестирования должна производиться на центральном сервере. В качестве тонкого клиента должен быть использован стандартный веб-брауз</b></p>
                <p>Основные задачи программного продукта</p>
              </td>
            </tr>

            <tr>
              <td>Доступность в сети</td>
              <td>2/2%</td>
              <td>
                <div class="is-checkboxes">
                  <label class="toggle-checkbox">
                    <input type="checkbox">
                    <span></span>
                    <p>Доступен в ЕТС ГО</p>
                  </label>
                  <label class="toggle-checkbox">
                    <input type="checkbox" checked>
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
              <td>Тип прикладного программного обеспечения</td>
              <td></td>
              <td>
                <p><b>Информационная система</b></p>
                <p>Тип прикладного программного обеспечения</p>
              </td>
            </tr>

            <tr>
              <td>Дата начала жизненного цикла</td>
              <td></td>
              <td>
                <p><b>Dec 31, 2099</b></p>
                <p>Регистрационный номер</p>
              </td>
            </tr>

            <tr>
              <td>Дата окончания жизненного цикла</td>
              <td></td>
              <td>
                <p><b>Dec 31, 2099</b></p>
                <p>Дата окончания объекта</p>
              </td>
            </tr>

            <tr>
              <td>Номер версии</td>
              <td></td>
              <td>
                <p><b>1</b></p>
                <p>Версия объекта</p>
              </td>
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
                  <b>Отсутствует</b>
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
                  <b>Ведомственный</b>
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
                  <b>Малая</b>
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
                  <a class="is-btn" href="#" download>
                    <img src="/assets/images/note-blank.svg" alt="">
                    Подтверждающие документы
                  </a>
                </p>
                <p>Пиковая нагрузка (параллельные пользователи и (или) транзакции в час на вычислительный узел системы)</p>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="is-tab-content" data-id="2">
      <h2 class="is-content-title">Хранимые данные</h2>

      <form class="filter filter_data form">
        <div class="filter__search form__field">
          <input type="search" name="budget-search" placeholder="Поиск">
        </div>
      </form>

      <table class="table table_is">
        <thead>
          <tr>
            <th>Информационный ресурс</th>
            <th>Наименование таблицы на рус. яз.</th>
            <th>Наименование таблицы на англ. яз.</th>
            <th>Операции над данными</th>
            <th>Объекты данных</th>
            <th>Тип таблицы</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="table__name">
              <a href="#">Информационная ресурс для ликвидации финансовых организаций</a>
            </td>
            <td>Тестовые результаты, пользователи</td>
            <td>gp_test_process, gp_test_process_qa, gp_users</td>
            <td>
              <div class="copy-field">
                <div class="copy-field__content">
                  Получение из внешнего источника без возможности изменения
                </div>
                <span class="copy-field__btn">
                  <svg>
                    <use xlink:href="/assets/images/sprite.svg#copy"></use>
                  </svg>
                </span>
              </div>
            </td>
            <td>-</td>
            <td style="color: #00317B;">Тип 1</td>
          </tr>
          <tr>
            <td class="table__name">
              <a href="#">Информационная ресурс для ликвидации финансовых организаций</a>
            </td>
            <td>Пользователи</td>
            <td>gp_users</td>
            <td>
              <div class="copy-field">
                <div class="copy-field__content">
                  Ручной ввод пользователем
                </div>
                <span class="copy-field__btn">
                  <svg>
                    <use xlink:href="/assets/images/sprite.svg#copy"></use>
                  </svg>
                </span>
              </div>
            </td>
            <td>-</td>
            <td style="color: #00317B;">Тип 1</td>
          </tr>
          <tr>
            <td class="table__name">
              <a href="#">Информационная ресурс для ликвидации финансовых организаций</a>
            </td>
            <td>Вопросы</td>
            <td>gp_guestions</td>
            <td>
              <div class="copy-field">
                <div class="copy-field__content">
                  Ручной ввод пользователем
                </div>
                <span class="copy-field__btn">
                  <svg>
                    <use xlink:href="/assets/images/sprite.svg#copy"></use>
                  </svg>
                </span>
              </div>
            </td>
            <td>-</td>
            <td style="color: #00317B;">Тип 1</td>
          </tr>
        </tbody>
      </table>
      <div class="pagination">
        <!--    <a class="pagination__item" href="#">←←</a>-->
        <!--    <a class="pagination__item" href="#">←</a>-->
        <a class="pagination__item" href="#">1</a>
        <a class="pagination__item" href="#">2</a>
        <a class="pagination__item" href="#">3</a>
        <a class="pagination__item" href="#">4</a>
        <a class="pagination__item" href="#">5</a>
        <a class="pagination__item" href="#">25</a>
        <a class="pagination__item" href="#">→</a>
        <a class="pagination__item" href="#">→→</a>
      </div>
    </div>





























  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')


@endsection