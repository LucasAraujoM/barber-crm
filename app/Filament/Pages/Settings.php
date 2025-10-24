<?php

namespace App\Filament\Pages;

use App\Models\User;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Settings extends Page
{
    protected static bool $shouldRegisterNavigation = false;

    protected string $view = 'filament.pages.settings';
    protected ?string $heading = 'Configuración';
    protected ?string $subheading = 'Aquí puede configurar la información general de la cuenta y configuraciones de su barbería.';

    public ?array $data = [];
    public string $password = '';
    public bool $confirming = false;

    public function mount(): void
    {
        $this->form->fill(auth()->user()->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                /* Section::make('General')
                    ->components([
                        TextInput::make('name')
                            ->maxLength(255),
                        TextInput::make('email')
                            ->autocomplete('email')
                            ->helperText('Si cambia el email, se le enviará un correo electrónico para verificarlo.')
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->maxLength(20),
                        Section::make('Contraseña')
                            ->components([
                                ToggleButtons::make('change_password')
                                    ->label('¿Desea cambiar la contraseña?')
                                    ->boolean()
                                    ->grouped()
                                    ->default(false)
                                    ->afterStateUpdated(fn() => $this->cleanPassword()),
                                TextInput::make('new_password')
                                    ->label('Nueva contraseña')
                                    ->password()
                                    ->disabled(fn(Get $get) => $get('change_password') !== true)
                                    ->required(fn(Get $get) => $get('change_password') === true)
                                    ->minLength(8)
                                    ->maxLength(255),
                                TextInput::make('new_password_confirmation')
                                    ->label('Confirmar contraseña')
                                    ->password()
                                    ->disabled(fn(Get $get) => $get('change_password') !== true)
                                    ->required(fn(Get $get) => $get('change_password') === true)
                                    ->same('new_password')
                                    ->validationMessages([
                                        'same' => 'La contraseña y la confirmación de contraseña no coinciden.',
                                    ])
                                    ->maxLength(255),
                            ])->reactive(),
                    ]), */
                Section::make([
                    Section::make('Horario laboral')
                        ->components([
                            Select::make('days_opened')
                                ->multiple()
                                ->label('Días que está abierto')
                                ->required()
                                ->options([
                                    'monday' => 'Lunes',
                                    'tuesday' => 'Martes',
                                    'wednesday' => 'Miércoles',
                                    'thursday' => 'Jueves',
                                    'friday' => 'Viernes',
                                    'saturday' => 'Sábado',
                                    'sunday' => 'Domingo',
                                ])
                                ->validationMessages([
                                    'required' => 'Debe seleccionar al menos un día.',
                                ]),
                            Select::make('open_at')
                                ->label('Hora de apertura')
                                ->required()
                                ->options(fn() => collect(range(0, 23))->flatMap(fn($hour) => [
                                    Carbon::createFromTime($hour, 0, 0)->format('H:i:s') => Carbon::createFromTime($hour, 0, 0)->format('H:i'),
                                    Carbon::createFromTime($hour, 30, 0)->format('H:i:s') => Carbon::createFromTime($hour, 30, 0)->format('H:i'),
                                ]))
                                ->validationMessages([
                                    'required' => 'Debe seleccionar una hora de apertura.',
                                ]),
                            Select::make('close_at')
                                ->label('Hora de cierre')
                                ->required()
                                ->disabled(fn(Get $get) => ! $get('open_at'))
                                ->options(fn() => collect(range(0, 23))->flatMap(fn($hour) => [
                                    Carbon::createFromTime($hour, 0, 0)->format('H:i:s') => Carbon::createFromTime($hour, 0, 0)->format('H:i'),
                                    Carbon::createFromTime($hour, 30, 0)->format('H:i:s') => Carbon::createFromTime($hour, 30, 0)->format('H:i'),
                                ]))
                                ->afterStateUpdated(fn($state, Get $get) => $state <= $get('open_at') ? null : $state)
                                ->rule(fn(Get $get) => 'after:' . $get('open_at'))
                                ->validationMessages([
                                    'after' => 'La hora de cierre debe ser posterior a la hora de apertura.',
                                ]),
                        ])->reactive(),

                ]),
                Section::make('Sesiones')
                    ->description('Cerrar todas las sesiones activas en otros dispositivos. Esto cerrará la sesión actual en este dispositivo.')
                    ->components([
                        Action::make('logout')
                            ->label('Cerrar sesiones')
                            ->icon(Heroicon::ShieldCheck)
                            ->color('danger')
                            ->requiresConfirmation()
                            ->modalHeading('¿Estás seguro?')
                            ->modalDescription('Esto cerrará todas tus sesiones activas en otros dispositivos y también la sesión actual en este dispositivo.')
                            ->modalSubmitActionLabel('Sí, cerrar sesiones')
                            ->action(fn() => $this->cleanSessions()),
                            
                    ])
                    ->columns(),
            ])
            ->statePath('data');
    }

    /* public function cleanPassword()
    {
        $this->data['password'] = null;
        $this->data['new_password'] = null;
        $this->data['new_password_confirmation'] = null;
    } */

    public function save(): void
    {
        $data = $this->form->getState();
        // Convertir las horas a objetos Carbon
        
        $user = auth()->user();
        $user->update($data);
        
        Notification::make()
            ->success()
            ->title('Guardado con exito')
            ->send();
    }
    public function confirmSave(): void
    {
        if (! Hash::check($this->password, auth()->user()->password)) {
            Notification::make()
                ->title('Contraseña incorrecta')
                ->danger()
                ->send();
            return;
        }
        $this->password = '';
        $this->save();
    }
    public function cleanSessions()
    {
        DB::table('sessions')->where('user_id', auth()->user()->id)->delete();
        return redirect()->route('filament.dashboard.auth.login');
    }
    public function back(): void
    {
        $this->redirectRoute('filament.dashboard.pages.dashboard');
    }
}
