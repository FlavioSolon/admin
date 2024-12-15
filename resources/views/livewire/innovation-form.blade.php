<div>
    <!-- Botão Salvar no topo do formulário -->
    <x-filament::button type="submit" wire:click.prevent="submit" class="mb-4">
        {{ __('Salvar') }}
    </x-filament::button>
    <div class="flex flex-col md:flex-row">
        <form wire:submit.prevent="submit" class="w-full md:w-1/2 p-4">
            {{ $this->form }}
        </form>

        <x-filament-actions::modals />

        <!-- Formulário Livewire -->


        <div class="w-full md:w-1/2 p-4">
            <section class="py-10 px-4 bg-primaria">
                <div class="flex flex-col items-center justify-center">
                    <h2
                        class="text-center p-4 text-2xl md:text-4xl lg:text-5xl font-bold tracking-tight text-white dark:text-white">
                        {{ $formState['title'] ?? 'Inovação' }}
                    </h2>
                    <p class="text-center text-lg md:text-xl lg:text-2xl font-semibold text-gray-200 dark:text-white">
                        {{ $formState['subtitle'] ?? 'Utilizamos a radiação solar para preservação da segurança nutricional e compostos bioativos dos subprodutos' }}
                    </p>
                </div>
                <div class="container mx-auto mt-5">
                    <div class="grid gap-8 md:grid-cols-3 grid-cols-1 border-2 border-sec rounded-lg">
                        <!-- Card 1 -->
                        <div class="p-6 flex flex-col items-center text-center">
                            {{-- <img src="{{ $formState['card_icon1'] ?? '/icones/default-icon.png' }}" alt="Ícone 1" class="w-32 h-32 mb-4" /> --}}
                            <h3 class="text-sec text-xl font-semibold mb-2">
                                {{ $formState['card_title1'] ?? 'Título do Card 1' }}
                            </h3>
                            <p class="text-gray-200">
                                {{ $formState['card_description1'] ?? 'Descrição para o Card 1' }}
                            </p>
                        </div>

                        <!-- Card 2 -->
                        <div class="p-6 flex flex-col items-center text-center">
                            {{-- <img src="{{ $formState['card_icon2'] ?? '/icones/default-icon.png' }}" alt="Ícone 2" class="w-28 h-28 mb-4" /> --}}
                            <h3 class="text-sec text-xl font-semibold mb-2">
                                {{ $formState['card_title2'] ?? 'Título do Card 2' }}
                            </h3>
                            <p class="text-gray-200">
                                {{ $formState['card_description2'] ?? 'Descrição para o Card 2' }}
                            </p>
                        </div>

                        <!-- Card 3 -->
                        <div class="p-6 flex flex-col items-center text-center">
                            {{-- <img src="{{ $formState['card_icon3'] ?? '/icones/default-icon.png' }}" alt="Ícone 3" class="w-28 h-28 mb-4" /> --}}
                            <h3 class="text-sec text-xl font-semibold mb-2">
                                {{ $formState['card_title3'] ?? 'Título do Card 3' }}
                            </h3>
                            <p class="text-gray-200">
                                {{ $formState['card_description3'] ?? 'Descrição para o Card 3' }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
