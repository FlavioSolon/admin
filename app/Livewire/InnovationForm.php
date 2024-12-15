<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Innovation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Section;

class InnovationForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $innovation;
    public ?array $formState = [];

    public function mount(): void
    {
        // Verifica se já existe um registro na tabela e, se houver, carrega o primeiro
        $this->innovation = Innovation::first() ?? new Innovation();

        // Preenche o formulário com os dados existentes (se houver)
        $this->form->fill($this->innovation->toArray());
    }

    public function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Informações da Inovação')
                ->schema([
                    TextInput::make('title')
                        ->label('Título')
                        ->required()
                        ->placeholder('Digite o título da inovação')
                        ->afterStateUpdated(fn($state) => $this->formState['title'] = $state),

                    TextInput::make('subtitle')
                        ->label('Subtítulo')
                        ->required()
                        ->placeholder('Digite um subtítulo para a inovação')
                        ->afterStateUpdated(fn($state) => $this->formState['subtitle'] = $state),
                ]),

            Section::make('Card 1')
                ->schema([
                    TextInput::make('card_title1')
                        ->label('Título do Card 1')
                        ->required()
                        ->placeholder('Título para o Card 1')
                        ->afterStateUpdated(fn($state) => $this->formState['card_title1'] = $state),

                    TextInput::make('card_description1')
                        ->label('Descrição do Card 1')
                        ->required()
                        ->placeholder('Descrição para o Card 1')
                        ->afterStateUpdated(fn($state) => $this->formState['card_description1'] = $state),

                    FileUpload::make('card_icon1')
                        ->label('Ícone do Card 1')
                        ->image()
                        ->directory('innovations')
                        ->placeholder('Envie uma imagem para o ícone do Card 1')
                        ->afterStateUpdated(fn($state) => $this->formState['card_icon1'] = $state),
                ]),

            Section::make('Card 2')
                ->schema([
                    TextInput::make('card_title2')
                        ->label('Título do Card 2')
                        ->required()
                        ->placeholder('Título para o Card 2')
                        ->afterStateUpdated(fn($state) => $this->formState['card_title2'] = $state),

                    TextInput::make('card_description2')
                        ->label('Descrição do Card 2')
                        ->required()
                        ->placeholder('Descrição para o Card 2')
                        ->afterStateUpdated(fn($state) => $this->formState['card_description2'] = $state),

                    FileUpload::make('card_icon2')
                        ->label('Ícone do Card 2')
                        ->image()
                        ->directory('innovations')
                        ->placeholder('Envie uma imagem para o ícone do Card 2')
                        ->afterStateUpdated(fn($state) => $this->formState['card_icon2'] = $state),
                ]),

            Section::make('Card 3')
                ->schema([
                    TextInput::make('card_title3')
                        ->label('Título do Card 3')
                        ->required()
                        ->placeholder('Título para o Card 3')
                        ->afterStateUpdated(fn($state) => $this->formState['card_title3'] = $state),

                    TextInput::make('card_description3')
                        ->label('Descrição do Card 3')
                        ->required()
                        ->placeholder('Descrição para o Card 3')
                        ->afterStateUpdated(fn($state) => $this->formState['card_description3'] = $state),

                    FileUpload::make('card_icon3')
                        ->label('Ícone do Card 3')
                        ->image()
                        ->directory('innovations')
                        ->placeholder('Envie uma imagem para o ícone do Card 3')
                        ->afterStateUpdated(fn($state) => $this->formState['card_icon3'] = $state),
                ]),
        ])
        ->statePath('formState');
}

    public function submit()
    {
        $data = $this->form->getState();

        if ($this->innovation->exists) {
            $this->innovation->update($data);

            Notification::make()
                ->title('Inovação atualizada com sucesso!')
                ->success()
                ->send();
        } else {
            // Cria um novo registro
            Innovation::create($data);

            // Notificação de sucesso
            Notification::make()
                ->title('Inovação criada com sucesso!')
                ->success()
                ->send();
        }

        // Redirecionamento após o envio
        return redirect()->route('filament.admin.home.pages.manage-innovation');
    }




    /**
     * Renderiza o componente.
     */
    public function render()
    {
        return view('livewire.innovation-form');
    }
}
