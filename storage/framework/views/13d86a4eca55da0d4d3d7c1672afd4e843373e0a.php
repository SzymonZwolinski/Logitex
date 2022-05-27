
<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="<?php echo e(url('trailers/' .$trailers->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

        <?php echo method_field("PATCH"); ?>
        <input type="hidden" name="id" id="id" value="<?php echo e($trailers->id); ?>" id="id" />
        <label>kubatura</label></br>
        <input type="number" name="kubatura" id="kubatura" value="<?php echo e($trailers->kubatura); ?>" class="form-control"></br>
        <label>waga</label></br>
        <input type="number" name="waga" id="waga" value="<?php echo e($trailers->waga); ?>" class="form-control"></br>
        <label>liczba_osi</label></br>
        <input type="number" name="liczba_osi" id="liczba_osi" value="<?php echo e($trailers->liczba_osi); ?>" class="form-control"></br>
        <label>szerokosc</label></br>
        <input type="number" name="szerokosc" id="szerokosc" value="<?php echo e($trailers->szerokosc); ?>" class="form-control"></br>
        <label>dlugosc</label></br>
        <input type="number" name="dlugosc" id="dlugosc" value="<?php echo e($trailers->dlugosc); ?>" class="form-control"></br>
        <label>wysokosc</label></br>
        <input type="number" name="wysokosc" id="wysokosc" value="<?php echo e($trailers->wysokosc); ?>" class="form-control"></br>
        <label>dostepnosc</label></br>
        <input type="number" name="dostepnosc" id="dostepnosc" value="<?php echo e($trailers->dostepnosc); ?>" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('trailers.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xamp\htdocs\Logitex\resources\views/trailers/edit.blade.php ENDPATH**/ ?>