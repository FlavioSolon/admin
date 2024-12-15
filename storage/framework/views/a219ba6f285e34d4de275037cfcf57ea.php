<div>
    <!-- Botão Salvar no topo do formulário -->
    <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['type' => 'submit','wire:click.prevent' => 'submit','class' => 'mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','wire:click.prevent' => 'submit','class' => 'mb-4']); ?>
        <?php echo e(__('Salvar')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $attributes = $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $component = $__componentOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
    <div class="flex flex-col md:flex-row">
        <form wire:submit.prevent="submit" class="w-full md:w-1/2 p-4">
            <?php echo e($this->form); ?>

        </form>

        <?php if (isset($component)) { $__componentOriginal028e05680f6c5b1e293abd7fbe5f9758 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal028e05680f6c5b1e293abd7fbe5f9758 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-actions::components.modals','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-actions::modals'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal028e05680f6c5b1e293abd7fbe5f9758)): ?>
<?php $attributes = $__attributesOriginal028e05680f6c5b1e293abd7fbe5f9758; ?>
<?php unset($__attributesOriginal028e05680f6c5b1e293abd7fbe5f9758); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal028e05680f6c5b1e293abd7fbe5f9758)): ?>
<?php $component = $__componentOriginal028e05680f6c5b1e293abd7fbe5f9758; ?>
<?php unset($__componentOriginal028e05680f6c5b1e293abd7fbe5f9758); ?>
<?php endif; ?>

        <!-- Formulário Livewire -->


        <div class="w-full md:w-1/2 p-4">
            <section class="py-10 px-4 bg-primaria">
                <div class="flex flex-col items-center justify-center">
                    <h2
                        class="text-center p-4 text-2xl md:text-4xl lg:text-5xl font-bold tracking-tight text-white dark:text-white">
                        <?php echo e($formState['title'] ?? 'Inovação'); ?>

                    </h2>
                    <p class="text-center text-lg md:text-xl lg:text-2xl font-semibold text-gray-200 dark:text-white">
                        <?php echo e($formState['subtitle'] ?? 'Utilizamos a radiação solar para preservação da segurança nutricional e compostos bioativos dos subprodutos'); ?>

                    </p>
                </div>
                <div class="container mx-auto mt-5">
                    <div class="grid gap-8 md:grid-cols-3 grid-cols-1 border-2 border-sec rounded-lg">
                        <!-- Card 1 -->
                        <div class="p-6 flex flex-col items-center text-center">
                            
                            <h3 class="text-sec text-xl font-semibold mb-2">
                                <?php echo e($formState['card_title1'] ?? 'Título do Card 1'); ?>

                            </h3>
                            <p class="text-gray-200">
                                <?php echo e($formState['card_description1'] ?? 'Descrição para o Card 1'); ?>

                            </p>
                        </div>

                        <!-- Card 2 -->
                        <div class="p-6 flex flex-col items-center text-center">
                            
                            <h3 class="text-sec text-xl font-semibold mb-2">
                                <?php echo e($formState['card_title2'] ?? 'Título do Card 2'); ?>

                            </h3>
                            <p class="text-gray-200">
                                <?php echo e($formState['card_description2'] ?? 'Descrição para o Card 2'); ?>

                            </p>
                        </div>

                        <!-- Card 3 -->
                        <div class="p-6 flex flex-col items-center text-center">
                            
                            <h3 class="text-sec text-xl font-semibold mb-2">
                                <?php echo e($formState['card_title3'] ?? 'Título do Card 3'); ?>

                            </h3>
                            <p class="text-gray-200">
                                <?php echo e($formState['card_description3'] ?? 'Descrição para o Card 3'); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php /**PATH /home/flaviosolon/code/nutricandies/admin/resources/views/livewire/innovation-form.blade.php ENDPATH**/ ?>