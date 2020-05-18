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
    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    ##parent-placeholder-c63e3c1cfa2ff651ad4cfadea3e21265ffcf8ca3##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="" align="center">
        <form action="<?php echo e(action('PublicationPlanController@index')); ?>" method="GET" class="">

            <?php echo e(csrf_field()); ?>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по кафедре</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="select_chair" data-width="100%">
                            <option disabled>Выберите метод сортировки</option>
                            <option value="-1">Любая кафедра</option>
                            <?php $__currentLoopData = $chairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->id == $select_chair): ?>
                                    <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_chair); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_chair); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по дисциплине</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="select_discipline" data-width="100%">
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
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по статусу наличия</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="select_status" id="inlineFormCustomSelect" data-width="100%">
                            <option disabled>Выберите авторов</option>
                            <option selected value="-1">Любой статус</option>
                            <?php if($select_status == 0): ?>
                                <option selected value="0">Не выпущена</option>
                                <option value="1">Выпущена</option>
                            <?php elseif($select_status == 1): ?>
                                <option value="0">Не выпущена</option>
                                <option selected value="1">Выпущена</option>
                            <?php else: ?>
                                <option value="0">Не выпущена</option>
                                <option value="1">Выпущена</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по году выпуска</label>
                        <div class="row-fluid">
                            <?php if($select_year != null): ?>
                                <input class="form-control" type="text" name="select_year" placeholder="Год выпуска"
                                       value="<?php echo e($select_year); ?>" }}>
                            <?php else: ?>
                                <input class="form-control" type="text" name="select_year" placeholder="Год выпуска" }}>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по виду издания</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="select_type"
                                data-width="100%">
                            <option disabled>Выберите метод сортировки</option>
                            <option value="-1">Любой вид издания</option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->id == $select_type): ?>
                                    <option selected
                                            value="<?php echo e($value->id); ?>"><?php echo e($value->type_publication_name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->type_publication_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по авторам</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="select_author" id="inlineFormCustomSelect" data-width="100%">
                            <option disabled>Выберите авторов</option>
                            <option selected value="-1">Любой автор</option>
                            <?php $__currentLoopData = $autors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->id == $select_author): ?>
                                    <option selected
                                            value="<?php echo e($value->id); ?>"><?php echo e($value->last_name); ?> <?php echo e($value->name); ?> <?php echo e($value->middle_name); ?></option>
                                <?php else: ?>
                                    <option
                                        value="<?php echo e($value->id); ?>"><?php echo e($value->last_name); ?> <?php echo e($value->name); ?> <?php echo e($value->middle_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-dark my-5">Отфильтровать</button>
        </form>


        <table class="table table-bordered table-hover my-5">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="align-middle text-center">Кафедра</th>
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
                <th scope="col" class="align-middle text-center">Уже выпущена</th>
                <th scope="col" class="align-middle text-center">Кнопки управления</th>
            </tr>
            </thead>
            <tbody>
            <?php if($plans != null): ?>
                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($value->name_of_chair); ?></td>
                        <td><?php echo e($value->name_of_discipline); ?></td>
                        <td><?php echo e($value->type_publication_name); ?></td>
                        <td><?php echo e($value->name_of_publication); ?></td>
                        <td><?php echo e($value->authors); ?></td>
                        <td><?php echo e($value->format_name); ?></td>
                        <td><?php echo e($value->number_of_pages); ?></td>
                        <td><?php echo e($value->number_of_copies); ?></td>
                        <td><?php echo e($value->cover_type); ?></td>
                        <td><?php echo e($value->month_name); ?></td>
                        <td><?php echo e($value->year_of_publication); ?></td>
                        <td><?php echo e($value->phone_number); ?></td>
                        <td>
                            <?php if($value->is_release == 1): ?>
                                Да
                            <?php else: ?>
                                Нет
                            <?php endif; ?>
                        </td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                                <!-- edit this plans (uses the edit method found at GET /plans/{id}/edit -->
                                <a class="btn btn-block btn-outline-secondary"
                                   href="/plans/<?php echo e($value->id); ?>/edit">Редактировать</a>

                                <!-- delete the plans (uses the destroy method DESTROY /plans/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->
                                <form action="<?php echo e(action('PublicationPlanController@destroy', $value->id)); ?>" method="POST">

                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo e(csrf_field()); ?>


                                    <button class="btn btn-block btn-outline-secondary" type="submit">Удалить</button>
                                </form>
                            <?php if($value->filePath != 'none'): ?>
                                <a class="btn btn-block btn-outline-secondary" href="<?php echo e($value->filePath); ?>">Открыть файл в браузере</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="alert alert-danger">Произошла ошибка! Пользователь не опознан как автор! Пожайлуста обратитесь к администратору, чтобы задать соответствие между пользователем и автором</div>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\Coursework\resources\views/plans/index.blade.php ENDPATH**/ ?>