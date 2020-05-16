<!-- app/views/plans/layouts.blade.php -->

<!DOCTYPE html>
<html>
<head>
<?php $__env->startSection('head'); ?>
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">

        <!-- For footer -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?php echo e(asset('css/layout.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldSection(); ?>
</head>
<body>
<?php $__env->startSection('navbar'); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo e(url('plans')); ?>">
            <img class="img_logo" src="<?php echo e(asset('img/logo.png')); ?>" width="50" height="50" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <label class="btn btn-secondary">
                        <a class="nav-link" href="<?php echo e(url('plans')); ?>">Просмотреть все издания</a>
                    </label>
                </li>
                <li class="nav-item">
                    <label class="btn btn-secondary">
                        <a class="nav-link" href="<?php echo e(url('/plans/create')); ?>">Новое издание</a>
                    </label>
                </li>
                <?php if(auth()->check() && auth()->user()->hasRole('administrator')): ?>
                <li class="nav-item dropdown">
                    <label class="btn btn-secondary" href="#" id="navbarDropdown" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                        <a class="nav-link dropdown-toggle">Сформировать отчёт</a>
                    </label>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="<?php echo e(asset('report_chair')); ?>">По кафедрам</a>
                        <a class="dropdown-item" href="<?php echo e(asset('report_type_publication')); ?>">По видам изданий</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <label class="btn btn-secondary" href="#" id="navbarDropdown" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                        <a class="nav-link dropdown-toggle">Взаимодействия с базой</a>
                    </label>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="<?php echo e(asset('add-to-base')); ?>">Добавить в базу</a>
                        <a class="dropdown-item" href="<?php echo e(asset('select-table-for-update-base')); ?>">Обновить в базе</a>
                        <a class="dropdown-item" href="<?php echo e(asset('select-table-for-remove-from-base')); ?>">Удалить из
                            базы</a>
                    </div>
                </li>
                <?php endif; ?>
                <?php if(Route::has('login')): ?>
                    <div class="top-right links">
                        <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item">
                                <label class="btn btn-secondary">
                                    <form action="<?php echo e(action('LogoutController@logout')); ?>">
                                        <a class="nav-link" href="<?php echo e(route('logout')); ?>">Выйти</a>
                                    </form>
                                </label>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <label class="btn btn-secondary">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Войти</a>
                                </label>
                            </li>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if(Auth::user() != null): ?>
                    <div class="top-right links">
                        <li class="nav-item">
                            <label class="btn btn-secondary">
                                <a class="nav-link" href="">Вы зашли под именем <?php echo e(\Illuminate\Support\Facades\Auth::user()->last_name); ?> <?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?> <?php echo e(\Illuminate\Support\Facades\Auth::user()->middle_name); ?>

                                </a>
                            </label>
                        </li>
                    </div>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
<?php echo $__env->yieldSection(); ?>

<?php echo $__env->yieldContent('message'); ?>

<?php echo $__env->yieldContent('title_content'); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php $__env->startSection('footer'); ?>
    <footer>
        <div class="container-fluid bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row py-0">
                            <div class="col-sm-11 text-white">
                                <div><h4> Автоматизированная система учета и мониторинга методической деятельности
                                        физико-технического факультета</h4>
                                    <p><a class="footer_link header-font" href="http://www.donnu.ru/phys/kt">http://donnu.ru/phys</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="d-inline-block mx-5">
                            <div class="bg-circle-outline d-inline-block mx-5" style="background-color:#fff">
                                <a class="btn btn-social-icon btn-lg btn-vk" href="https://vk.com/fcl_phys">
                                    <span class="fa fa-vk"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <blockquote class="blockquote mb-10">
        <footer class="blockquote-footer text-right">Работа студента 4 курса ИВТ-1 <a
                href="https://github.com/FursiK911">Фурсова Дмитрия</a></footer>
    </blockquote>
<?php echo $__env->yieldSection(); ?>
</body>

<?php $__env->startSection('script'); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/i18n/defaults-*.min.js"></script>
<?php echo $__env->yieldSection(); ?>

</html>
<?php /**PATH W:\domains\Coursework\resources\views/layouts/layout.blade.php ENDPATH**/ ?>