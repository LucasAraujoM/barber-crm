<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EditProfile extends BaseEditProfile
{
    
    protected ?string $heading = 'Editar perfil';
    protected ?string $subheading = 'Aquí puede editar la información general de su perfil.';
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255)
                    ->autofocus(),
                TextInput::make('email')
                    ->label('Direccion email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->live(debounce: 500),
                TextInput::make('password')
                    ->label('Nueva contraseña')
                    ->validationAttribute(__('filament-panels::auth/pages/edit-profile.form.password.validation_attribute'))
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->rule(Password::default())
                    ->showAllValidationMessages()
                    ->autocomplete('new-password')
                    ->dehydrated(fn($state): bool => filled($state))
                    ->dehydrateStateUsing(fn($state): string => Hash::make($state))
                    ->live(debounce: 500)
                    ->same('passwordConfirmation'),
                TextInput::make('passwordConfirmation')
                    ->label('Confirmar contraseña')
                    ->validationAttribute(__('filament-panels::auth/pages/edit-profile.form.password_confirmation.validation_attribute'))
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required()
                    ->visible(fn(Get $get): bool => filled($get('password')))
                    ->dehydrated(false),
                TextInput::make('currentPassword')
                    ->label('Contraseña actual')
                    ->validationAttribute(__('filament-panels::auth/pages/edit-profile.form.current_password.validation_attribute'))
                    ->belowContent('Por seguridad, por favor ingrese su contraseña actual para continuar.')
                    ->password()
                    ->currentPassword(guard: Filament::getAuthGuard())
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required()
                    ->visible(fn(Get $get): bool => filled($get('password')) || ($get('email') !== $this->getUser()->getAttributeValue('email')))
                    ->dehydrated(false)
            ]);
    }
}
