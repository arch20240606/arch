<?php if( $expertise->draft == 1 && $expertise->discart_go == 1 ): ?>
<div class="info-box-error">Согласующий вернул документ <b><?php echo e(date('d.m.Y в H:i:s', strtotime( $expertise->discart_go_date ))); ?></b>. Причина отклонения может быть указана в комментарии</div>
<?php endif; ?>


<h2 class="is-content-title">При необходимости укажите комментарий</h2>
<textarea class="form__field" style="min-height: 300px;" id="comment" name="comment"><?php echo e($expertise->comment_discart); ?> <?php echo e($expertise->comment_accept); ?></textarea>


<?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/expertise/tabs_data/comments_edit.blade.php ENDPATH**/ ?>