

<?php $__env->startSection('title'); ?><?php echo e(trans('app.etalon')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

<?php
if ( app()->getLocale() == "ru" ) {
  $names = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
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
        <span><?php echo e(trans('app.etalon')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.etalon')); ?></h1>
    </div>
  </section>

  <div class="container">
    <p><br></p>
    <?php if( count($domainlists) == 0 ): ?>
      <div class="info-box-error" id="error_sign_box" style="padding: 25px 20px 25px 20px;">На текущий момент отсутствуют утвержденные эталонные данные</div>
    <?php else: ?>







      <div class="is-tab-content" data-id="1" style="display: block;">
        <div class="is-menu-navigation">
          <div class="is-menu">
            <div class="is-menu__title">
              Домены
              <span class="is-menu__toggle">
                <svg>
                  <use xlink:href="/assets/images/sprite.svg#chevron-right-small"></use>
                </svg>
              </span>
            </div>
            <ul class="is-menu__list">

              <?php $__currentLoopData = $domainlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <li class="is-menu__item <?php if($domain->id == 1): ?> is-menu__item_active <?php endif; ?>" data-id="<?php echo e($domain->id); ?>">
                <span class="is-menu__item-title"><?php echo e($domain->$names); ?></span>
              </li>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
          </div>


          <?php $__currentLoopData = $domainlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


          <div class="is-menu-content" data-id="<?php echo e($domain->id); ?>" <?php if($domain->id == 1): ?> style="display: block;" <?php endif; ?>>
            
            <h2 class="is-content-title"><?php echo e($domain->$names); ?> → <span style="font-size: 14px;">Версия: <?php echo e($domain->version); ?></span></h2>

            <div class="tab tabs">
              <a class="tabs__link tablinks" onclick="openCity(event, 'f<?php echo e($domain->id); ?>00')" style="cursor: pointer; padding-left: 20px; padding-right: 20px;">
                <?php echo e(trans('app.fl')); ?>

              </a>
              <a class="tabs__link tablinks" onclick="openCity(event, 'u<?php echo e($domain->id); ?>01')" style="cursor: pointer; padding-left: 20px; padding-right: 20px;">
                <?php echo e(trans('app.ul')); ?>

              </a>
              <a class="tabs__link tablinks" onclick="openCity(event, 'o<?php echo e($domain->id); ?>02')" style="cursor: pointer; padding-left: 20px; padding-right: 20px;">
                <?php echo e(trans('app.obj')); ?>

              </a>
              <a class="tabs__link tablinks" onclick="openCity(event, 'd<?php echo e($domain->id); ?>03')" style="cursor: pointer; padding-left: 20px; padding-right: 20px;">
                <?php echo e(trans('app.docs')); ?>

              </a>
            </div>



            <div class="tabcontent" id='f<?php echo e($domain->id); ?>00'>

              <div class="filter form form__field">
                <select onchange="getDateObject(this, 'info_div_f<?php echo e($domain->id); ?>00')" id="f<?php echo e($domain->id); ?>00_o" name="f<?php echo e($domain->id); ?>00_o" required>
                  <option value="">Выберите объект</option>
                  <?php $__currentLoopData = \App\Models\DomainObjectCollection::domainObjects($domain->id, 'Физ.лицо'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($objects->id); ?>"><?php echo e($objects->data_object); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>

              <div id="info_div_f<?php echo e($domain->id); ?>00" name="info_div_f<?php echo e($domain->id); ?>00" style="padding: 20px; border: 1px solid rgba(114,127,161,.2); border-radius: 8px; font-size: 14px;">
                <b>Информация о данных:</b><br><br>
              </div>

            </div>




            <div class="tabcontent" id='u<?php echo e($domain->id); ?>01'>

              <div class="filter form form__field">
                <select onchange="getDateObject(this, 'info_div_u<?php echo e($domain->id); ?>01')" id="u<?php echo e($domain->id); ?>01_o" name="u<?php echo e($domain->id); ?>01_o" required>
                  <option value="">Выберите объект</option>
                  <?php $__currentLoopData = \App\Models\DomainObjectCollection::domainObjects($domain->id, 'Юр.лицо (организация)'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($objects->id); ?>"><?php echo e($objects->data_object); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>

              <div id="info_div_u<?php echo e($domain->id); ?>01" name="info_div_u<?php echo e($domain->id); ?>01" style="padding: 20px; border: 1px solid rgba(114,127,161,.2); border-radius: 8px; font-size: 14px;">
                <b>Информация о данных:</b><br><br>
              </div>

            </div>




            <div class="tabcontent" id='o<?php echo e($domain->id); ?>02'>

              <div class="filter form form__field">
                <select onchange="getDateObject(this, 'info_div_o<?php echo e($domain->id); ?>02')" id="o<?php echo e($domain->id); ?>02_o" name="o<?php echo e($domain->id); ?>02_o" required>
                  <option value="">Выберите объект</option>
                  <?php $__currentLoopData = \App\Models\DomainObjectCollection::domainObjects($domain->id, 'Объект'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($objects->id); ?>"><?php echo e($objects->data_object); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>

              <div id="info_div_o<?php echo e($domain->id); ?>02" name="info_div_o<?php echo e($domain->id); ?>02" style="padding: 20px; border: 1px solid rgba(114,127,161,.2); border-radius: 8px; font-size: 14px;">
                <b>Информация о данных:</b><br><br>
              </div>

            </div>




            <div class="tabcontent" id='d<?php echo e($domain->id); ?>03'>

              <div class="filter form form__field">
                <select onchange="getDateObject(this, 'info_div_d<?php echo e($domain->id); ?>03')" id="d<?php echo e($domain->id); ?>03_o" name="d<?php echo e($domain->id); ?>03_o" required>
                  <option value="">Выберите объект</option>
                  <?php $__currentLoopData = \App\Models\DomainObjectCollection::domainObjects($domain->id, 'Документ'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($objects->id); ?>"><?php echo e($objects->data_object); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>
              
              <div id="info_div_d<?php echo e($domain->id); ?>03" name="info_div_d<?php echo e($domain->id); ?>03" style="padding: 20px; border: 1px solid rgba(114,127,161,.2); border-radius: 8px; font-size: 14px;">
                <b>Информация о данных:</b><br><br>
              </div>

            </div>



            

          </div>



          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        </div>
      </div>




    <?php endif; ?>

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

<?php $__env->startSection('scripts'); ?>
<script>
  function getDateObject(selectObject, div) {
    
    var id = selectObject.value;
    var token = $("input[name='_token']").val();
    var info_div = document.getElementById(div);
    info_div.innerHTML = '<b>Информация о данных:</b><br><br>';

    $.ajax({
      url: "<?php echo e(route('etalon.getinfo')); ?>",
      method: 'POST',
      data: {
        _id: id,
        _token: token
      },
      success: function(data) {
        info_div.innerHTML = '<p>'+ data.options +'</b></p>';
      }
    });

  }

</script>



<script>
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" tabs__link_active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " tabs__link_active";

  }
</script>

<style>
  .tabcontent {
    display: none;
  }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/etalondata/firstpage/index.blade.php ENDPATH**/ ?>