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

    </div>
</div>
