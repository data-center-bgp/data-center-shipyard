<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VesselResource\Pages;
use App\Models\Vessel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class VesselResource extends Resource
{
    protected static ?string $model = Vessel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->required()
                    ->default(Auth::id()),
                Forms\Components\TextInput::make('name')
                    ->label(('Nama Kapal'))
                    ->required(),
                Forms\Components\Select::make('company')
                    ->label('Perusahaan')
                    ->options([
                        'ASG' => 'ASG',
                        'BGP' => 'BGP',
                        'BNI' => 'BNI',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Kapal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company')
                    ->label('Perusahaan')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVessels::route('/'),
            'create' => Pages\CreateVessel::route('/create'),
            'edit' => Pages\EditVessel::route('/{record}/edit'),
        ];
    }
}
