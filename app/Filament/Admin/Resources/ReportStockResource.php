<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReportStockResource\Pages;
use App\Models\ReportStock;
use App\Models\Vessel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ReportStockResource extends Resource
{
    protected static ?string $model = ReportStock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->required()
                    ->default(Auth::id()),
                Forms\Components\Select::make('vessel_id')
                    ->label('Nama Kapal')
                    ->options(Vessel::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('request_by')
                    ->label('Request By')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('project')
                    ->label('Project')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_po_logistik')
                    ->label('Nomor PO Logistik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_tipe')
                    ->label('Jenis/Tipe')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity')
                    ->label('Quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('uom')
                    ->label('UOM')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal_request')
                    ->label('Tanggal Request')
                    ->required(),
                Forms\Components\DateTimePicker::make('actual_tiba')
                    ->label('Tanggal Actual Tiba'),
                Forms\Components\TextInput::make('actual_quantity')
                    ->label('Actual Quantity')
                    ->numeric(),
                Forms\Components\TextInput::make('actual_uom')
                    ->label('Actual UOM')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_po_berkah')
                    ->label('Nomor PO Berkah')
                    ->maxLength(255),
                Forms\Components\Select::make('stock_status')
                    ->label('Stock Status')
                    ->options([
                        'Belum Terima' => 'Belum Terima',
                        'Sudah Terima' => 'Sudah Terima',
                    ]),
                Forms\Components\FileUpload::make('foto_barang_diterima')
                    ->label('Foto Barang Diterima')
                    ->directory('report_stock')
                    ->image()
                    ->maxSize(10240),
                Forms\Components\TextInput::make('quantity_supply')
                    ->label('Quantity Supply')
                    ->numeric(),
                Forms\Components\TextInput::make('uom_supply')
                    ->label('UOM Supply')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_po_supply')
                    ->label('Nomor PO Supply')
                    ->maxLength(255),
                Forms\Components\Select::make('status_stock_supply')
                    ->label('Status Stock Supply')
                    ->options([
                        'Sudah Tersupply' => 'Sudah Tersupply',
                        'Belum Tersupply' => 'Belum Tersupply',
                        'Tersupply Sebagian' => 'Tersupply Sebagian',
                    ]),
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
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('vessel.name')
                    ->label('Nama Kapal')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('request_by')
                    ->label('Request By')
                    ->searchable(),
                Tables\Columns\TextColumn::make('project')
                    ->label('Project')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_po_logistik')
                    ->label('Nomor PO Logistik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_tipe')
                    ->label('Jenis/Tipe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uom')
                    ->label('UOM')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_request')
                    ->label('Tanggal Request')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_tiba')
                    ->label('Tanggal Actual Tiba')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_quantity')
                    ->label('Actual Quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_uom')
                    ->label('Actual UOM')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_po_berkah')
                    ->label('Nomor PO Berkah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stock_status')
                    ->label('Stock Status')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_barang_diterima')
                    ->label('Foto Barang Diterima')
                    ->url(fn ($state) => '/storage/'.$state)
                    ->openUrlInNewTab()
                    ->extraImgAttributes(['loading' => 'lazy']),
                Tables\Columns\TextColumn::make('quantity_supply')
                    ->label('Quantity Supply')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uom_supply')
                    ->label('UOM Supply')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_po_supply')
                    ->label('Nomor PO Supply')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_stock_supply')
                    ->label('Status Stock Supply')
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

    public static function getNavigationLabel(): string
    {
        return 'Report Stock';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Report Stock';
    }
}
