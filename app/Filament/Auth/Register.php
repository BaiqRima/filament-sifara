<?php
namespace App\Filament\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Pages\Auth\Register as AuthRegister;
use Filament\Pages\Actions\Action;

class Register extends AuthRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNotificationComponent(), // Hanya menampilkan pesan pemberitahuan
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getNotificationComponent(): Component
    {
        return MarkdownEditor::make('notification')
            ->default('Pemberitahuan Penting: Saat ini, pembuatan akun baru tidak diperkenankan. Harap tidak melanjutkan proses pendaftaran.')
            ->disabled()
            ->columnSpan('full'); // Memperpanjang pesan ke seluruh lebar form
    }
}