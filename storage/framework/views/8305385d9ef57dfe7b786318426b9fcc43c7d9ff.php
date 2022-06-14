<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">Podgląd informacji o naczepie</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title"> kubatura: <?php echo e($trailers->kubatura); ?></h5>
        <p class="card-text">waga : <?php echo e($trailers->waga); ?></p>
        <p class="card-text">liczba_osi : <?php echo e($trailers->liczba_osi); ?></p>
        <p class="card-text">szerokosc : <?php echo e($trailers->szerokosc); ?></p>
        <p class="card-text">dlugosc : <?php echo e($trailers->dlugosc); ?></p>
        <p class="card-text">wysokosc : <?php echo e($trailers->wysokosc); ?></p>
        <p class="card-text">Dostepnosc : <?php echo e($trailers->dostepnosc); ?></p>
  </div>
      
    </hr>
  
  </div>
</div>
<a href="<?php echo e(url('/trailers')); ?>"><button type="button" name="nawrota" value="nawrota" >Powrót do wyboru naczep</button></a>

<?php echo $__env->make('trailers.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xamp\htdocs\Logitex\resources\views/trailers/show.blade.php ENDPATH**/ ?>