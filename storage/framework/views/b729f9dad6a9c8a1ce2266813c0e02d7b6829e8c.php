<?php $__env->startSection('head'); ?>
    ##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <link rel="stylesheet" href="css/index.css">
    <title>Удалить информацию из таблицы</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_content'); ?>
    <h1 class="text-center my-3">Удалить информацию из таблицы</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message'); ?>
    <!-- will be used to show any messages -->
    <?php if(Session::has('message')): ?>
        <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="content mx-5 my-5">
            <form class="" action="<?php echo e(action('AdditionsToBaseController@select_table_remove')); ?>" method="POST">

                <?php echo e(csrf_field()); ?>


                <div class="col-0 my-3">
                    <label for="table" class="sr-only">Таблица</label>
                    <input type="text" readonly class="form-control-plaintext" id="table" value="Cписок таблиц">
                </div>
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="table" data-width="100%">
                    <option disabled>Выберите таблицу</option>
                        <option value="chair">Кафедра</option>
                        <option value="discipline">Дисциплина</option>
                        <option value="type_publication">Вид издания</option>
                        <option value="name">Автор</option>
                </select>
                <div class="col my-5">
                    <button type="submit" class="btn btn-block btn-dark">Далее</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\Coursework\resources\views/select-table-for-remove-from-base.blade.php ENDPATH**/ ?>