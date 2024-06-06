

<?php $__env->startSection('title'); ?>Реестр бизнес-процессов<?php $__env->stopSection(); ?>

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
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      / <a href="<?php echo e(route('businessprocess.index')); ?>">Реестр бизнес-процессов</a>

    </div>

    <h1 class="page-title">Реестр бизнес-процессов</h1>

    <?php echo $__env->make('businessprocess.index_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if( session()->has('successMsg') ): ?>
    <div class="success-info"><?php echo session()->get('successMsg'); ?></div>
    <?php endif; ?>
    

    <div class="is-tab-content" data-id="1" style="display: block;">
      <div class="is-menu-navigation">
        <div class="is-menu">
          <div class="is-menu__title">
            Дорожные карты и кейсы
            <span class="is-menu__toggle">
              <svg>
                <use xlink:href="/assets/images/sprite.svg#chevron-right-small"></use>
              </svg>
            </span>
          </div>
          <ul class="is-menu__list">

            <?php $__currentLoopData = $b_roadmaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b_roadmap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <?php if( $b_roadmap->getCase($b_roadmap->id)->count() > 0 ): ?>

                <li class="is-menu__item is-menu__item_has-submenu" data-id="road_<?php echo e($b_roadmap->id); ?>">
                  <span class="is-menu__item-progress" style="color: #39C07F;"><?php echo e($b_roadmap->getCase($b_roadmap->id)->count()); ?></span>
                  <span class="is-menu__item-title"><?php echo e($b_roadmap->$names); ?></span>
                  <ul class="is-menu__item-submenu">
                    <?php $__currentLoopData = $b_roadmap->getCase($b_roadmap->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-id="case_<?php echo e($case->id); ?>"><?php echo e($case->name); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </li>

              <?php else: ?> 
                <li class="is-menu__item" data-id="road_<?php echo e($b_roadmap->id); ?>">
                  <span class="is-menu__item-progress" style="color: #39C07F;"><?php echo e($b_roadmap->getCase($b_roadmap->id)->count()); ?></span>
                  <span class="is-menu__item-title"><?php echo e($b_roadmap->$names); ?></span>
                </li>
              <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </ul>
        </div>







        <?php $__currentLoopData = $b_roadmaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b_roadmap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <?php if( $b_roadmap->getCase($b_roadmap->id)->count() > 0 ): ?>

            <?php $__currentLoopData = $b_roadmap->getCase($b_roadmap->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="is-menu-content" data-id="case_<?php echo e($case->id); ?>">
                <h2 class="is-content-title" style="margin-left: 0px;">
                  <?php echo e($case->name); ?> 
                  <a  href="<?php echo e(route('businessprocess.edit', ['businessprocess' => $case->id])); ?>">
                    <span class="systems__count" style="margin-left: 20px; padding-left: 15px; padding-right: 15px; font-weight: normal; font-size: 12px; color: #FFFFFF;">РЕДАКТИРОВАТЬ</span>
                  </a>
                </h2>
    
                <span class="is-menu__item-title">Автор кейса: <span style="color: #0075ff;"><?php echo e($case->user->surname); ?> <?php echo e($case->user->name); ?> <?php echo e($case->user->middlename); ?></span></span>
                <br>
                <span class="is-menu__item-title">Создан: <span style="color: #0075ff;"><?php echo e(date('d.m.Y в H:i:s', strtotime( $case->created_at ))); ?></span></span>
                <br><br>
                <?php
                $date_case = explode("-", $case->date);
                ?>
                <span class="is-menu__item-title">Срок контроля: <span style="color: #0075ff;"><?php echo e($date_case[0]); ?> квартал <?php echo e($date_case[1]); ?> года</span></span>
    
                <br><br><br><br>
                <h2 class="is-content-title" style="margin-left: 0px; color: #0075ff;">
                  Связанные функции и бизнес-процессы
                  <a href="<?php echo e(route('businessprocess.create_bp', ['id' => $case->id ])); ?>">
                    <span class="systems__count" style="margin-left: 20px; padding-left: 15px; padding-right: 15px; font-weight: normal; font-size: 12px; color: #FFFFFF;">СОЗДАТЬ БИЗНЕС-ПРОЦЕСС</span>
                  </a>
                </h2>
                
                <table class="table table_expertise">
                  <thead>
                    <tr>
                      <th style="padding: 16px;">Наименование функции</th>
                      <th style="text-align: left; padding: 16px;">Бизнес-процесс</th>
                      <th style="width: 76px;">AS IS</th>
                      <th style="width: 76px;">TO BE</th>
                      <th style="width: 76px;">ПЛАН</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $functs = json_decode($case->function_groups);
                    if ( !empty($functs) ) {
                      foreach ($functs as $funct) {

                        echo "<tr>";
                        echo "<td>".$b_roadmap->getFunctions($funct)->name."</td>";
                        echo '<td colspan="4" style="padding: 0px;"><table class="table"><tbody>';

                        foreach ( $b_roadmap->getProcess($funct, $case->id) as $b_proccess) {
                        ?>

                          <tr>
                            <td><a href="<?php echo e(route('businessprocess.edit_bp', ['id' => $b_proccess->id])); ?>"><?php echo e($b_proccess->name); ?></a></td>
                            <td class="table__status" style="width: 76px;">
                              <?php if($b_proccess->file_as_is): ?>
                                <a class="feather-yellow" target="_blank" href="/storage/<?php echo e($b_proccess->file_as_upload); ?>"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                              <?php else: ?>
                                
                              <?php endif; ?>
                            </td>
                            <td class="table__status" style="width: 76px;">
                              <?php if($b_proccess->file_to_be): ?>
                                <a class="feather-yellow" target="_blank" href="/storage/<?php echo e($b_proccess->file_to_be_upload); ?>"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                              <?php else: ?>
                                
                              <?php endif; ?>
                            </td>
                            <td class="table__status" style="width: 76px;">
                              <?php if($b_proccess->file_program): ?>
                                <a class="feather-yellow" target="_blank" href="/storage/<?php echo e($b_proccess->file_program_upload); ?>"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                              <?php else: ?>
                                
                              <?php endif; ?>
                            </td>
                          </tr>
                   
      
                        <?php
                        }
                        echo "</tboby></table></td>";
                        echo "</tr>";
                      }
                    }
                    ?>
                  </tbody>
                </table>

              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php else: ?> 

            <div class="is-menu-content" data-id="road_<?php echo e($b_roadmap->id); ?>">
              <h2 class="is-content-title"><?php echo e($b_roadmap->$names); ?></h2>
              <div class="info-box-error" id="error_sign_box" style="padding: 25px 20px 25px 20px;">В выбранной дорожной карте отсутствуют кейсы</div>
            </div>

          <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        


      </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/businessprocess/index.blade.php ENDPATH**/ ?>