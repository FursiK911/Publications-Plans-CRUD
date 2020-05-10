<!-- app/views/plans/create.blade.php -->


<?php $__env->startSection('head'); ?>
    ##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <title>Обновить издание</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_content'); ?>
    <h1 class="text-center">Обновить издание</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message'); ?>
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
            <form action="<?php echo e(action('PublicationPlanController@update', $plan->id)); ?>" enctype="multipart/form-data" method="POST">

                <?php echo method_field('PATCH'); ?>
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label>Кафедра</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="chair_id"
                                data-width="100%">
                            <option disabled>Выберите кафедру</option>
                            <?php $__currentLoopData = $chairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->id == $plan->chair_id): ?>
                                    <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_chair); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_chair); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Дисциплина</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="discipline_id" data-width="100%">
                            <option disabled>Выберите дисциплину</option>
                            <?php $__currentLoopData = $disciplines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->id == $plan->discipline_id): ?>
                                    <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_discipline); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name_of_discipline); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Вид издания</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="type_publication_id" data-width="100%">
                            <option disabled>Выберите вид издания</option>
                            <?php $__currentLoopData = $type_publication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->id == $plan->type_publication_id): ?>
                                    <option selected
                                            value="<?php echo e($value->id); ?>"><?php echo e($value->type_publication_name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->type_publication_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="namePublication">Название публикации</label>
                    <input class="form-control" id="namePublication" type="text" name="name_of_publication"
                           value="<?php echo e($plan->name_of_publication); ?>">
                </div>

                <div class="form-group">
                    <label>Автор</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="author_id[]"
                                multiple="multiple" data-width="100%">
                            <option disabled>Выберите автора</option>
                            <?php for($i = 0; $i < count($selected_authors); $i++): ?>
                                <?php $__currentLoopData = $selected_authors[$i]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option selected
                                            value="<?php echo e($author->id); ?>"><?php echo e($author->last_name); ?> <?php echo e($author->name); ?> <?php echo e($author->middle_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endfor; ?>
                            <?php for($i = 0; $i < count($unselected_authors); $i++): ?>
                                <?php $__currentLoopData = $unselected_authors[$i]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($author->id); ?>"><?php echo e($author->last_name); ?> <?php echo e($author->name); ?> <?php echo e($author->middle_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Формат бумаги</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="paper_size_id" data-width="100%">
                            <option disabled>Выберите формат бумаги</option>
                            <?php $__currentLoopData = $papers_size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->id == $plan->paper_size_id): ?>
                                    <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->format_name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->format_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="numberPages">Кл-во страниц</label>
                    <input class="form-control" type="text" name="number_of_pages" type="text" name="number_of_pages"
                           value="<?php echo e($plan->number_of_pages); ?>">
                </div>

                <div class="form-group">
                    <label for="numberCopies">Тираж</label>
                    <input class="form-control" type="text" name="number_of_copies" id="numberCopies"
                           value="<?php echo e($plan->number_of_copies); ?>">
                </div>

                <div class="form-group">
                    <label>Обложка</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cover_id"
                                data-width="100%">
                            <option disabled>Выберите обложку</option>
                            <?php $__currentLoopData = $cover; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->id == $plan->cover_id): ?>
                                    <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->cover_type); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->cover_type); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Месяц выпуска</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="month_of_submission_id" data-width="100%">
                            <option disabled>Выберите месяц</option>
                            <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->id == $plan->month_of_submission_id): ?>
                                    <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->month_name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->month_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Год выпуска</label>
                    <div class="row-fluid">
                        <input class="form-control" type="text" name="year_of_publication"
                               value="<?php echo e($plan->year_of_publication); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="numberPhone">Номер телефона</label>
                    <input class="form-control" type="text" name="phone_number" id="numberPhone"
                           value="<?php echo e($plan->phone_number); ?>">
                </div>

                <div class="form-group">
                    <label>Выпущено ли издание</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="is_release"
                                data-width="100%">
                            <option disabled>Выберите один из вариантов</option>
                            <?php if($plan->is_release == 1): ?>
                                <option selected value="1">Да</option>
                                <option value="0">Нет</option>
                            <?php else: ?>
                                <option selected value="0">Нет</option>
                                <option value="1">Да</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Файл издания</label>
                    <div class="file-field">
                        <div class="btn btn-dark btn-sm float-left">
                            <span>Выберите файл методического издания</span>
                            <input type="file" name="doc_file" accept="application/msword,.docx">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-block btn-dark my-5">Обновить</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\Coursework\resources\views/plans/edit.blade.php ENDPATH**/ ?>