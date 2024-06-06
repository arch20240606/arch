

<?php $__env->startSection('title'); ?><?php echo e(trans('app.is_mio')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


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
        <span><?php echo e(trans('app.is_mio')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.is_mio')); ?></h1>
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
          <td class="table__name"><a href="#">Региональный шлюз "электронного правительства"</a></td>
          <td class="table__status">РШЭП</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Региональная геоинформационная система</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система "Система контроля и управления доступом"</a></td>
          <td class="table__status">АИС "СКУД"</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-13-0000016</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационная система региональный шлюз, как подсистема шлюза "электронного правительства" Южно-Казахстанской области</a></td>
          <td class="table__status">ИС РШЭП</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-19-0000202</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационно-аналитическая система Ситуационного центра аппарата акима Атырауской области</a></td>
          <td class="table__status">ИАС СЦ</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система «Пропускная система»</a></td>
          <td class="table__status">АИС ПС</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-19-0000205</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Система внутреннего электронного документооборота подразделений акимата</a></td>
          <td class="table__status">СЭД</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-13-0000027</td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизироанная информационная система “Электронные списки избирателей”</a></td>
          <td class="table__status">АИС ЭСИ</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-12-0000025</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационная аналитическая система "Интегро"</a></td>
          <td class="table__status">ИАС Интегро</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в опытную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Подсистема «Управления и контроля функционирования»</a></td>
          <td class="table__status">УКФ</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-21-0000315</td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/infosys/ismio.blade.php ENDPATH**/ ?>