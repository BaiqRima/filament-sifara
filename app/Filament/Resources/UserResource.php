<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use STS\FilamentImpersonate\Tables\Actions\Impersonate;

use App\Filament\Resources\UserResource\RelationManagers;


class UserResource extends Resource
{
    /**
     * The resource model.
     */
    protected static ?string $model = User::class;

    /**
     * The resource navigation icon.
     */
    protected static ?string $navigationIcon = 'heroicon-o-users';

    /**
     * The settings navigation group.
     */
    protected static ?string $navigationGroup = 'Collections';

    /**
     * The settings navigation sort order.
     */
    protected static ?int $navigationSort = 1;

    /**
     * Get the navigation badge for the resource.
     */
    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    /**
     * The resource form.
     */
       public static function form(Form $form): Form
    {
        $user = auth()->user();
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('username')
                            ->required()
                            ->unique(ignoreRecord:true)
                            ->validationAttribute('Username')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord:true)
                            ->maxLength(255),

                        Forms\Components\Select::make('roles')
                            ->multiple()
                            ->relationship('roles', 'name',  fn ($query) => $query->when(!auth()->user()->hasRole("super_admin" ),function($q){
                                $q->where('id','!=',1);
                            }))
                            ->preload()
                            ->label('Roles'),


                        Forms\Components\TextInput::make('password')->label('Password')
                            ->password(true)
                            ->minLength(8)
                            ->maxLength(255)
                            ->confirmed()
                            ->dehydrateStateUsing(fn ($state) => !empty($state) ? Hash::make($state) : "")
                            ->dehydrated(fn ($state) => filled($state))
                            // ->required(fn (Page $livewire) => ($livewire instanceof CreateRecord))
                            ,

                        Forms\Components\TextInput::make('password_confirmation')
                            ->password()
                            ->dehydrated(false),

                        // Toggle::make('showPassword')->reactive(),

                       
                ])
                ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->label('id'),
                Tables\Columns\TextColumn::make('roles.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('username')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('name'),
             
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->label('email'),
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->sortable()
                    ->label('email_verified_at'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('created_at')
                    ->dateTime('M j, Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('updated_at')
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                    ->label(trans('filament-user::user.resource.verified'))
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                Tables\Filters\Filter::make('unverified')
                    ->label(trans('filament-user::user.resource.unverified'))
                    ->query(fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Impersonate::make(),
            ]);
    }


    /**
     * The resource relation managers.
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * The resource pages.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
        ];
    }
}
