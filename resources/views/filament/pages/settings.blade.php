@php
    use Filament\Support\Icons\Heroicon;
@endphp
<x-filament-panels::page>
    <div class="space-y-6">
        {{ $this->form }}

        <div class="flex justify-end gap-3 mt-4">
            <x-filament::button color="danger" wire:click="back" :icon="Heroicon::ArrowUturnLeft">
                Cancelar
            </x-filament::button>

            {{-- Modal de confirmación según la doc oficial --}}
            <x-filament::modal
                id="confirm-password-modal"
                icon="heroicon-o-lock-closed"
                heading="Confirmar contraseña"
                width="sm"
            >
                <x-slot name="trigger">
                    <x-filament::button color="primary" :icon="Heroicon::Bookmark">
                        Guardar
                    </x-filament::button>
                </x-slot>

                <div class="space-y-4">
                    <x-filament::input.wrapper>
                        <x-filament::input
                            type="password"
                            wire:model.defer="password"
                            placeholder="Ingresa tu contraseña"
                        />
                    </x-filament::input.wrapper>
                </div>

                <x-slot name="footer">
                    <div class="flex justify-end gap-3">
                        <x-filament::button color="secondary" x-on:click="$dispatch('close-modal', { id: 'confirm-password-modal' })">
                            Cancelar
                        </x-filament::button>

                        <x-filament::button color="primary" wire:click="confirmSave" x-on:click="$dispatch('close-modal', { id: 'confirm-password-modal' })">
                            Confirmar
                        </x-filament::button>
                    </div>
                </x-slot>
            </x-filament::modal>
        </div>
    </div>
</x-filament-panels::page>
