

<?php $__env->startSection('title', 'Inicio'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <section class="bg-[#153411] py-16">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-[#D7A74B] mb-4 drop-shadow-lg">
                Bienvenido al Colegio de Arquitectos
            </h1>
            <p class="text-xl md:text-2xl text-white mb-8">
                Comprometidos con la excelencia, la innovación y el desarrollo de la arquitectura en nuestra comunidad.
            </p>
            <a href="<?php echo e(route('contacto')); ?>"
               class="bg-[#D7A74B] text-[#153411] font-bold px-8 py-3 rounded-full shadow-lg hover:bg-[#153411] hover:text-[#D7A74B] border-2 border-[#D7A74B] transition text-lg">
                Contáctanos
            </a>
        </div>
    </section>

    <!-- Servicios Destacados -->
    <section class="py-16 bg-gradient-to-b from-[#153411] to-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-[#D7A74B] mb-10 text-center">Nuestros Servicios</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white border-2 border-[#D7A74B] rounded-xl shadow-lg p-6 hover:scale-105 hover:shadow-2xl transition">
                    <h3 class="text-xl font-bold text-[#D7A74B] mb-2">Asesoría Profesional</h3>
                    <p class="text-[#153411]">Brindamos orientación y apoyo a arquitectos y estudiantes en su desarrollo profesional.</p>
                </div>
                <div class="bg-white border-2 border-[#D7A74B] rounded-xl shadow-lg p-6 hover:scale-105 hover:shadow-2xl transition">
                    <h3 class="text-xl font-bold text-[#D7A74B] mb-2">Capacitación Continua</h3>
                    <p class="text-[#153411]">Ofrecemos talleres, cursos y conferencias para mantenerte actualizado en tendencias y normativas.</p>
                </div>
                <div class="bg-white border-2 border-[#D7A74B] rounded-xl shadow-lg p-6 hover:scale-105 hover:shadow-2xl transition">
                    <h3 class="text-xl font-bold text-[#D7A74B] mb-2">Eventos y Networking</h3>
                    <p class="text-[#153411]">Organizamos eventos para fortalecer la comunidad y crear nuevas oportunidades de colaboración.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores Institucionales -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-[#D7A74B] mb-10 text-center">Nuestros Valores</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white border-2 border-[#D7A74B] rounded-xl shadow-lg p-6 hover:scale-105 hover:shadow-2xl transition">
                    <h3 class="text-xl font-bold text-[#D7A74B] mb-2">Ética</h3>
                    <p class="text-[#153411]">Actuamos con integridad y responsabilidad en cada proyecto y acción.</p>
                </div>
                <div class="bg-white border-2 border-[#D7A74B] rounded-xl shadow-lg p-6 hover:scale-105 hover:shadow-2xl transition">
                    <h3 class="text-xl font-bold text-[#D7A74B] mb-2">Innovación</h3>
                    <p class="text-[#153411]">Promovemos la creatividad y la búsqueda constante de nuevas soluciones.</p>
                </div>
                <div class="bg-white border-2 border-[#D7A74B] rounded-xl shadow-lg p-6 hover:scale-105 hover:shadow-2xl transition">
                    <h3 class="text-xl font-bold text-[#D7A74B] mb-2">Compromiso</h3>
                    <p class="text-[#153411]">Estamos dedicados al desarrollo sostenible y al bienestar de la sociedad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Galería Destacada -->
    <section class="py-16 bg-[#153411]">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-[#D7A74B] mb-10 text-center">Galería de Proyectos</h2>

            <?php if(isset($imagenes)): ?>
                <?php if(count($imagenes) > 0): ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                        <?php $__currentLoopData = $imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white border-2 border-[#D7A74B] rounded-lg shadow-lg overflow-hidden hover:scale-105 transition">
                                <div class="bg-[#D7A74B] text-[#153411] font-semibold text-center py-2">
                                    <?php echo e($imagen->nombre); ?>

                                </div>
                                <img src="<?php echo e(asset('imagenes/' . $imagen->archivo)); ?>"
                                     alt="<?php echo e($imagen->nombre); ?>"
                                     class="w-full h-56 object-cover">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <p class="text-center text-white">
                        Próximamente se mostrarán los proyectos.
                    </p>
                <?php endif; ?>
            <?php else: ?>
                <p class="text-center text-white">
                    Galería no disponible por el momento.
                </p>
            <?php endif; ?>

            <div class="text-center mt-8">
                <a href="<?php echo e(route('galeria')); ?>"
                   class="inline-block bg-[#D7A74B] text-[#153411] font-bold px-8 py-3 rounded-full shadow-lg hover:bg-[#153411] hover:text-[#D7A74B] border-2 border-[#D7A74B] transition text-lg">
                    Ver Galería Completa
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\karen\colegioArquitectos\resources\views/paginaprincipal.blade.php ENDPATH**/ ?>