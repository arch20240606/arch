

<?php $__env->startSection('title'); ?><?php echo e(trans('app.ik_cgo')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


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
        <span><?php echo e(trans('app.ik_cgo')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.ik_cgo')); ?></h1>
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
          <td class="table__name"><a href="#">ИК услуга "Единая электронная платформа с обеспечением доступности информации о всех проводимых культурных мероприятиях, театральных сезонах, фондов библиотек, музеев и выставок (е-культура)"</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Комплекс программно-аппаратного для защиты сети</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">ИК-услуга "Е-Законодательство"</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">СПП "Реестр субъектов предпринимателей"</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">СПП "Маркировка Товаров"</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">СПП Тахограф</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">СПП «База данных «Монополист»</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">ЗАДАНИЕ НА ПРОЕКТИРОВАНИЕ ИНФОРМАЦИОННО-КОММУНИКАЦИОННОЙ УСЛУГИ «Санитарно-эпидемиологический надзор»</a></td>
          <td class="table__status">ЗНП ИКУ СЭН</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">ИК-услуга "Отбор кандидатов на вакантные судейские должности"</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Сервисный программный продукт База "Монополист"</a></td>
          <td class="table__status">База "Монополист"</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-A-23-0000356</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
      </tbody>
    </table>

    <div class="pagination">
      <!--    <a class="pagination__item" href="#">←←</a>-->
      <!--    <a class="pagination__item" href="#">←</a>-->
      <a class="pagination__item pagination__item_active" href="#">1</a>
      <a class="pagination__item" href="#">2</a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/infosys/ikcgo.blade.php ENDPATH**/ ?>