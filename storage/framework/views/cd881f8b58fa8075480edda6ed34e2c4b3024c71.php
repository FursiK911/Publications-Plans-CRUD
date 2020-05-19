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
                    <div class="col-12 my-3">
                        <input class="hideForm form-control" type="text" name="id" value="<?php echo e($id); ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 my-3">
                        <input class="hideForm form-control" type="text" name="select_data" value="<?php echo e($select_data); ?>" readonly>
                    </div>
                </div>
                <?php switch($select_data):
                    case ('discipline'): ?>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="discipline" placeholder="Название дисциплины" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('type_publication'): ?>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="type_publication" placeholder="Название вида издания" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('user'): ?>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="user_email" placeholder="Email" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="password" name="user_password" placeholder="Пароль">
                            <small id="autorsHelp" class="form-text text-muted">Если вы не хотите обновлять пароль, оставьте поля с паролями пустыми</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="password" name="user_password_confirm" placeholder="Подтверждение пароля">
                        </div>
                    </div>
                    <div id="table_combobox_2">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="type_user" data-width="100%">
                            <option disabled>Выдайте роль пользователю</option>

                            <?php if($data[4] == 'user'): ?>
                                <option selected value="user">Пользователь</option>
                            <?php else: ?>
                                <option value="user">Пользователь</option>
                            <?php endif; ?>

                            <?php if($data[4] == 'moderator'): ?>
                                <option selected value="moderator">Модератор</option>
                            <?php else: ?>
                                <option value="moderator">Модератор</option>
                            <?php endif; ?>

                            <?php if($data[4] == 'administrator'): ?>
                                <option selected value="administrator">Администратор</option>
                            <?php else: ?>
                                <option value="administrator">Администратор</option>
                            <?php endif; ?>
                        </select>
                        <small id="autorsHelp" class="form-text text-muted">Это поле отображает, какие права будут выданы пользователю</small>
                    </div>
                    <div id="table_combobox_3">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="user_author" data-width="100%">
                            <option disabled>Поставьте соответствие с автором</option>
                            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($select_author->author_id == $value->id): ?>
                                    <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->last_name . ' ' . $value->name . ' ' . $value->middle_name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->last_name . ' ' . $value->name . ' ' . $value->middle_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small id="autorsHelp" class="form-text text-muted">Данное поле ставит соответствие с автором. Пользователь без прав администратора или модератора может редактировать только свои методические издания</small>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="add_new_authors" name="add_new_authors">
                        <label class="form-check-label" for="exampleCheck1">Создать нового автора для этого пользователя</label>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="user_last_name" placeholder="Фамилия" value="<?php echo e($data[1]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="user_name" placeholder="Имя" value="<?php echo e($data[2]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="user_middle_name" placeholder="Отчество" value="<?php echo e($data[3]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('author'): ?>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="author_last_name" placeholder="Фамилия" value="<?php echo e($data[0]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="author_name" placeholder="Имя" value="<?php echo e($data[1]); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="author_middle_name" placeholder="Отчество" value="<?php echo e($data[2]); ?>">
                        </div>
                    </div>
                    <?php break; ?>
                    <?php case ('chair'): ?>
                    <div class="form-row">
                        <div class="col-12 my-3">
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

<?php $__env->startSection('script'); ?>
    ##parent-placeholder-cb5346a081dcf654061b7f897ea14d9b43140712##
    <script src="<?php echo e(asset('js/update-base.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\Coursework\resources\views/update-base.blade.php ENDPATH**/ ?>