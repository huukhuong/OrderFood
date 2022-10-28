<?php if($paginator->lastPage() > 1): ?>

    <ul class="pagination">
        <li class="<?php echo e($paginator->currentPage() == 1 ? ' disabled' : ''); ?>">
            <a class="paginate-link" href="<?php echo e($paginator->url(1)); ?>">
                <i class="fas fa-angle-double-left"></i>
            </a>
        </li>
        <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>
            <li class="<?php echo e($paginator->currentPage() == $i ? ' active' : ''); ?>">
                <a class="paginate-link" href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a>
            </li>

        <?php endfor; ?>
        <li class="<?php echo e($paginator->currentPage() == $paginator->lastPage() ? ' disabled' : ''); ?>">
            <a class="paginate-link" href="<?php echo e($paginator->url($paginator->currentPage() + 1)); ?>">
                <i class="fas fa-angle-double-right"></i>
            </a>
        </li>
    </ul>
<?php endif; ?>
<?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/client/components/paginate.blade.php ENDPATH**/ ?>