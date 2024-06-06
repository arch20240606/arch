<main class="content">
  <section class="intro">

    <div class="intro__bg">
      <picture>
        <source srcset="/assets/images/intro-bg.avif" type="image/avif">
        <source srcset="/assets/images/intro-bg.webp" type="image/webp">
        <img src="/assets/images/intro-bg.jpg" alt="Background">
      </picture>
    </div>

    <div class="container">



      <div class="intro__inner">

        <h1 class="intro__title"><?php echo trans('app.text_title'); ?></h1>

        <a class="intro__btn btn btn_icon popupOpen" href="#login-popup">
          <?php echo e(trans('app.begin')); ?>

          <img src="/assets/images/icon-arrow-right-white.svg" alt="">
        </a>

        <div class="intro__buttons">

          <a class="intro__buttons-item btn btn_icon btn_white" href="https://govtec.kz/" target="_blank">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-globus"></use>
            </svg>
            <?php echo e(trans('app.cpcp')); ?>

          </a>

          <a class="intro__buttons-item btn btn_icon btn_white" href="<?php echo e(route('etalon')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#book"></use>
            </svg>
            <?php echo e(trans('app.etalon')); ?>

          </a>
          
          
          <a class="intro__buttons-item btn btn_icon btn_white" href="<?php echo e(route('grades.index')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-star"></use>
            </svg>
            <?php echo e(trans('app.grade')); ?>

          </a>
          <a class="intro__buttons-item btn btn_icon btn_white" href="https://models.govarch.kz" target="_blank">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-tree"></use>
            </svg>
            <?php echo e(trans('app.architecture')); ?>

          </a>
          <a class="intro__buttons-item btn btn_icon btn_white" href="<?php echo e(route('calculator')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-calc"></use>
            </svg>
            <?php echo e(trans('app.calculator')); ?>

          </a>
          <a class="intro__buttons-item btn btn_icon btn_white" href="<?php echo e(route('datacatalog.index')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-data"></use>
            </svg>
            <?php echo e(trans('app.catalog')); ?>

          </a>

        </div>

      </div>

    </div>
  </section>

  <?php echo $__env->make('layouts.information_systems', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('layouts.technologies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</main><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/layouts/content_main_without_auth.blade.php ENDPATH**/ ?>