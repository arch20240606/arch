

<?php $__env->startSection('title'); ?>Детальная информация<?php $__env->stopSection(); ?>

<?php

use function PHPUnit\Framework\isNull;

if (app()->getLocale() == "ru") {
  $names = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $names = 'name_en';
} else {
  $names = 'name_kz';
}

if ( $is->wholeClass != "" ) {
  if ( $is->wholeClass == "LOW_PRIORITY_APPLICATION_SOFTWARE" ) {
    $class = "Класс 3 - Малоприоритетное ПО";
  } 
  elseif ($is->wholeClass == "MEDIUM_PRIORITY_APPLICATION_SOFTWARE") {
    $class = "Класс 2 - Среднеприоритетное ПО";
  } 
  elseif ($is->wholeClass == "HIGH_PRIORITY_APPLICATION_SOFTWARE'") {
    $class = "Класс 1 - Высокоприоритетное ПО";
  } 
  else {
    $class = "Класс не определен";
  }
} else {
  $class = "Класс не определен";
}


if ($is->bpStatus == "draft") {
  $status_is = "Черновик";
} elseif ($is->bpStatus == "archive") {
  $status_is = "Архивная";
} elseif ($is->bpStatus == "published") {
  $status_is = "Зарегистрирован";
} else {
  $status_is = "Нет данных";
}
?>

