<?php $__env->startSection('head'); ?>
    ##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <link rel="stylesheet" href="css/index.css">
    <title>Таблица публикаций</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_content'); ?>
    <h1 class="text-center my-3">Список учебных и справочных изданий</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message'); ?>
    <!-- will be used to show any messages -->
    <?php if(Session::has('message')): ?>
        <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    ##parent-placeholder-c63e3c1cfa2ff651ad4cfadea3e21265ffcf8ca3##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="" align="center">
        <form action="<?php echo e(action('PublicationPlanController@index')); ?>" method="GET" class="">

            <?php echo e(csrf_field()); ?>


            <div class="form-row">
                <div class="col-3 mx-5">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по году выпуска</label>
                        <div class="row-fluid">
                            <?php if($select_year != null): ?>
                                <input class="form-control" type="text" name="select_year" placeholder="Год выпуска" value="<?php echo e($select_year); ?>"}}>
                            <?php else: ?>
                                <input class="form-control" type="text" name="select_year" placeholder="Год выпуска"}}>
                            <?php endif; ?>
                        </div>
                 </div>
                <div class="col-5 mx-2">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по дисциплине</label>
                    <br>
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="select_discipline" data-width="100%">
                        <option disabled>Выберите метод сортировки</option>
                        <option value="-1">Любая дисциплина</option>
                        <?php $__currentLoopData = $disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->id == $select_discipline): ?>
                                <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_discipline); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_discipline); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-2 mx-2">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по авторам</label>
                    <br>
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="select_author" id="inlineFormCustomSelect" data-width="100%">
                        <option disabled>Выберите авторов</option>
                        <option selected value="-1">Любой автор</option>
                        <?php $__currentLoopData = $autors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->id == $select_author): ?>
                                <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-dark my-5">Отфильтровать</button>
        </form>


        <table class="table table-bordered table-hover my-5">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="align-middle text-center">Дисциплина</th>
                <th scope="col" class="align-middle text-center">Вид издания</th>
                <th scope="col" class="align-middle text-center">Название публикации</th>
                <th scope="col" class="align-middle text-center">Автор</th>
                <th scope="col" class="align-middle text-center">Формат бумаги</th>
                <th scope="col" class="align-middle text-center">Кл-во страниц</th>
                <th scope="col" class="align-middle text-center">Тираж</th>
                <th scope="col" class="align-middle text-center">Обложка</th>
                <th scope="col" class="align-middle text-center">Месяц выпуска</th>
                <th scope="col" class="align-middle text-center">Год выпуска</th>
                <th scope="col" class="align-middle text-center">Телефонный номер</th>
                <th scope="col" class="align-middle text-center">Кнопки управления</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($select_year != null && $value->year_of_publication != $select_year): ?>
                    <?php continue; ?>
                <?php endif; ?>
                <?php if($select_discipline != null && $select_discipline != -1 && $value->discipline_id != $select_discipline): ?>
                    <?php continue; ?>
                <?php endif; ?>

                <tr>
                    <td><?php echo e($value->name_of_discipline); ?></td>
                    <td><?php echo e($value->type_publication_name); ?></td>
                    <td><?php echo e($value->name_of_publication); ?></td>
                    <td>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($val->plan_id == $value->id): ?>
                                <?php echo e($val->name); ?> <br>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($value->format_name); ?></td>
                    <td><?php echo e($value->number_of_pages); ?></td>
                    <td><?php echo e($value->number_of_copies); ?></td>
                    <td><?php echo e($value->cover_type); ?></td>
                    <td><?php echo e($value->month_name); ?></td>
                    <td><?php echo e($value->year_of_publication); ?></td>
                    <td><?php echo e($value->phone_number); ?></td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- edit this plans (uses the edit method found at GET /plans/{id}/edit -->
                        <a class="btn btn-block btn-outline-secondary" href="/plans/<?php echo e($value->id); ?>/edit">Редактировать</a>

                        <!-- delete the plans (uses the destroy method DESTROY /plans/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        <form action="<?php echo e(action('PublicationPlanController@destroy', $value->id)); ?>" method="POST">

                            <?php echo method_field('DELETE'); ?>
                            <?php echo e(csrf_field()); ?>


                            <button class="btn btn-block btn-outline-secondary" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\Coursework\resources\views/plans/index.blade.php ENDPATH**/ ?>