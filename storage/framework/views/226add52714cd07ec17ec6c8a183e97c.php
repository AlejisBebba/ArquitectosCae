

<?php $__env->startSection('title', 'Galería'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-12 text-center">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-8 text-gold">Galería de Imágenes</h1>
        <p class="text-lg mb-10 text-white">Explora algunos de los mejores momentos y espacios de nuestro colegio.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-[#1e4720] rounded-lg shadow-lg p-4 flex flex-col items-center transform transition duration-300 hover:scale-105 hover:shadow-2xl border border-gold">
                    <img src="<?php echo e(asset('imagenes/' . $img['archivo'])); ?>" alt="<?php echo e($img['nombre']); ?>" class="rounded-lg mb-4 object-cover w-full h-64">
                    <span class="text-gold font-semibold"><?php echo e($img['nombre']); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-3 text-white">No hay imágenes en la galería.</div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\karen\colegioArquitectos\resources\views/galeria.blade.php ENDPATH**/ ?>