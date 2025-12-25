

<?php $__env->startSection('title', 'Contacto'); ?>

<?php $__env->startSection('content'); ?>
<section class="bg-gradient-to-r from-purple-900 to-purple-500 text-white py-12 text-center">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Contáctanos</h1>
        <p class="text-lg mb-6">¿Tienes preguntas o deseas más información? ¡Escríbenos o visítanos!</p>
    </div>
</section>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 max-w-2xl">

        
        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <?php if($errors->any()): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <form class="bg-white rounded-lg shadow p-8" method="POST" action="<?php echo e(route('contacto.enviar')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="nombre">Nombre</label>
                <input class="w-full px-3 py-2 border rounded" type="text" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">Correo electrónico</label>
                <input class="w-full px-3 py-2 border rounded" type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="mensaje">Mensaje</label>
                <textarea class="w-full px-3 py-2 border rounded" id="mensaje" name="mensaje" rows="4" required><?php echo e(old('mensaje')); ?></textarea>
            </div>

            <button class="bg-purple-900 text-white font-semibold px-6 py-2 rounded hover:bg-purple-700 transition" type="submit">
                Enviar
            </button>
        </form>

        
        <div class="mt-8 text-center">

            <p class="text-gray-700">
                📧 Correo:
                <a href="mailto:caeeloro@yahoo.com" class="text-purple-900 font-semibold underline">
                    caeeloro@yahoo.com
                </a>
            </p>

            <p class="text-gray-700 mt-2">
                📍 Dirección:
                Av. Circunvalación Nte., Machala, Ecuador
            </p>

            <p class="text-gray-700 mt-2">
                📞 Celular:
                <a href="tel:+593985244138" class="text-purple-900 font-semibold underline">
                    +593 98 524 4138
                </a>
            </p>

            <div class="mt-4">
                <p class="text-gray-700 font-semibold mb-2">Síguenos en nuestras redes:</p>

                <div class="flex justify-center gap-6 text-purple-900 text-lg font-semibold">
                    <a href="https://www.facebook.com/caeeloro" target="_blank" class="hover:underline">
                        Facebook
                    </a>

                    <a href="https://www.instagram.com/colegiodearquitectoseloro?igsh=NDMyYXc1ZnI4cWlm"
                       target="_blank" class="hover:underline">
                        Instagram
                    </a>

                    
                    <span class="opacity-60">
                        X (Próximamente)
                    </span>
                </div>
            </div>

        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\karen\colegioArquitectos\resources\views/contacto.blade.php ENDPATH**/ ?>