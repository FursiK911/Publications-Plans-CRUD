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

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="content mx-5 my-5">
            <form class="" action="<?php echo e(action('AdditionsToBaseController@destroy')); ?>" method="POST">

                <?php echo e(csrf_field()); ?>


                <div class="col-0 my-3">
                    <label for="table_combobox" class="sr-only">Cписок таблиц</label>
                    <select id="table_combobox" class="selectpicker" data-show-subtext="true" data-live-search="true" name="select_table" data-width="100%">
                        <option disabled>Выберите таблицу</option>
                        <option value="chair">Кафедра</option>
                        <option value="discipline">Дисциплина</option>
                        <option value="type_publication">Вид издания</option>
                        <option value="author">Автор</option>
                        <option value="user">Пользователь</option>
                    </select>
                </div>
                <div class="col-0 my-3">
                    <div id="additional_block">
                        <select id="table_combobox_2" class="selectpicker" data-show-subtext="true" data-live-search="true" name="id" data-width="100%">
                        </select>
                        <small id="autorsHelp" class="form-text text-muted">ВНИМАНИЕ! Все связанные публикации с этими данными будут удалены</small>
                    </div>
                </div>
                <div class="col my-5">
                    <button type="submit" class="btn btn-block btn-dark">Далее</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    ##parent-placeholder-cb5346a081dcf654061b7f897ea14d9b43140712##
    <script src="<?php echo e(asset('js/update_table.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\Coursework\resources\views/select-table-for-remove-from-base.blade.php ENDPATH**/ ?>