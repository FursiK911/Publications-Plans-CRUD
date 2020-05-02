<!-- app/views/plans/create.blade.php -->


<?php $__env->startSection('head'); ?>
    ##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <title>Новое издание</title>
    <link rel="stylesheet" href="css/create.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_content'); ?>
    <h1 class="text-center">Новое издание</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message'); ?>
    <!-- will be used to show any messages -->
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
        <div class="content mx-5">
        <form action="<?php echo e(action('PublicationPlanController@store')); ?>" method="POST">

            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label class="">Кафедра</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="chair_id" data-width="100%">
                        <option disabled>Выберите дисциплину</option>
                        <?php $__currentLoopData = $chairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_chair); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="">Дисциплина</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="discipline_id" data-width="100%">
                        <option disabled>Выберите дисциплину</option>
                        <?php $__currentLoopData = $disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_discipline); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Вид издания</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="type_publication_id" data-width="100%">
                        <option disabled>Выберите вид издания</option>
                        <?php $__currentLoopData = $type_publication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->type_publication_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="namePublication">Название публикации</label>
                <input class="form-control" id="namePublication" type="text" name="name_of_publication" placeholder="Название публикации">
            </div>

            <div class="form-group">
                <label>Автор</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="author_id[]" multiple="multiple" data-width="100%">
                        <option disabled>Выберите автора</option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <small id="autorsHelp" class="form-text text-muted">Вы можете выбрать несколько авторов.</small>
                </div>
            </div>

                <div class="form-group">
                    <label>Формат бумаги</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="paper_size_id" data-width="100%">
                            <option disabled>Выберите формат бумаги</option>
                            <?php $__currentLoopData = $papers_size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->format_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="numberPages">Кл-во страниц</label>
                    <input class="form-control" type="text" name="number_of_pages" id="numberPages" placeholder="Количество страниц">
                </div>

                <div class="form-group">
                    <label for="numberCopies">Тираж</label>
                    <input class="form-control" type="text" name="number_of_copies" id="numberCopies" placeholder="Тираж">
                </div>

                <div class="form-group">
                    <label>Обложка</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cover_id" data-width="100%">
                            <option disabled>Выберите обложку</option>
                            <?php $__currentLoopData = $cover; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->cover_type); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Месяц выпуска</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="month_of_submission_id" data-width="100%">
                            <option disabled>Выберите месяц</option>
                            <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->month_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

            <div class="form-group">
                <label>Год выпуска</label>
                <div class="row-fluid">
                    <input class="form-control" type="text" name="year_of_publication" placeholder="Год выпуска">
                </div>
            </div>

                <div class="form-group">
                    <label for="numberPhone">Номер телефона</label>
                    <input class="form-control" type="text" name="phone_number" id="numberPhone" placeholder="Номер телефона">
                </div>
                <button type="submit" class="btn btn-block btn-dark my-5">Создать</button>
        </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\Coursework\resources\views/plans/create.blade.php ENDPATH**/ ?>