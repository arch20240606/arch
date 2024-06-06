<?php if($paginator->hasPages()): ?>

    <div class="pagination">

        
         <?php if($paginator->onFirstPage()): ?>
            <!--
            <li class="disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                <span aria-hidden="true">&lsaquo;</span>
            </li>
            -->
        <?php else: ?>
            <a class="pagination__item" href="<?php echo e($paginator->previousPageUrl()); ?>">←</a>
            <!--
            <a class="pagination__item pagination__item_next" href="<?php echo e($paginator->previousPageUrl()); ?>">
                <svg>
                <use xlink:href="/assets/images/sprite.svg#arrow-left"></use>
                </svg>
            </a>
            -->
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <span class="pagination__item"><?php echo e($element); ?></span>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <a class="pagination__item pagination__item_active"><?php echo e($page); ?></a>
                    <?php else: ?>
                        <a class="pagination__item" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a class="pagination__item" href="<?php echo e($paginator->nextPageUrl()); ?>">→</a>
        <?php endif; ?>

    </div>

<?php endif; ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/layouts/pagination/softdeco.blade.php ENDPATH**/ ?>