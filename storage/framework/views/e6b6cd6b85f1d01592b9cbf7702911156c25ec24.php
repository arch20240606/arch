

<?php $__env->startSection('title'); ?><?php echo e(trans('app.calculator')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


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
        <span><?php echo e(trans('app.calculator')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.calculator')); ?></h1>
    </div>
  </section>

  <div class="container">
    <p><br></p>
    <h2 class="geo__title" style="color: #004d7b;">Для оценки затрат на сопровождение ППО ИС</h2>
    <table class="table">
      <thead>
        <tr>
          <th style="width: 80%">Описание</th>
          <th style="width: 20%">Значения</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="table__name">Среднемесячная номинальная заработная плата одного работника по разделу «Профессиональная, научная и техническая деятельность»</td>
          <td class="table__status"><input class="text-field__input" id="amount_zp" onkeypress="results()" maxlength="20" value="0.00" type="text"></td>
        </tr>
        <tr>
          <td class="table__name">Средняя стоимость одного человека-месяца</td>
          <td class="table__status"><input class="text-field__input" id="amount_one" value="0.00" type="text" disabled></td>
        </tr>
        <tr>
          <td class="table__name">Месячный расчетный показатель</td>
          <td class="table__status"><input class="text-field__input" id="mrp" value="2269.00" type="text" disabled></td>
        </tr>
        <tr>
          <td class="table__name">Средний размер инфляции, за 3 предыдущих года</td>
          <td class="table__status"><input class="text-field__input" id="inf" value="5.93" type="text" disabled></td>
        </tr>
      </tbody>
    </table>

    <p><br></p>

    <h2 class="geo__title" style="color: #004d7b;">Для расчета стоимости технической поддержки кодов программного обеспечения</h2>
    <table class="table">
      <thead>
        <tr>
          <th style="width: 52%">Наименование/Годы</th>
          <th style="width: 12%">2021</th>
          <th style="width: 12%">2022</th>
          <th style="width: 12%">2023</th>
          <th style="width: 12%">2024</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="table__name">Коэффициент изменения МРП расчетного года техподдержки к МРП i-того года (года разработки)</td>
          <td class="table__status"><input class="text-field__input" id="k_mrp_2021" value="0.00" type="text" disabled></td>
          <td class="table__status"><input class="text-field__input" id="k_mrp_2022" value="0.00" type="text" disabled></td>
          <td class="table__status"><input class="text-field__input" id="k_mrp_2023" value="0.00" type="text" disabled></td>
          <td class="table__status"><input class="text-field__input" id="k_mrp_2024" value="0.00" type="text" disabled></td>
        </tr>
        <tr>
          <td class="table__name">Приведенная стоимость текущей версии ППО</td>
          <td class="table__status"><input class="text-field__input" id="cur_ppo_2021" value="0.00" type="text" disabled></td>
          <td class="table__status"><input class="text-field__input" id="cur_ppo_2022" value="0.00" type="text" disabled></td>
          <td class="table__status"><input class="text-field__input" id="cur_ppo_2023" value="0.00" type="text" disabled></td>
          <td class="table__status"><input class="text-field__input" id="cur_ppo_2024" value="0.00" type="text" disabled></td>
        </tr>

      </tbody>
    </table>

    <p><br></p>
    
    <h2 class="geo__title" style="color: #004d7b;">Расчет стоимости технической поддержки кодов программного обеспечения</h2>
    <table class="table">
      <thead>
        <tr>
          <th style="width: 80%">Описание</th>
          <th style="width: 20%">Значения</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="table__name">Стоимость техподдержки кодов ППО ИС в течение одного года (2024 года)</td>
          <td class="table__status"><input class="text-field__input" id="amount_tech" value="0.00" type="text" disabled></td>
        </tr>
      </tbody>
    </table>

    <p><br></p>
    
    <h2 class="geo__title" style="color: #004d7b;">Расчет стоимости 1 года поддержки эксплуатации ППО ИС</h2>
    <table class="table">
      <thead>
        <tr>
          <th style="width: 80%">Описание</th>
          <th style="width: 20%">Значения</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="table__name">Норма занятого персонала в подготовке процесса поддержки эксплуатации</td>
          <td class="table__status"><input class="text-field__input" id="norma_pod" value="1" type="text"></td>
        </tr>
        <tr>
          <td class="table__name">Норма занятого персонала в проведении эксплуатационных испытаний</td>
          <td class="table__status"><input class="text-field__input" id="norma_pro" value="6" type="text"></td>
        </tr>
        <tr>
          <td class="table__name">Норма занятого персонала в поддержке пользователей системы</td>
          <td class="table__status"><input class="text-field__input" id="norma_sup" value="24" type="text"></td>
        </tr>
        <tr>
          <td class="table__name">Коэффициент потребности работ в проведении эксплуатационных испытаний</td>
          <td class="table__status"><input class="text-field__input" id="coef" value="1.00" type="text"></td>
        </tr>
        <tr>
          <td class="table__name">Стоимость 1 года поддержки эксплуатации ППО ИС</td>
          <td class="table__status"><input class="text-field__input" id="amount_year" value="0.00" type="text" disabled></td>
        </tr>
      </tbody>
    </table>

    <p><br></p>
    
    <h2 class="geo__title" style="color: #004d7b;">Расчет стоимости сопровождения ППО ИС</h2>
    <table class="table">
      <thead>
        <tr>
          <th style="width: 80%">Описание</th>
          <th style="width: 20%">Значения</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="table__name">Стоимость сопровождения ППО ИС на год (2024 год)</td>
          <td class="table__status"><input class="text-field__input" id="amount_year_2024" value="0.00" type="text" disabled></td>
        </tr>
      </tbody>
    </table>

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
  amount_zp.oninput = function results() {
    calculation()
  }

  norma_pod.oninput = function results_pod() {
    calculation()
  }

  norma_pro.oninput = function results_pro() {
    calculation()
  }

  norma_sup.oninput = function results_sup() {
    calculation()
  }

  coef.oninput = function results_coef() {
    calculation()
  }



  function calculation() {
    var amount = document.getElementById('amount_zp').value;
    var inf = document.getElementById('inf').value;
    var amount_one = document.getElementById('amount_one').value;

    var norma_pod = document.getElementById('norma_pod').value;
    var norma_pro = document.getElementById('norma_pro').value;
    var norma_sup = document.getElementById('norma_sup').value;
    var coef = document.getElementById('coef').value;

    res = amount * 3.2116;
    k_mrp_2021 = (1+inf/100)*(1+inf/100)*(1+inf/100);
    k_mrp_2022 = (1+inf/100)*(1+inf/100);
    k_mrp_2023 = (1+inf/100);
    k_mrp_2024 = 1;

    document.getElementById('amount_one').value = res.toFixed(2);
    document.getElementById('k_mrp_2021').value = k_mrp_2021.toFixed(4);
    document.getElementById('k_mrp_2022').value = k_mrp_2022.toFixed(4);
    document.getElementById('k_mrp_2023').value = k_mrp_2023.toFixed(4);
    document.getElementById('k_mrp_2024').value = k_mrp_2024.toFixed(4);
    
    var ppo_2021 = k_mrp_2021*750094.44;
    document.getElementById('cur_ppo_2021').value = ppo_2021.toFixed(2);
    var ppo_2022 = k_mrp_2022*794600.04;
    document.getElementById('cur_ppo_2022').value = ppo_2022.toFixed(2);
    var ppo_2024 = ppo_2021 + ppo_2022;
    document.getElementById('cur_ppo_2024').value = ppo_2024.toFixed(2);

    var amount_tech = ppo_2024 * 0.1575;
    document.getElementById('amount_tech').value = amount_tech.toFixed(2);

    var step_1 = coef * norma_pro;
    var step_2 = ( parseFloat(step_1) + parseFloat(norma_pod) + parseFloat(norma_sup));
    
    var amount_year = ( parseFloat(step_2) * parseFloat(res) ) * 12 / 1000;
    document.getElementById('amount_year').value = amount_year.toFixed(2);


    var amount_year_2024 = amount_year + amount_tech;
    document.getElementById('amount_year_2024').value = amount_year_2024.toFixed(2);



  }




</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/calculator/index.blade.php ENDPATH**/ ?>