<?php $__env->startSection('header'); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="content">

  <div class="container">

    <div class="breadcrumbs">
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <a href="<?php echo e(route('accounting.information')); ?>"><?php echo e(trans('app.m_uchet')); ?></a>
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
        <h2 class="is-info__header-title"><?php echo e($is->name); ?></h2>
      </div>
      <div class="is-info__body">
        <div class="is-info__left is-info__col">
          <div class="is-info__row" style="background: #F3F8FA;">
            <p><b>Год заявки</b></p>
            <p>Система тестирования сотрудников органов прокуратуры</p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Процент наполнения</b></p>
            <p class="value value_green"><?php echo e($is->filledPercentage); ?>%</p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Текущий статус системы</b></p>
            <p><?php echo e($status_is); ?></p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Характеристика</b></p>
            <p><b>Оценка</b></p>
          </div>
          <div class="is-info__row">
            <p>Охват:</p>
            
            <?php
            if( $is->coverage != null && $is->coverage != 'null' ) {
              $coverage = json_decode($is->coverage);
              if ( json_decode($is->coverage)->{'textValue'} == "HIGH" ) {
                $val_coverage = "value_green";
                $str_coverage = "Высокий";
              } elseif ( json_decode($is->coverage)->{'textValue'} == "MEDIUM" ) {
                $val_coverage = "value_yellow";
                $str_coverage = "Высокий";
              } else {
                $val_coverage = "";
                $str_coverage = "Низкий";
              }
              $score_coverage = sprintf("%.2f", json_decode($is->coverage)->{'score'} );
            } else {
              $val_coverage = "";
              $str_coverage = "Нет данных";
              $score_coverage = "0.00";
            }
            ?>

            <p class="value <?php echo e($val_coverage); ?>"><?php echo e($score_coverage); ?></p>
            <p class="value <?php echo e($val_coverage); ?>"><?php echo e($str_coverage); ?></p>
          </div>
          <div class="is-info__row">
            <p>Сложность:</p>

            <?php
            if( $is->complexity != null && $is->complexity != 'null' ) {
              $complexity = json_decode($is->complexity);
              if ( json_decode($is->complexity)->{'textValue'} == "HIGH" ) {
                $val_complexity = "value_green";
                $str_complexity = "Высокий";
              } elseif ( json_decode($is->complexity)->{'textValue'} == "MEDIUM" ) {
                $val_complexity = "value_yellow";
                $str_complexity = "Высокий";
              } else {
                $val_complexity = "";
                $str_complexity = "Низкий";
              }
              $score_complexity = sprintf("%.2f", json_decode($is->complexity)->{'score'} );
            } else {
              $val_complexity = "";
              $str_complexity = "Нет данных";
              $score_complexity = "0.00";
            }
            ?>

            <p class="value <?php echo e($val_complexity); ?>"><?php echo e($score_complexity); ?></p>
            <p class="value <?php echo e($val_complexity); ?>"><?php echo e($str_complexity); ?></p>
          </div>
          <div class="is-info__row">
            <p>Критичность:</p>

            <?php
            if( $is->criticality != null && $is->criticality != 'null' ) {
              $criticality = json_decode($is->criticality);
              if ( json_decode($is->criticality)->{'textValue'} == "HIGH" ) {
                $val_criticality = "value_green";
                $str_criticality = "Высокий";
              } elseif ( json_decode($is->criticality)->{'textValue'} == "MEDIUM" ) {
                $val_criticality = "value_yellow";
                $str_criticality = "Средний";
              } else {
                $val_criticality = "";
                $str_criticality = "Низкий";
              }
              $score_criticality = sprintf("%.2f", json_decode($is->criticality)->{'score'} );
            } else {
              $val_criticality = "";
              $str_criticality = "Нет данных";
              $score_criticality = "0.00";
            }
            ?>

            <p class="value <?php echo e($val_criticality); ?>"><?php echo e($score_criticality); ?></p>
            <p class="value <?php echo e($val_criticality); ?>"><?php echo e($str_criticality); ?></p>
          </div>
          <div class="is-info__row">
            <p>Ценность:</p>

            <?php
            if( $is->valuation != null && $is->valuation != 'null' ) {
              $valuation = json_decode($is->valuation);
              if ( json_decode($is->valuation)->{'textValue'} == "HIGH" ) {
                $val_valuation = "value_green";
                $str_valuation = "Высокий";
              } elseif ( json_decode($is->valuation)->{'textValue'} == "MEDIUM" ) {
                $val_valuation = "value_yellow";
                $str_valuation = "Средний";
              } else {
                $val_valuation = "";
                $str_valuation = "Низкий";
              }
              $score_valuation = sprintf("%.2f", json_decode($is->valuation)->{'score'} );
            } else {
              $val_valuation = "";
              $str_valuation = "Нет данных";
              $score_valuation = "0.00";
            }
            ?>

            <p class="value <?php echo e($val_valuation); ?>"><?php echo e($score_valuation); ?></p>
            <p class="value <?php echo e($val_valuation); ?>"><?php echo e($str_valuation); ?></p>
          </div>
          <div class="is-info__row" style="background: #F3F8FA;">
            <p><b>Предварительный уровень класса</b></p>
            <span class="status status_edit"><?php echo e($class); ?></span>
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
              <span class="is-menu__item-count"><?php echo e($isapp->count()); ?></span>
            </li>
            <li class="is-menu__item" data-id="12">
              <span class="is-menu__item-progress" style="color: #39C07F;">3/3%</span>
              <span class="is-menu__item-title">Статусы жизненного цикла</span>
              <span class="is-menu__item-count"><?php echo e($isop->count()); ?></span>
            </li>
            <li class="is-menu__item" data-id="13">
              <span class="is-menu__item-progress" style="color: #39C07F;">2/2%</span>
              <span class="is-menu__item-title">Функциональные компоненты и функциональные требования</span>
              <span class="is-menu__item-count"><?php echo e($isfunc->count()); ?></span>
            </li>
            
            <li class="is-menu__item" data-id="16">
              <span class="is-menu__item-progress" style="color: #39C07F;">2/2%</span>
              <span class="is-menu__item-title">Технологии</span>
              <span class="is-menu__item-count"><?php echo e($istech->count()); ?></span>
            </li>
            <li class="is-menu__item" data-id="17">
              <span class="is-menu__item-progress" style="color: #39C07F;">2/2%</span>
              <span class="is-menu__item-title">Роли пользователей (уровень доступа)</span>
              <span class="is-menu__item-count"><?php echo e($isrole->count()); ?></span>
            </li>
            <li class="is-menu__item" data-id="18">
              <span class="is-menu__item-progress" style="color: #39C07F;">3/3%</span>
              <span class="is-menu__item-title">Техническая документация</span>
              <span class="is-menu__item-count"><?php echo e($isdocs->count()); ?></span>
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
                <p><b><?php echo e($is->regNumber); ?></b></p>
                <p>Регистрационный номер</p>
              </td>
            </tr>

            <tr>
              <td>Наименование</td>
              <td></td>
              <td>
                <p><b><?php echo e($is->name); ?></b></p>
                <p>Полное наименование приложения согласно документации</p>
              </td>
            </tr>

            <tr>
              <td>Владелец</td>
              <td></td>
              <td>
                <p><a href="#" target="_blank">
                <?php
                if ( isset( $is->getGO($is->ownerId)->name ) ) {
                  echo $is->getGO($is->ownerId)->name;
                } else {
                  echo "Нет информации";
                }
                ?>
                </a></p>
                <p>Владелец информационной системы</p>
              </td>
            </tr>

            <tr>
              <td>Статус <span style="color: #FF6A97">*</span></td>
              <td></td>
              <td>
                <p><b>
                  <?php if($is->status == "5cf4c17ce8912824cdc2cb70"): ?> 
                    Не функционирует
                  <?php elseif($is->status == "5cf4c175e8912824cdc2cb6f"): ?> 
                    Функционирует
                  <?php else: ?>
                    Нет данных
                  <?php endif; ?>
                </b></p>
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
                <p><b><?php echo e($is->AppShortName); ?></b></p>
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
              <td></td>
              <td>
                <p><b><?php echo e($is->AppDescription); ?></b></p>
              </td>
            </tr>

            <tr>
              <td>Основные задачи программного продукта</td>
              <td style="color: #39C07F;"></td>
              <td>
                <p><b>
                  <?php  
                  if( $is->AppTasks != null && $is->AppTasks != 'null' ) {
                    $obj = json_decode($is->AppTasks);
                    if (!is_null($obj)) {
                      $iterationNumber = 1;
                      foreach ($obj as $key => $values ) { //выводит из array все значения и свойства 1-го массива
                        echo $iterationNumber.". ".$values."<br><br>"; 
                        $iterationNumber++;
                      }
                    }
                  }
                  ?>
                  
                </b></p>
              </td>
            </tr>

            <tr>
              <td>Доступность в сети</td>
              <td></td>
              <td>
                <div class="is-checkboxes">
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" <?php if( $is->available_on_the_ETS_GO == "true" ): ?> checked <?php endif; ?>>
                    <span></span>
                    <p>Доступен в ЕТС ГО</p>
                  </label>
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" <?php if( $is->available_on_the_LAN == "true"): ?> checked <?php endif; ?>>
                    <span></span>
                    <p>Доступен в ЛВС</p>
                  </label>
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" <?php if( $is->Internet_access == "true"): ?> checked <?php endif; ?>>
                    <span></span>
                    <p>Доступен в Интернет</p>
                  </label>
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" <?php if( $is->is_transboundary == "true"): ?> checked <?php endif; ?>>
                    <span></span>
                    <p>Трансграничный</p>
                  </label>
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" <?php if( $is->available_on_the_IP_VPN == "true"): ?> checked <?php endif; ?>>
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
                <p><b><?php echo e(date( 'd.m.Y', strtotime($is->startVersionDateTime) )); ?></b></p>
                <p>Регистрационный номер</p>
              </td>
            </tr>

            <tr>
              <td>Дата окончания жизненного цикла</td>
              <td></td>
              <td>
                <p><b><?php echo e(date( 'd.m.Y', strtotime($is->endVersionDateTime) )); ?></b></p>
                <p>Дата окончания объекта</p>
              </td>
            </tr>

            <tr>
              <td>Номер версии</td>
              <td></td>
              <td>
                <p><b><?php echo e($is->version); ?></b></p>
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
                  <b><?php echo e($is->externalUsers); ?></b>
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
                  <b><?php echo e($is->internalUsers); ?></b>
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
                  <b><?php echo e($is->capacity); ?></b>
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


        <div class="is-menu-content" data-id="4">
          <h2 class="is-content-title">Сложность</h2>
          <table class="is-table">
            <tr>
              <td>Функциональный охват</td>
              <td></td>
              <td>
                <p>
                  <b><?php echo e($is->functionalCoverageComplexity); ?></b>
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
                  <b><?php echo e($is->useCasesVolume); ?></b>
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
                  <b><?php echo e($is->sensitivity); ?></b>
                  <span class="tooltip">
                    <span class="tooltip__content">
                      <span>
                        <b>1) Несущественный </b><br>
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
                  <b><?php echo e($is->useFrequency); ?></b>
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
                <p>Частота использования программного продукта</p>
              </td>
            </tr>
            <tr>
              <td>Значимость потоков данных</td>
              <td></td>
              <td>
                <p>
                  <b><?php echo e($is->dataStreamsSignificance); ?></b>
                  <span class="tooltip">
                    <span class="tooltip__content">
                      <span>
                        <b>1) Отсутствует</b><br>
                        Исходящие информационные потоки отсутствуют
                      </span>
                      <span>
                        <b>2) Крайне низкая</b><br>
                        Производительность и достоверность приложений-получателей данных будет несущественно снижена в случае отказа приложения, а качество поддержки процессов и функций не изменится
                      </span>
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
                  <b><?php echo e($is->informationSeverity); ?></b>
                  <span class="tooltip">
                    <span class="tooltip__content">
                      <span>
                        <b>1) Низкая</b><br>
                        Все электронные информационные ресурсы создаваемые, передаваемые или обрабатываемые в программном продукте относятся к 3 классу электронных информационных ресурсов и являются операционными или производными
                      </span>
                      <span>
                        <b>2) Умеренная</b><br>
                        Ни один создаваемый, передаваемый или обрабатываемый в программном продукте электронный информационный ресурс не относятся к 1 классу электронных информационных ресурсов, при этом хотя бы один создаваемый, передаваемый или обрабатываемый в программном продукте электронный информационный ресурс относится к 2 классу электронных информационных ресурсов и является вторичным
                      </span>
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
                  <b><?php echo e($is->automationDegree); ?></b>
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
                <p>Степень автоматизации</p>
              </td>
            </tr>
            <tr>
              <td>Функциональный охват</td>
              <td></td>
              <td>
                <p>
                  <b><?php echo e($is->functionalCoverageCriticality); ?></b>
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
                  <b><?php echo e($is->resultImportance); ?></b>
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


        <div class="is-menu-content" data-id="7" >
          <h2 class="is-content-title">Архитектура программного продукта </h2>
          <table class="is-table">
            <tr>
              <td>Тип архитектуры системы</td>
              <td></td>
              <td>
                <p>
                  <b><?php echo e($is->AppArchitecture); ?></b>
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
                <p>Тип архитектуры системы</p>
              </td>
            </tr>

            <tr>
              <td>Тип архитектуры хранения данных</td>
              <td></td>
              <td>
                <p>
                  <b><?php echo e($is->AppDataStorageArchitecture); ?></b>
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
                <p>Тип архитектуры хранения данных</p>
              </td>
            </tr>

            <tr>
              <td>Тип архитектуры клиента</td>
              <td></td>
              <td>
                <p><b><?php echo e($is->AppNodeArchitecture); ?></b></p>
                <p>Тип архитектуры клиента</p>
              </td>
            </tr>

            <tr>
              <td>Способ реализации</td>
              <td></td>
              <td>
                <p><b><?php echo e($is->AppType); ?></b></p>
                <p>Способ реализации</p>
              </td>
            </tr>

            
          </table>
        </div>


        <div class="is-menu-content" data-id="8" >
          <h2 class="is-content-title">ИКТ-проекты</h2>
          <table class="is-table">

            <tr>
              <td>Название</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>

            <tr>
              <td>Тип</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>

            <tr>
              <td>ИС</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>

            <tr>
              <td>Начало</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>

            <tr>
              <td>Конец</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>

            <tr>
              <td>Документы</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>
           
          </table>
        </div>


        <div class="is-menu-content" data-id="9" >
          <h2 class="is-content-title">Интеграции, направленные на предоставление данных</h2>
          <table class="is-table">
            <tr>
              <td>Цель</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>
            <tr>
              <td>Программный продукт, в который передаются данные</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>
            <tr>
              <td>Проксирующая ИС</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>
            <tr>
              <td>Статус </td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>
          </table>
        </div>

        <div class="is-menu-content" data-id="10" >
          <h2 class="is-content-title">Интеграции, направленные на получение данных</h2>
          <table class="is-table">
            <tr>
              <td>Цель</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>
            <tr>
              <td>Программный продукт, из которого берутся данные</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>
            <tr>
              <td>Проксирующая ИС</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>
            <tr>
              <td>Статус</td>
              <td></td>
              <td><p><b>Нет данных</b></p></td>
            </tr>
          </table>
        </div>

        <div class="is-menu-content" data-id="11" >
          <h2 class="is-content-title">Имущественные и авторские права</h2>
            <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
              <tr>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Роль заинтересованной стороны</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Организация</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Время начала взаимоотношений</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Время окончания взаимоотношений</th>
              </tr>
              <?php $__currentLoopData = $isapp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->name); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color:#1e32c6;"><a><?php echo e($item->gosorg ? $item->gosorg->name : ''); ?></a></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->RelationStartDate); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->endVersionDateTime); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>

        <div class="is-menu-content" data-id="12" >
          <h2 class="is-content-title">Статусы жизненного цикла</h2>
          <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
            <tr>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Тип</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Функциональный компонент</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Дата начала операции жизненного цикла</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Время окончания взаимоотношений</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Документы</th>
            </tr>
            <?php $__currentLoopData = $isop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->name); ?></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color:#1e32c6;"><a><?php echo e($item->funcComp ? $item->funcComp->name : ''); ?></a></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->LifecycleOperationStartDate); ?></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->LifecycleOperationEndDate); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>


        <div class="is-menu-content" data-id="13" >
          <h2 class="is-content-title">Функциональные компоненты и функциональные требования</h2>
          <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
            <tr>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Название</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Назначение</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Тип</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Функциональные возможности (название и тип)</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Дата добавления компонента</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Дата исключения компонента</th>
            </tr>
            <?php $__currentLoopData = $isfunc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->name); ?></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color:#1e32c6;"><a><?php echo e($item->ComponentPurpose); ?></a></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->ComponentType); ?></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color: red;"><?php echo e($item->functions); ?></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->ComponentStartDate); ?></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->ComponentEndDate); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>

        

        <div class="is-menu-content" data-id="16" >
          <h2 class="is-content-title">Технологии</h2>
          <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
            <tr>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Наименование технологии</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Функциональный компонент</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Дата начала</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Дата окончания</th>
            </tr>
            <?php $__currentLoopData = $istech; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->name); ?></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color:#1e32c6;"><a><?php echo e($item->funcComp ? $item->funcComp->name : ''); ?></a></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->TechnologyStartDate); ?></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->TechnologyEndDate); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>

        <div class="is-menu-content" data-id="17" >
          <h2 class="is-content-title">Роли пользователей (уровень доступа)</h2>
          <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
            <tr>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Функциональный компонент</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Наименование</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Контур пользователей</th>
            </tr>
            <?php $__currentLoopData = $isrole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color:#1e32c6;"><a><?php echo e($item->funcComp ? $item->funcComp->name : ''); ?></a></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->name); ?></td>
              <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->userCirc ? $item->userCirc->caption : ''); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>

        <div class="is-menu-content" data-id="18" >
          <h2 class="is-content-title">Техническая документация</h2>
          <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
            <tr>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Документы</th>
              <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Архив</th>
            </tr>
            <?php $__currentLoopData = $isdocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color:#1e32c6;">
                <a style="display: inline-block; padding: 8px; font-size: 10px; background-color:#2f43da; border-radius: 8px; color:#F3F8FA"><?php echo e($item->statusDoc); ?></a>
                <a style="padding: 8px; font-size: 10px; background-color:#01ae2c; border-radius: 8px; color:#F3F8FA"><?php echo e($item->language); ?></a>
                <a><?php echo e(str_replace($item->portalTypeDoc, '', $item->getFullCaption())); ?></a>
            </td>          
              
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
          <?php $__currentLoopData = $isappdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="table__name">
              
            </td>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e($item->DataEntityNameEng); ?></td>
            <td>
              <div class="copy-field">
                <div class="copy-field__content">
                  <?php echo e($item->dataOperations); ?>

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
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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










    <div class="is-tab-content" data-id="5">
        <h2 class="is-content-title">Затраты</h2>
        <div style="overflow-x: auto;">
              <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
                <tr>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Название</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Номер</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Поставщик</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Заказчик</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Мероприятия</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Планируемая сумма</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Кассовая сумма</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Код бюджетной программы</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Код бюджетной подпрограммы</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Код специфики бюджетной программы</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Дата заключения</th>
                  <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Информационные системы</th>
                </tr>
                <?php $__currentLoopData = $isCont; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->name); ?></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color:#1e32c6;"><a><?php echo e($item->AggreementNumber); ?></a></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->AggreementProvider); ?></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color: red;"><?php echo e($item->AggreementCustomer); ?></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->AggreementPlannedAmount); ?></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->AggreementActualAmount); ?></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->AggreementBudgetProgrammID); ?></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->AggreementBudgetProgrammSpecID); ?></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->AggreementDate); ?></td>
                  <td style="padding: 8px; text-align: left; border: 1px solid #f00707;">не забудь</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
          </div>
    </div>



    <div class="is-tab-content" data-id="3">
      <h2 class="is-content-title">Функциональные компоненты и функциональные требования</h2>
      <div style="overflow-x: auto;">
            <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
              <tr>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Роль</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Тип</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Архивации</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Резервное копирование</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Кол-во процессоров</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Кластеризация</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Система мониторинга</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Тип сервера</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Объем доступной ОЗУ, ГБ</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Предоставленный объем хранилища, ГБ</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Использованный объем представленного хранилища, ГБ</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Средняя нагрузка процессора, %</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Пиковая нагрузка процессора, %</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Средняя нагрузка ОЗУ, %</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Пиковая нагрузка ОЗУ, %</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Дата начала</th>
                <th style="background-color: #f2f2f2; color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Дата конца</th>
              </tr>
              <?php $__currentLoopData = $iscont; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->role); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd; color:#1e32c6;"><a><?php echo e($item->name); ?></a></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">
                  <?= ($item->archiving === 'true') ? 'Архивация присутствует' : 'Архивация отсутствует'; ?>
                </td>              
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">
                  <?= ($item->backup === 'true') ? 'Резервное копирование присутствует' : 'Резервное копирование отсутствует'; ?>
                </td> 
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->CPUQuant); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->failover); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">
                  <?= ($item->monitoring === 'true') ? 'Подключен к системе мониторинга' : 'Не подключен к системе мониторинга'; ?>
                </td> 
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Тип сервера</td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->RAMSize); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->storagesize); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->storageutilization); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->CPUAvgLoad); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->CPUMaxLoad); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->RAMAvgLoad); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->RAMMaxLoad); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->startDate); ?></td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;"><?php echo e($item->endDate); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
  </div>




  <div class="is-tab-content" data-id="8">
    <div>
          <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
            <tr>
                <div class="is-menu" style="width: 1200px; height: 1200px;">
                  <ul class="is-menu__list">
                    <li style="padding: 10px;" data-id="1">
                      <span style="font-weight: bold;">Классификатор заполненный ГО в ИС</span>
                      <h4 style="margin: 50px;">Данная форма предназначена для осуществления классификации информационной системы в соответствии с Правилами классификации объектов информатизации утвержденных Приказом и.о. Министра по инвестициям и развитию Республики Казахстан от 28 января 2016 года № 135.</h4>
                          <div class="is-info__center is-info__col" style="width:1000px ">
                              <div class="is-info__right-header" style="background-color: rgb(45, 45, 239)">Охват</div>
                              <div class="is-info__row" style="margin-top: 13px;">
                                <p><b>Внешние пользователи (0.5)</b></p>
                              </div>
                              <div class="is-info__row">
                                <p><b>Внутренние пользователи (1)</b></p>
                              </div>
                              <div class="is-info__row">
                                <p><b>Мощность (1)</b></p>
                              </div>
                          </div>

                          <div class="is-info__center is-info__col" style="width:1000px ">
                            <div class="is-info__right-header" style="background-color: rgb(45, 45, 239)">Сложность</div>
                            <div class="is-info__row" style="margin-top: 13px;">
                              <p><b>Тип архитектуры (0.5)</b></p>
                            </div>
                            <div class="is-info__row">
                              <p><b>Способ доступа (1)</b></p>
                            </div>
                        </div>

                        <div class="is-info__center is-info__col" style="width:1000px ">
                          <div class="is-info__right-header" style="background-color: rgb(45, 45, 239)">Функциональность (1.5)</div>
                          <div class="is-info__row" style="margin-top: 13px;">
                            <p><b>Функциональный охват (0.5)</b></p>
                          </div>
                          <div class="is-info__row">
                            <p><b>Объем ролей пользователей (0.5)
                            </b></p>
                          </div>
                          <div class="is-info__row">
                            <p><b>Объем вариантов использования (0.5)</b></p>
                          </div>
                          <div class="is-info__row">
                            <p><b>Способ реализации (1.5)</b></p>
                          </div>
                          <div class="is-info__row">
                            <p><b>Объем технологических платформ (0.5)</b></p>
                          </div>
                          <div class="is-info__row">
                            <p><b>Архитектура хранения данных (0.5)</b></p>
                          </div>
                      </div>
                    </li>
                  </ul>
                </div>

                <div class="is-menu" style="width: 1000px">
                  <ul class="is-menu__list">
                    <li class="is-menu__item" data-id="2">
                      <span class="is-menu__item-title">Классификатор заполненный ГО в калькуляторе</span>
                    </li>
                  </ul>
                </div>

                <div class="is-menu" style="width: 1000px">
                  <ul class="is-menu__list">
                    <li class="is-menu__item" data-id="3">
                      <span class="is-menu__item-title">Классификатор заполненный архитектором</span>
                    </li> 
                  </ul>
                </div>
            </tr>
            
        </table>
      </div>
</div>


























  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/accounting/is_info.blade.php ENDPATH**/ ?>