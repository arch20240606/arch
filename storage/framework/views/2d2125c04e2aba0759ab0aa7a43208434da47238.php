

<?php $__env->startSection('title'); ?><?php echo e(trans('app.is_2_class')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="content">
  
  <section class="geo" style="height: 170px;">
    <div class="geo__bg">
      <picture>
        <source srcset="/assets/images/questions-bg.avif" type="image/avif">
        <source srcset="/assets/images/questions-bg.webp" type="image/webp">
        <img src="/assets/images/questions-bg.jpg" alt="Background">
      </picture>
    </div>

    <div class="container">
      <div class="breadcrumbs breadcrumbs_white">
        <a class="breadcrumbs__home" href="/">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#house"></use>
          </svg>
        </a>
        /
        <span><?php echo e(trans('app.is_2_class')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.is_2_class')); ?></h1>
    </div>

  </section>

  <div class="container" style="margin-top: 50px;">
    <table class="table">
      <thead>
        <tr>
          <th>Наименование</th>
          <th>Аббревиатура</th>
          <th>Владелец</th>
          <th>Регистрационный номер</th>
          <th>Статус эксплуатации</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система «Электронный документооборот»</a></td>
          <td class="table__status">АИС "ЭДОБ"</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-20-0000261</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система «Единый учет обращений лиц»</a></td>
          <td class="table__status">АИС «ЕУОЛ»</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-11-0000048</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система «Сайлау»</a></td>
          <td class="table__status">АИС Сайлау</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-05-0000125</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Система электронного документооборота в Актюбинском областном акимате и его структурных подразделениях</a></td>
          <td class="table__status">СЭД</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-20-0000265</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационная система электронного документооборота, интегрированная с Единой системой электронного документооборота государственных органов Республики Казахстан и Эталонным контрольным банком нормативных правовых актов Республики Казахстан РГП на ПХВ "Республиканский центр правовой информации" Министерства юстиции Республики Казахстан</a></td>
          <td class="table__status">ЭДО</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-21-0000325</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Корпоративная информационная система электронного документооборота</a></td>
          <td class="table__status">КИСЭД</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-12-0000009</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационная система «Технические средства реабилитации»</a></td>
          <td class="table__status">ИС «ТСР»</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-20-0000288</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Интегрированная информационная система "Система информационного обмена правоохранительных и специальных органов" Республики Казахстан</a></td>
          <td class="table__status">СИО ПСО</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-13-0000003</td>
          <td class="table__status">Вывод из эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационно-аналитическая система "ИНТЕГРО"</a></td>
          <td class="table__status">ИАС «ИНТЕГРО»</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-12-0000081</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система "Единая унифицированная статистическая система"</a></td>
          <td class="table__status">АИС ЕУСС</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-03-0000090</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
      </tbody>
    </table>

    <div class="pagination">
      <!--    <a class="pagination__item" href="#">←←</a>-->
      <!--    <a class="pagination__item" href="#">←</a>-->
      <a class="pagination__item pagination__item_active" href="#">1</a>
      <a class="pagination__item" href="#">2</a>
      <a class="pagination__item" href="#">3</a>
      <a class="pagination__item" href="#">4</a>
      <a class="pagination__item" href="#">5</a>
      <a class="pagination__item" href="#">6</a>
      <a class="pagination__item" href="#">→</a>
      <a class="pagination__item" href="#">→→</a>
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
  <?php echo $__env->make('layouts.login_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('layouts.search_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/infosys/issecond.blade.php ENDPATH**/ ?>