<?php $__env->startSection('head'); ?>
    ##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <link rel="stylesheet" href="css/index.css">
    <title>Обновить информацию в таблицу</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_content'); ?>
    <h1 class="text-center my-3">Обновить информацию в таблицу</h1>
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
            <form class="" action="<?php echo e(action('AdditionsToBaseController@update')); ?>" method="POST">

                <?php echo e(csrf_field()); ?>


                <div class="form-row">
                    <div class="col-6 my-3">
                        <input class="hideForm form-control" type="text" name="id" value="<?php echo e($id); ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 my-3">
                        <input class="hideForm form-control" type="text" name="select_data" value="<?php echo e($select_data); ?>" readonly>
                    </div>
                </div>
                <?php switch($select_data):
                    case ('discipline'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="discipline" placeholder="Название дисциплины" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('type_publication'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="type_publication" placeholder="Название вида издания" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('user'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="user_email" placeholder="Email" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="password" name="user_password" placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="password" name="user_password_confirm" placeholder="Подтверждение пароля">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="user_last_name" placeholder="Фамилия" value="<?php echo e($data[1]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="user_name" placeholder="Имя" value="<?php echo e($data[2]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="user_middle_name" placeholder="Отчество" value="<?php echo e($data[3]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('author'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="author_last_name" placeholder="Фамилия" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="author_name" placeholder="Имя" value="<?php echo e($data[1]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="author_middle_name" placeholder="Отчество" value="<?php echo e($data[2]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('chair'): ?>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="chair" placeholder="Название кафедры" value="<?php echo e($data[0]); ?>">
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