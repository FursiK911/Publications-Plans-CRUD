<?php $__env->startSection('head'); ?>
    ##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <link rel="stylesheet" href="css/index.css">
    <title>Обновить информацию в таблицу</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_content'); ?>
    <h1 class="text-center my-3">Обновить информацию в таблицу</h1>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="content mx-5 my-5">
            <form class="" action="<?php echo e(action('AdditionsToBaseController@update')); ?>" method="POST">

                <?php echo e(csrf_field()); ?>


                <div class="form-row">
                    <div class="col-6 my-3">
                        <input class="form-control" type="text" name="id" value="ID = <?php echo e($id); ?>"disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 my-3">
                        <input class="form-control" type="text" name="select_data" value="Table = <?php echo e($select_data); ?>"disabled>
                    </div>
                </div>
                <?php switch($select_data):
                    case ('discipline'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Название дисциплины" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('type_publication'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Название вида издания" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('user'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Email" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="password" name="data" placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="password" name="data" placeholder="Подтверждение пароля">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Фамилия" value="<?php echo e($data[1]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Имя" value="<?php echo e($data[2]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Отчество" value="<?php echo e($data[3]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('author'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Фамилия" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Имя" value="<?php echo e($data[1]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Отчество" value="<?php echo e($data[2]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('chair'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Название кафедры" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                <?php endswitch; ?>
                <button type="submit" class="btn btn-dark mb-2">Обновить</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('select-table-for-update-base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\Coursework\resources\views/update-base.blade.php ENDPATH**/ ?>