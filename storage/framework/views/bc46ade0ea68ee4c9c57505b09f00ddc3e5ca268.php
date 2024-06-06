

<?php $__env->startSection('title'); ?><?php echo e(trans('app.is_3_class')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


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
        <span><?php echo e(trans('app.is_3_class')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.is_3_class')); ?></h1>
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
          <td class="table__name"><a href="#">Республиканское государственное учреждение «Карагандинская академия Министерства внутренних дел Республики Казахстан имени Баримбека Бейсенова»</a></td>
          <td class="table__status">kpa.gov.kz</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-W-21-0000307</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">оперативный центр информационной безопасности</a></td>
          <td class="table__status">ОЦИБ</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">ИК-услуга "Резервирование информационных систем государственных органов в части резервного копирования"</a></td>
          <td class="table__status">РПЭП</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-A-20-0000260</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Актюбинский юридический институт Министерства внутренних дел Республики Казахстан имени Малкеджара Букенбаева</a></td>
          <td class="table__status">aui-aktobe.kz</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-W-21-0000308</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Система тестирования сотрудников органов прокуратуры</a></td>
          <td class="table__status">СТСОП</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-12-0000118</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Интегрированный банк данных Министерства внутренних дел Республики Казахстан</a></td>
          <td class="table__status">ИБД</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-02-0000054</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Единый банк данных лиц, имеющих обязательства перед государством «Шектеу»</a></td>
          <td class="table__status">ЕБД Шектеу</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система «Информационный сервис»</a></td>
          <td class="table__status">АИС "ИС"</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-11-0000046</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Интегрированная аналитическая составляющая информационных систем КПСиСУ ГП РК</a></td>
          <td class="table__status">АИС ИАС</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-21-0000327</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационная система «Управление кадрами и службой безопасности»</a></td>
          <td class="table__status">ИС «УКиСБ»</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-12-0000112</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
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
      <a class="pagination__item" href="#">30</a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/infosys/isthird.blade.php ENDPATH**/ ?>