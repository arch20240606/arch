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

        <div class="intro__buttons">
          <a class="intro__buttons-item btn btn_icon btn_white" href="<?php echo e(route('accounting.information')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#book"></use>
            </svg>
            <?php echo e(trans('app.uchet')); ?>

          </a>
          <a class="intro__buttons-item btn btn_icon btn_white" href="<?php echo e(route('expertise.index')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#check-fill"></use>
            </svg>
            <?php echo e(trans('app.expert')); ?>

          </a>
          <a class="intro__buttons-item btn btn_icon btn_white" href="<?php echo e(route('budget')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#money"></use>
            </svg>
            <?php echo e(trans('app.budget')); ?>

          </a>
          <a class="intro__buttons-item btn btn_icon btn_white" href="https://govtec.kz/" target="_blank">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-globus"></use>
            </svg>
            <?php echo e(trans('app.cpcp')); ?>

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
          <div></div>
          <a class="intro__buttons-item btn btn_icon btn_white" href="<?php echo e(route('grades.index')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-star"></use>
            </svg>
            <?php echo e(trans('app.grade')); ?>

          </a>
        </div>

      </div>

    </div>
  </section>

  <?php echo $__env->make('layouts.information_systems', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('layouts.technologies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</main><?php /**PATH /var/www/govarch.kz/docs/resources/views/layouts/content_main_auth.blade.php ENDPATH**/ ?>