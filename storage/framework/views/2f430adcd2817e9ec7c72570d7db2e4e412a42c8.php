

<?php $__env->startSection('title'); ?>Создание запроса на добавление - <?php echo e(trans('app.myreqests')); ?><?php $__env->stopSection(); ?>

<?php
if (app()->getLocale() == "ru") {
  $names = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $names = 'name_en';
} else {
  $names = 'name_kz';
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
      <a href="<?php echo e(route('accounting.index')); ?>">Запросы на добавление</a>
      /
      <span>Создание запроса</span>
    </div>

    <h1 class="page-title">Создание запроса на добавление</h1>



    <?php echo $__env->make('accounting.reqests.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




    <?php if(!empty($successMsg)): ?>
    <div class="success-info"><?php echo $successMsg; ?></div>
    <?php endif; ?>

    <?php if(!empty($errorMsg)): ?>
    <div class="info-box-error"><b><?php echo e(trans('app.reg_error')); ?>:</b> <?php echo $errorMsg; ?></div>
    <?php endif; ?>




    <div class="is-info">

      <form class="form" method="POST" action="<?php echo e(route('accounting.store')); ?>">
        <?php echo csrf_field(); ?>

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
                <p><?php echo e(Auth::user()->government->$names); ?></p>
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
                  <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($type->id); ?>"><?php echo e($type->$names); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <li class="is-menu__item" data-id="14">
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
          
        </div>


























        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← <?php echo e(trans('app.but_cancel')); ?></a>
          <button class="btn" type="submit" id="save_draft" name="save_draft" style="font-size: 14px; background: #00317B;"><?php echo e(trans('app.but_save')); ?></button>
          <button class="btn" type="submit" id="save_send" name="save_send" style="font-size: 14px; background: #0178BC;"><?php echo e(trans('app.but_send')); ?></button>
        </div>

      </form>

    </div>




  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/accounting/reqests/create.blade.php ENDPATH**/ ?>