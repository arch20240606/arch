

<?php $__env->startSection('title'); ?><?php echo e(trans('app.question')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="content questions">

  <div class="questions__bg">
    <picture>
      <source srcset="/assets/images/questions-bg.avif" type="image/avif">
      <source srcset="/assets/images/questions-bg.webp" type="image/webp">
      <img src="/assets/images/questions-bg.jpg" alt="Background">
    </picture>
  </div>

  <div class="container container_medium">

    <div class="breadcrumbs breadcrumbs_white">
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <span><?php echo e(trans('app.question')); ?></span>
    </div>

    <div class="questions__wrapper">

      <div class="questions__col">
        <h1 class="questions__title page-title"><?php echo e(trans('app.question')); ?></h1>
        <form class="questions__form form">
          <div class="form__field">
            <label class="form__label" for="question-category">К чему относится вопрос</label>
            <select name="question-category" id="question-category" required>
              <option value="" disabled selected>Выберите модуль</option>
              <option value="1">Модуль 1</option>
              <option value="2">Модуль 2</option>
              <option value="3">Модуль 3</option>
            </select>
            <!--                        <input type="text" name="question-category" id="question-category" placeholder="Напишите кратко о вопросе" required>-->
          </div>
          <div class="form__field">
            <label class="form__label" for="question-title">Заголовок</label>
            <input type="text" name="question-title" id="question-title" placeholder="Напишите кратко о вопросе" required>
          </div>
          <div class="form__field">
            <label class="form__label" for="question">Полный текст</label>
            <textarea name="question" id="question" placeholder="Введите краткий текст вопросы"></textarea>
          </div>
          <button class="form__submit" type="submit">Отправить</button>
        </form>
      </div>

      <div class="questions__col questions__last">
        <h2 class="questions__last-title">Последние отвеченные вопросы</h2>
        <div class="questions__last-list">
          <a class="questions__last-item" href="#">
            <span class="questions__last-item-img">
              <img src="/assets/images/question-avatar.svg" alt="Асель Едильбаевна Рахметова">
            </span>
            <h3 class="questions__last-item-title">ТЗ завис в статусе "на подписи", не уходит
              дальше</h3>
            <span class="questions__last-item-name">Асель Едильбаевна Рахметова</span>
            <span class="questions__last-item-topic">Экспертиза нормативно-технической документации</span>
            <span class="questions__last-item-date">19 д. назад</span>
          </a>
          <a class="questions__last-item" href="#">
            <span class="questions__last-item-img">
              <img src="/assets/images/question-avatar.svg" alt="Асель Едильбаевна Рахметова">
            </span>
            <h3 class="questions__last-item-title">Как прикрепить ТЗ на ИС для проверки его в УО.</h3>
            <span class="questions__last-item-name">Иван Петрович Максимов</span>
            <span class="questions__last-item-topic">Экспертиза нормативно-технической документации</span>
            <span class="questions__last-item-date">19 д. назад</span>
          </a>
          <a class="questions__last-item" href="#">
            <span class="questions__last-item-img">
              <img src="/assets/images/question-avatar.svg" alt="Асель Едильбаевна Рахметова">
            </span>
            <h3 class="questions__last-item-title">Нет в списке нашей компании АО ИАЦНГ</h3>
            <span class="questions__last-item-name">Еркебұлан Өмірзақ</span>
            <span class="questions__last-item-topic">Экспертиза нормативно-технической документации</span>
            <span class="questions__last-item-date">19 д. назад</span>
          </a>
          <a class="questions__last-item" href="#">
            <span class="questions__last-item-img">
              <img src="/assets/images/question-avatar.svg" alt="Асель Едильбаевна Рахметова">
            </span>
            <h3 class="questions__last-item-title">На оф. письме как указать шапку адресат?</h3>
            <span class="questions__last-item-name">Руслан Масқауұлы Нокрабеков</span>
            <span class="questions__last-item-topic">Экспертиза нормативно-технической документации</span>
            <span class="questions__last-item-date">19 д. назад</span>
          </a>
        </div>
        <a class="questions__last-more btn btn_white" href="<?php echo e(route('questions')); ?>">Посмотреть все <span>(570)</span> →→</a>
      </div>

    </div>

  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('other_divs'); ?>

  <div id="chat" class="chat"></div>
  <?php echo $__env->make('layouts.login_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if( Auth::user() ): ?>
    <?php echo $__env->make('layouts.search_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/questions/ask.blade.php ENDPATH**/ ?>