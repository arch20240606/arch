

<?php $__env->startSection('title'); ?><?php echo e(trans('app.ir_cgo')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


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
        <span><?php echo e(trans('app.ir_cgo')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.ir_cgo')); ?></h1>
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
          <td class="table__name"><a href="#">Официальный интернет-ресурс Агентства Республики Казахстан по регулированию и развитию финансового рынка (afr.gov.kz)</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Специализированный обучающий интернет-ресурс финансовой грамотности</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Интернет-ресурс Министерства культуры и спорта Республики Казахстан (mks.gov.kz)</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Интернет-ресурс Национального Банка Республики Казахстан (www.nationalbank.kz)</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Официальный сайт Уполномоченного по правам человека Республики Казахстан (ombudsman.kz)</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">KZ-W-05-0000019</td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Интернет-ресурс Министерства здравоохранения (www.mz.gov.kz)</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационный интернет-ресурс «Музей Первого Президента Республики Казахстан»</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Интернет ресурс Комитета контроля сферы образования и науки Министерства образования и науки РК (control.edu.gov.kz)</a></td>
          <td class="table__status">control.edu.gov.kz</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Интернет-ресурс Комитета науки Министерства образования и науки РК (sc.edu.gov.kz)</a></td>
          <td class="table__status">sc.edu.gov.kz</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Интернет-ресурс Комитета охраны прав детей Министерства образования и науки РК (bala-kkk.kz)</a></td>
          <td class="table__status">bala-kkk.kz</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
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
      <a class="pagination__item" href="#">25</a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/infosys/ircgo.blade.php ENDPATH**/ ?>