<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="content mx-5 my-5">
            <form class="" action="<?php echo e(action('AdditionsToBaseController@destroy')); ?>" method="POST">

                <?php echo e(csrf_field()); ?>


                <div class="col-0 my-3">
                    <label for="table" class="sr-only">Таблица</label>
                    <input type="text" readonly class="form-control-plaintext" id="table" value="Cписок таблиц">
                </div>
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" multiple="multiple" name="elements[]" data-width="100%">
                    <option disabled>Выберите данные</option>
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($select_table.$key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="col my-5">
                    <button type="submit" class="btn btn-block btn-dark">Удалить</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('select-table-for-remove-from-base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\Coursework\resources\views/remove-from-base.blade.php ENDPATH**/ ?>