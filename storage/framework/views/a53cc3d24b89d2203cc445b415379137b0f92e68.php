

<?php $__env->startSection('title'); ?><?php echo e(trans('app.is_cgo')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


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
        <span><?php echo e(trans('app.is_cgo')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.is_cgo')); ?></h1>
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
          <td class="table__name"><a href="#">Информационная система для ликвидации финансовых организаций</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Информационная система е-Baqylau</a></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Национальное хранилище медицинских изображений</a></td>
          <td class="table__status">ИС НХМИ</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Автоматизированная информационная система «Электронный документооборот»</a></td>
          <td class="table__status">АИС "ЭДОБ"</td>
          <td class="table__status"></td>
          <td class="table__status">KZ-П-20-0000261</td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Модуль Лжепредприятия единой автоматизированной информационной-телекоммуникационной системы (ЕАИТС) АБЭКП Модуль Лжепредприятия (ЕАИТС) АБЭКП Аккумуляция сведений о лжепредприятиях и лицах, причастных к данному виду противоправной деятельности.</a></td>
          <td class="table__status">Модуль Лжепредприятия (ЕАИТС) АБЭКП</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Бизнес-аналитическая система QlikSense</a></td>
          <td class="table__status">Qlik</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
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
          <td class="table__name"><a href="#">Единая информационная система "Беркут"</a></td>
          <td class="table__status">ЕИС "Беркут"</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Сдача в промышленную эксплуатацию</td>
        </tr>
        <tr>
          <td class="table__name"><a href="#">Единый банк данных лиц, имеющих обязательства перед государством «Шектеу»</a></td>
          <td class="table__status">ЕБД Шектеу</td>
          <td class="table__status"></td>
          <td class="table__status"></td>
          <td class="table__status">Нет информации по эксплуатации</td>
        </tr>
      </tbody>
    </table>

    <div class="pagination">
      <!--    <a class="pagination__item" href="#">←←</a>-->
      <!--    <a class="pagination__item" href="#">←</a>-->
      <a class="pagination__item  pagination__item_active" href="#">1</a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/infosys/iscgo.blade.php ENDPATH**/ ?>