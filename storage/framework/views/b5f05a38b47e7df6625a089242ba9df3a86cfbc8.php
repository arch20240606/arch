

<?php $__env->startSection('title'); ?><?php echo e(trans('app.d_passport')); ?>: <?php echo e(trans('app.catalog')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


<?php
if ( app()->getLocale() == "ru" ) {
  $name_go = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
  $name_go = 'name_en';
} else {
  $name_go = 'name_kz';
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
      /
      <a href="<?php echo e(route('datacatalog.index')); ?>"><?php echo e(trans('app.catalog')); ?></a>
      /
      <span><?php echo e(trans('app.d_passport')); ?></span>
    </div>

    <h1 class="page-title"><?php echo e(trans('app.catalog')); ?></h1> Согласование паспорта данных

    <?php echo $__env->make('datacatalog.index_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php if(!empty($successMsg)): ?>
      <div class="success-info"><?php echo $successMsg; ?></div>
    <?php endif; ?>

    <?php if(!empty($errorMsg)): ?>
      <div class="info-box-error"><b><?php echo e(trans('app.reg_error')); ?>:</b> <?php echo $errorMsg; ?></div>
    <?php endif; ?>



    <div class="is-info">

      <form class="form" method="POST" action="<?php echo e(route('datacatalog.update', ['datacatalog' => $passport->id])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title"><?php echo e(trans('app.dc_obshaya')); ?></h2>
          <span class="status"><b><?php echo e(trans('app.dc_prilozhenie_1')); ?></b></span>
        </div>


        <table class="table">
          <thead>
            <tr>
              <th style="width: 40%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_name_go')); ?></td>
              <td class="table__name"><?php echo e($passport->government->$name_go); ?></td>
            </tr>
            
            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_name_is')); ?></td>
              <td class="table__name"><?php echo e($passport->information_system->$name_go); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_data_used')); ?></td>
              <td class="table__name">
                <?php if( $passport->data_used == 1 ): ?>
                  <?php echo e(trans('app.dc_republic')); ?>

                <?php elseif( $passport->data_used == 2 ): ?>
                  <?php echo e(trans('app.dc_local')); ?>

                <?php else: ?>
                  <?php echo e(trans('app.no')); ?>

                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_data_enter')); ?></td>
              <td class="table__name">
                <?php if( $passport->data_enter == 1 ): ?>
                  <?php echo e(trans('app.dc_data_enter_letter')); ?>

                <?php elseif( $passport->data_enter == 2 ): ?>
                  <?php echo e(trans('app.dc_data_enter_electro')); ?>

                <?php elseif( $passport->data_enter == 3 ): ?>
                  <?php echo e(trans('app.dc_data_enter_combo')); ?>

                <?php else: ?>
                  <?php echo e(trans('app.no')); ?>

                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_data_form')); ?></td>
              <td class="table__status">
                <div class="is-checkboxes">
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" id="data_first" name="data_first" <?php if($passport->data_first == "on"): ?> checked <?php endif; ?>>
                    <span></span>
                    <p><?php echo e(trans('app.dc_data_first')); ?></p>
                  </label>
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" id="data_agregate" name="data_agregate" <?php if($passport->data_agregate == "on"): ?> checked <?php endif; ?>>
                    <span></span>
                    <p><?php echo e(trans('app.dc_data_agregate')); ?></p>
                  </label>
                </div>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_data_access')); ?></td>
              <td class="table__status">
                <div class="is-checkboxes">
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" name="data_access_only" <?php if($passport->data_access_only == "on"): ?> checked <?php endif; ?>>
                    <span></span>
                    <p><?php echo e(trans('app.dc_data_access_only')); ?></p>
                  </label>
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" name="data_access_free" <?php if($passport->data_access_free == "on"): ?> checked <?php endif; ?>>
                    <span></span>
                    <p><?php echo e(trans('app.dc_data_access_free')); ?></p>
                  </label>
                </div>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_users_npa')); ?></td>
              <td class="table__name"><?php echo e($passport->users_npa); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_data_source')); ?></td>
              <td class="table__name"><?php echo e($passport->data_source); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_data_source_fact')); ?></td>
              <td class="table__name"><?php echo e($passport->data_source_fact); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_object_description')); ?></td>
              <td class="table__name">
                <?php if( $passport->object_description == 1 ): ?>
                  <?php echo e(trans('app.dc_object_description_fiz')); ?>

                <?php elseif( $passport->object_description == 2 ): ?>
                  <?php echo e(trans('app.dc_object_description_ur')); ?>

                <?php elseif( $passport->object_description == 3 ): ?>
                  <?php echo e(trans('app.dc_object_description_imush')); ?>

                <?php elseif( $passport->object_description == 4 ): ?>
                  <?php echo e(trans('app.dc_object_description_result')); ?>

                <?php elseif( $passport->object_description == 5 ): ?>
                  <?php echo e(trans('app.dc_object_description_oxrana')); ?>

                <?php elseif( $passport->object_description == 6 ): ?>
                  <?php echo e(trans('app.dc_object_description_blaga')); ?>

                <?php else: ?>
                  <?php echo e(trans('app.no')); ?>

                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_interval_update')); ?></td>
              <td class="table__name">
                <?php if( $passport->interval_update == 1 ): ?>
                  <?php echo e(trans('app.dc_interval_update_no')); ?>

                <?php elseif( $passport->interval_update == 2 ): ?>
                  <?php echo e(trans('app.dc_interval_update_need')); ?>

                <?php elseif( $passport->interval_update == 3 ): ?>
                  <?php echo e(trans('app.dc_interval_update_data')); ?>

                <?php elseif( $passport->interval_update == 4 ): ?>
                  <?php echo e(trans('app.dc_interval_update_refresh')); ?>

                <?php elseif( $passport->interval_update == 5 ): ?>
                  <?php echo e(trans('app.dc_interval_update_npa')); ?>

                <?php else: ?>
                  <?php echo e(trans('app.no')); ?>

                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_graphic_update')); ?></td>
              <td class="table__name">
                <?php if( $passport->graphic_update == 1 ): ?>
                  <?php echo e(trans('app.dc_graphic_update_time')); ?>

                <?php elseif( $passport->graphic_update == 2 ): ?>
                  <?php echo e(trans('app.dc_graphic_update_data')); ?>

                <?php elseif( $passport->graphic_update == 3 ): ?>
                  <?php echo e(trans('app.dc_graphic_update_npa')); ?>

                <?php elseif( $passport->graphic_update == 4 ): ?>
                  <?php echo e(trans('app.dc_graphic_update_no')); ?>

                <?php else: ?>
                  <?php echo e(trans('app.no')); ?>

                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_update_rules')); ?></td>
              <td class="table__name"><?php echo e($passport->update_rules); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_geo')); ?></td>
              <td class="table__name">
                <?php if( $passport->geo == 1 ): ?>
                  <?php echo e(trans('app.yes')); ?>

                <?php else: ?>
                  <?php echo e(trans('app.no')); ?>

                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_geo_type')); ?></td>
              <td class="table__name">
                <?php if( $passport->geo_type == 1 ): ?>
                  <?php echo e(trans('app.dc_geo_type_dot')); ?>

                <?php elseif( $passport->geo_type == 2 ): ?>
                  <?php echo e(trans('app.dc_geo_type_line')); ?>

                <?php elseif( $passport->geo_type == 3 ): ?>
                  <?php echo e(trans('app.dc_geo_type_poly')); ?>

                <?php else: ?>
                  <?php echo e(trans('app.no')); ?>

                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_npa_list')); ?></td>
              <td class="table__name"><?php echo e($passport->npa_list); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_npa_list_reglament')); ?></td>
              <td class="table__name"><?php echo e($passport->npa_list_reglament); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_npa_list_rules')); ?></td>
              <td class="table__name"><?php echo e($passport->npa_list_rules); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_data_class')); ?></td>
              <td class="table__name">
                <?php if( $passport->data_class == 1 ): ?>
                  <?php echo e(trans('app.dc_data_class_1')); ?>

                <?php elseif( $passport->data_class == 2 ): ?>
                  <?php echo e(trans('app.dc_data_class_2')); ?>

                <?php elseif( $passport->data_class == 3 ): ?>
                  <?php echo e(trans('app.dc_data_class_3')); ?>

                <?php else: ?>
                  <?php echo e(trans('app.no')); ?>

                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_date_publication')); ?></td>
              <td class="table__name"><?php echo e($passport->date_publication); ?></td>
            </tr>


          </tbody>
        </table>



        <div class="is-info__header" style="margin-top: 50px;">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title"><?php echo e(trans('app.dc_life')); ?></h2>
        </div>


        <table class="table">
          <thead>
            <tr>
              <th style="width: 40%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_info_object')); ?></td>
              <td class="table__name"><?php echo e($passport->info_object); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_object_used')); ?></td>
              <td class="table__name"><?php echo e($passport->object_used); ?></td>
            </tr>

            <tr>
              <td class="table__name"><?php echo e(trans('app.dc_object_change')); ?></td>
              <td class="table__name"><?php echo e($passport->object_change); ?></td>
            </tr>

          </tbody>
        </table>


        <div class="is-info__header" style="margin-top: 50px;">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title"><?php echo e(trans('app.dc_structure')); ?></h2>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th style="width: 40%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td class="table__name"><?php echo trans('app.dc_structure_file'); ?></td>
              <td class="table__name"><a href="/storage/<?php echo e($passport->file_excel_upload); ?>"><?php echo e($passport->file_excel); ?></a></td>
            </tr>

          </tbody>
        </table>


        <div class="is-info__header" style="margin-top: 50px; margin-bottom: 25px; background-color: #0178BC;">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title" style="color: #FFFFFF;"><?php echo e(trans('app.mes_comment_finalize')); ?></h2>
        </div>

        <textarea id="comment" name="comment"><?php echo e($passport->comment); ?></textarea>



        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← <?php echo e(trans('app.but_cancel')); ?></a>
          <button class="btn" type="submit" id="passport_accepted" name="passport_accepted" style="font-size: 14px; background: #00317B;">Утвердить паспорт</button>
          <button class="btn" type="submit" id="passport_discarted" name="passport_discarted" style="font-size: 14px; background: #bc2601;"><?php echo e(trans('app.tab_send_finalized')); ?></button>
        </div>

      </form>

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
<?php echo $__env->make('layouts.search_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/datacatalog/index_agreementedit.blade.php ENDPATH**/ ?>