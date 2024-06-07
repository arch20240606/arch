

      

          
            

            
          



        


    

  



















<?php $__env->startSection('title'); ?>
    <?php echo e(__('Выбор версии документа')); ?>

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
            <a href="<?php echo e(route('expertise.index')); ?>"><?php echo e(trans('app.m_expert')); ?></a>
        </div>

        <h1 class="page-title"><?php echo e(trans('app.m_expert')); ?></h1>

        <?php echo $__env->make('expertise.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-title">Запросы на экспертизу / Техническое задание</div>

        <div class="actions">
            <?php if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')): ?>
                <a href="<?php echo e(route('expertise.create_new_version', ['expertise' => $expertise->id])); ?>" class="btn btn-primary">
                    Создать новую версию
                </a>
            <?php endif; ?>  
        </div>

        <table class="table table_expertise">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Номер версии</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $versionsTwo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $versionTwo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="table__name">
                        <?php if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')): ?>
                            <a href="<?php echo e(route('expertise.edit', ['expertise' => $expertise->expertise_id, 'version' => $versionTwo->version_number])); ?>">
                                Версия <?php echo e($versionTwo->version_number); ?>

                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('expertise.approve.info', ['id' => $expertise->expertise_id, 'version_id' => $versionTwo->version_number])); ?>">
                                Версия <?php echo e($versionTwo->version_number); ?>

                            </a>
                        <?php endif; ?>
                    </td>
                    <td class="table__status"><?php echo e($versionTwo->version_number); ?></td>
                    <td class="table__status"><?php echo e($versionTwo->created_at); ?></td>
                    <td class="table__status">Черновик</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="table__name">
                            <?php if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')): ?>
                                <a href="<?php echo e(route('expertise.edit', ['expertise' => $expertise->expertise_id, 'version' => $version->version_expertise])); ?>">
                                    Версия <?php echo e($version->version_expertise); ?>

                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('expertise.approve.info', ['id' => $expertise->expertise_id, 'version_id' => $version->version_expertise])); ?>">
                                    Версия <?php echo e($version->version_expertise); ?>

                                </a>
                            <?php endif; ?>
                        </td>
                        <td class="table__status"><?php echo e($version->version_expertise); ?></td>
                        <td class="table__status"><?php echo e($version->updated_at); ?></td>
                        <td class="table__status">Черновик</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</main>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/create_version.blade.php ENDPATH**/ ?>