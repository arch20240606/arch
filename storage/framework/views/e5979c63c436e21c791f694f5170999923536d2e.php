

<?php $__env->startSection('title'); ?><?php echo e(trans('app.is_1_class')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


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
        <span><?php echo e(trans('app.is_1_class')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.is_1_class')); ?></h1>
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
          <td class="table__name"><a href="#">Автоматизированная информационная система «Специальные учеты»</a></td>
          <td class="table__status">АИС «СУ»</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-11-0000047</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Единое хранилище данных</a></td>
          <td class="table__status">ЕХД</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-10-0000009</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационная система "Государственный реестр налогоплательщиков и объектов налогообложения"</a></td>
          <td class="table__status">ИС РНиОН</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-05-0000124</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационно-аналитическая система судебных органов Республики Казахстан «Төрелік»</a></td>
          <td class="table__status">АИАС СО РК «Төрелік»</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-05-0000156</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система "Платформа для информатизации и обеспечения интероперабельности информационных систем здравоохранения"</a></td>
          <td class="table__status">Платформа ИИИСЗ</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-21-0000318</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Единая автоматизированная система управления отраслями агропромышленного комплекса «E-Agriculture»</a></td>
          <td class="table__status">ЕАСУ</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-12-0000055</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационная система "Казначейство-клиент"</a></td>
          <td class="table__status">К2</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-12-0000044</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система Государственного земельного кадастра Комитета по управлению земельными ресурсами Министерства сельского хозяйства Республики Казахстан</a></td>
          <td class="table__status">АИС ГЗК</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-02-0000001</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная интегрированная информационная система "Электронные государственные закупки"</a></td>
          <td class="table__status">АИИС «ЭГЗ»</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-14-0000027</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система "Сервисный центр"</a></td>
          <td class="table__status">АИС СЦ</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/infosys/isfirst.blade.php ENDPATH**/ ?>