
<?php $__env->startSection('content'); ?>
<head>
    <!-- Head Contents -->
    <script src="../../js/aframeload.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 Crud</h2>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/trailers/create')); ?>" class="btn btn-success btn-sm" title="Add New Trailer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>kubatura</th>
                                        <th>waga</th>
                                        <th>liczba_osi</th>
                                        <th>szerokosc</th>
                                        <th>dlugosc</th>
                                        <th>wysokosc</th>
                                        <th>dostepnosc</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div style="display: none">
                                <?php echo e($data = DB::table('trailers')
                                ->select('*')
                                ->where('dostepnosc','=','1')
                                ->get()); ?>

                                </div>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->kubatura); ?></td>
                                        <td><?php echo e($item->waga); ?></td>
                                        <td><?php echo e($item->liczba_osi); ?></td>
                                        <td><?php echo e($item->szerokosc); ?></td>
                                        <td><?php echo e($item->dlugosc); ?></td>
                                        <td><?php echo e($item->wysokosc); ?></td>
                                        <td><?php echo e($item->dostepnosc); ?></td>
                        
                                        <td>
                                            <input type="button" value="Wybierz" onclick=" loadtrailer(<?php echo e($item->id); ?>,<?php echo e($item->szerokosc); ?>,<?php echo e($item->dlugosc); ?>,<?php echo e($item->wysokosc); ?>,<?php echo e($item->dostepnosc); ?> )">
                                            <a href="<?php echo e(url('/trailers/' . $item->id)); ?>" title="View Trailer"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="<?php echo e(url('/trailers/' . $item->id . '/edit')); ?>" title="Edit Trailer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="<?php echo e(url('/trailers' . '/' . $item->id)); ?>" accept-charset="UTF-8" style="display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Trailer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('trailers.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xamp\htdocs\Logitex\resources\views/trailers/index.blade.php ENDPATH**/ ?>