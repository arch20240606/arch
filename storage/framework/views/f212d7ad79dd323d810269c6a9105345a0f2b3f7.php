

<?php $__env->startSection('title'); ?><?php echo e(trans('app.ik_mio')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


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
        <span><?php echo e(trans('app.ik_mio')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.ik_mio')); ?></h1>
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
          <td class="table__name"><a href="#">Автоматизированная система отбора педагогического состава T-hunter</a></td>
          <td class="table__status">T-hunter</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированный сервис (программа для ЭВМ) SAKURA</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированный сервис «MINDAL»</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">«INDIGO-электронный детский сад»</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Системы программно-аппаратного комплекса "Школьный электронный контроль"</a></td>
          <td class="table__status">ШЭК</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Облачная система документооборота</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Облачная система документооборота (Акимат г. Астана)</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Облачная система документооборота (Акимат Кызылординской области)</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Облачная система документооборота (Акимат Мангистауской области)</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Облачная система документооборота (Акимат Туркестанской области)</a></td>
          <td class="table__status"></td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/infosys/ikmio.blade.php ENDPATH**/ ?>