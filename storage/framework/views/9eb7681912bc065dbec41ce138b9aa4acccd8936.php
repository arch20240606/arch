

<?php $__env->startSection('title'); ?>Эталонные данные<?php $__env->stopSection(); ?>

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

  <div class="container">

    <div class="breadcrumbs">
      <a class="breadcrumbs__home" href="/<?php echo e(app()->getLocale()); ?>">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <a href="<?php echo e(route('etalondatas.index')); ?>">Эталонные данные</a>

    </div>

    <h1 class="page-title">Эталонные данные</h1>

    <?php echo $__env->make('etalondata.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if( session()->has('successMsg') ): ?>
    <div class="success-info"><?php echo session()->get('successMsg'); ?></div>
    <?php endif; ?>

    <div class="info-box-error" id="error_sign_box" style="display: none; margin-bottom: 5px;"></div>
    <div class="success-info" id="success_sign_box" style="display: none; margin-bottom: 5px;"></div>


    <?php if( count($domainobjects) == 0 ): ?>

      <div class="info-box-error" id="error_sign_box" style="padding: 25px 20px 25px 20px;">В разделе <b>На согласовании</b> отсутствует доступная для вас информация</div>

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
              <form method="POST" action="<?php echo e(route('etalondatas.update', ['etalondata' => $domain->id])); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <h2 class="is-content-title">
                  <?php echo e($domain->$names); ?> →

                  <?php if($domain->send == 1): ?>
                  <a onclick="acceptDomain('<?php echo e($domain->id); ?>')" class="btn btn_icon" name="approve_domain_go" id="approve_domain_go" style="font-size: 14px; padding: 5px; min-width: 260px; margin-left: 50px;">
                    Согласовать все данные с ЭЦП
                  </a>
                  <button type="submit" class="btn btn_icon" name="discart_domain_go" id="discart_domain_go" style="font-size: 14px; padding: 5px; min-width: 210px; margin-left: 10px; background: #b90404;">
                    Отклонить все данные
                  </button>
                  <?php endif; ?>


                </h2>
              </form>


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
                    <?php $__currentLoopData = \App\Models\DomainObjectCollection::domainObjectsGo($domain->id, 'Физ.лицо'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $__currentLoopData = \App\Models\DomainObjectCollection::domainObjectsGo($domain->id, 'Юр.лицо (организация)'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $__currentLoopData = \App\Models\DomainObjectCollection::domainObjectsGo($domain->id, 'Объект'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $__currentLoopData = \App\Models\DomainObjectCollection::domainObjectsGo($domain->id, 'Документ'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  function getDateObject(selectObject, div) {

    var id = selectObject.value;
    var token = $("input[name='_token']").val();
    var info_div = document.getElementById(div);
    info_div.innerHTML = '<b>Информация о данных:</b><br><br>';

    $.ajax({
      url: "<?php echo e(route('etalondatas.getinfogo')); ?>",
      method: 'POST',
      data: {
        _id: id,
        _token: token
      },
      success: function(data) {
        info_div.innerHTML = '<p>' + data.options + '</b></p>';
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




<script>
function acceptDomain(domain_id) {

  var errorBox = document.getElementById("error_sign_box");
  var successBox = document.getElementById("success_sign_box");

  errorBox.style.display = "none";
  successBox.style.display = "none";

  var webSocket = new WebSocket('wss://127.0.0.1:13579/');
  var callback = null;

  webSocket.onopen = function (event) {
    console.log("Соединение открыто...");
    getKeyInfo("PKCS12", this);
  };

  webSocket.onclose = function (event) {
    if (event.wasClean) {
      console.log('Соединение было закрыто');
    } else {
      console.log('Ошибка соединения');
      errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
      errorBox.style.display = "block";
      successBox.style.display = "none";
    }
    console.log('Код: ' + event.code + ' Причина: ' + event.reason);
  };


  webSocket.onmessage = function (event) {
    
    var result = JSON.parse(event.data);
    var token = $("input[name='_token']").val();
 
    
    if(result.responseObject) {
      var dataecp = result.responseObject;

      console.log(dataecp);


      $.ajax({
        url: "<?php echo e(route('etalondatas.agreement.signecpgo')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
          _verify: dataecp,
          _token: token,
          _domain_id: domain_id,
        },
        success: function(data) {
          successBox.innerHTML = data.options;
          successBox.style.display = "block";
          errorBox.style.display = "none";
        }
      });

    }

  };


  function getKeyInfo(storageName, callBack) {
      var getKeyInfo = {
      "module": "kz.gov.pki.knca.commonUtils",
          "method": "getKeyInfo",
          "args": [storageName]
      };
      callback = callBack;
      webSocket.send(JSON.stringify(getKeyInfo));
      console.log('Хранилище определено как ' + storageName);
  }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/etalondata/agreement.blade.php ENDPATH**/ ?>