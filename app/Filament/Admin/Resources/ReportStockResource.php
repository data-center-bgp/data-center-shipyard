<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReportStockResource\Pages;
use App\Filament\Admin\Resources\ReportStockResource\RelationManagers;
use App\Models\ReportStock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportStockResource extends Resource
{
    protected static ?string $model = ReportStock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('vessel_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('request_by')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('project')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_po_logistik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('deskripsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_tipe')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('uom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal_request')
                    ->required(),
                Forms\Components\DateTimePicker::make('actual_tiba')
                    ->required(),
                Forms\Components\TextInput::make('actual_quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('actual_uom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_po_berkah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('stock_status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('foto_barang_diterima')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity_supply')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('uom_supply')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_po_supply')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status_stock_supply')
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vessel_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('request_by')
                    ->searchable(),
                Tables\Columns\TextColumn::make('project')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_po_logistik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_tipe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_request')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_tiba')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_uom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_po_berkah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stock_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foto_barang_diterima')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity_supply')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uom_supply')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_po_supply')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_stock_supply')
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
            'index' => Pages\ListReportStocks::route('/'),
            'create' => Pages\CreateReportStock::route('/create'),
            'edit' => Pages\EditReportStock::route('/{record}/edit'),
        ];
    }
}
