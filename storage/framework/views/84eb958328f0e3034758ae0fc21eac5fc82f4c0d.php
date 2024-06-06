

<?php $__env->startSection('title'); ?>Включение в реестр бизнес-процессов<?php $__env->stopSection(); ?>


<?php
if ( app()->getLocale() == "ru" ) {
  $name_go = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
  $name_go = 'name_en';
} else {
  $name_go = 'name_kz';
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
      <a href="<?php echo e(route('businessprocess.index')); ?>">Реестр бизнес-процессов</a>
      /
      <span>Включение в реестр</span>
    </div>

    <h1 class="page-title">Включение в реестр</h1>








    <div class="is-info">

      <form class="form" method="POST" action="">
        <?php echo csrf_field(); ?>

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Форма данных бизнес-процесса</h2>
        </div>


        <table class="table">
          <thead>
            <tr>
              <th style="width: 35%; border: 0px;"></th>
              <th style="width: 5%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="table__name">Исполнитель процесса</td>
              <td><span data-hint="Указывается полное наименование Организации к примеру: Министерство Юстиции Республики Казахстан"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="go_select" name="go_select">
                  <option value="0" selected>Выберите исполнителя процесса</option>
                  <?php $__currentLoopData = $governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($government->id); ?>"><?php echo e($government->$name_go); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">Наименование бизнес-процесса</td>
              <td><span data-hint="Здесь надо добавить описание поля"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="users_npa" name="users_npa" type="text"></td>
            </tr>

            <tr>
              <td class="table__name">Связанные функции</td>
              <td><span data-hint="Здесь надо добавить описание поля"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="users_npa" name="users_npa" type="text"></td>
            </tr>


            <tr>
              <td class="table__name">Файл диаграммы AS IS</td>
              <td><span data-hint="*"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <input name="file_bpm" style="cursor: pointer;" accept=".bpm" id="file_bpm" type="file">
              </td>
            </tr>

            <tr>
              <td class="table__name">Файл диаграммы TO BE</td>
              <td><span data-hint="*"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <input name="file_bpm" style="cursor: pointer;" accept=".bpm" id="file_bpm" type="file">
              </td>
            </tr>

            <tr>
              <td class="table__name">Файл программы мероприятий</td>
              <td><span data-hint="*"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <input name="file_bpm" style="cursor: pointer;" accept=".bpm" id="file_bpm" type="file">
              </td>
            </tr>

          </tbody>
        </table>



        <div class="is-info__header" style="margin-top: 50px;">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Форма данных функции</h2>
        </div>


        <table class="table">
          <thead>
            <tr>
              <th style="width: 35%; border: 0px;"></th>
              <th style="width: 5%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="table__name">Наименование функции</td>
              <td><span data-hint="Здесь надо добавить описание поля"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="users_npa" name="users_npa" type="text"></td>
            </tr>

            <tr>
              <td class="table__name">Стратегическое направление</td>
              <td><span data-hint=""><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="interval_update" name="interval_update">
                  <option value="0" selected="">Выберите стратегическое направление</option>
                  <option value="1">1 направление</option>
                  <option value="2">2 направление</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">Группа функций</td>
              <td><span data-hint=""><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="interval_update" name="interval_update">
                  <option value="0" selected="">Выберите группу функций</option>
                  <option value="1">1 группа</option>
                  <option value="2">2 группа</option>
                </select>
              </td>
            </tr>

          </tbody>
        </table>


        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← Отменить и назад</a>
          <button class="btn" type="button" id="save_send" name="save_send" style="font-size: 14px; background: #0178BC;">Сохранить</button>
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

<?php echo $__env->make('layouts.ask_question', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="chat" class="chat"></div>
<?php echo $__env->make('layouts.search_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>


<script type="text/javascript">

  const input = document.querySelector('#input');
  const searchItems = select.querySelectorAll('option');

  input.addEventListener('keypress', function(e) {
    const target = e.target;
    const val = target.value.trim().toUpperCase();
    const fragment = document.createDocumentFragment();

    if (!target.classList.contains('keyboard__key')) return;
    
    for (const elem of searchItems) {
      elem.remove();
      
      if (val === '' || elem.innerText.toUpperCase().includes(val)) {
        fragment.append(elem);
      }
    }

    select.append(fragment);
  })

</script>




<script>
    const datepickerKK = {
        closeText: 'Жабу',
        prevText: 'Алдыңғы',
        nextText: 'Келесі',
        currentText: 'Бүгін',
        monthNames: ['Қаңтар', 'Ақпан', 'Наурыз', 'Сәуір', 'Мамыр', 'Маусым',
            'Шілде', 'Тамыз', 'Қыркүйек', 'Қазан', 'Қараша', 'Желтоқсан'],
        monthNamesShort: ['Қаң', 'Ақп', 'Нау', 'Сәу', 'Мам', 'Мау',
            'Шіл', 'Там', 'Қыр', 'Қаз', 'Қар', 'Жел'],
        dayNames: ['Жексенбі', 'Дүйсенбі', 'Сейсенбі', 'Сәрсенбі', 'Бейсенбі', 'Жұма', 'Сенбі'],
        dayNamesShort: ['жкс', 'дсн', 'ссн', 'срс', 'бсн', 'жма', 'снб'],
        dayNamesMin: ['Жк', 'Дс', 'Сс', 'Ср', 'Бс', 'Жм', 'Сн'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    const datepickerRU = {
        closeText: 'Закрыть',
        prevText: 'Пред',
        nextText: 'След',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
            'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Нед',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    }

    // Set datepicker language. Default: en
    jQuery.datepicker.setDefaults( datepickerRU );
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/businessprocess/index_create.blade.php ENDPATH**/ ?>