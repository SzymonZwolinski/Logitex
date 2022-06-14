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
                        <h2>Kreator zamówień</h2>
						<h3>Krok 1: Wybierz naczepę</h3>
                    </div>
                    
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

                                            <input type="button" value="Wybierz" onclick=" loadtrailer(<?php echo e($item->id); ?>,<?php echo e($item->szerokosc); ?>,<?php echo e($item->dlugosc); ?>,<?php echo e($item->wysokosc); ?>,<?php echo e($item->waga); ?> )">

                                            <a href="<?php echo e(url('/trailers/' . $item->id)); ?>" title="View Trailer"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            
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
<a href="<?php echo e(url('/')); ?>"><button type="button" name="nawrota" value="nawrota" >Powrót do menu</button></a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('trailers.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xamp\htdocs\Logitex\resources\views/trailers/index.blade.php ENDPATH**/ ?>