@extends('adminlte::page')

<!-- Tabs Title -->
@section('title', 'Inventory')

<!-- Content Header -->
@section('content_header')
    <h1>Inventory</h1>
@stop

<!-- Content Body -->
@section('content')
<!-- Body -->
<div class="container-xxl mb-2 inventory-customize-container-height customize-overflow">
    <!-- Add and Search Item -->
    <div class="row">
        <!-- Adding new item button -->
        <div class="col">
            <button type="button" class="btn btn-primary">Add New Item</button>
        </div>

        <!-- Search Item -->
        <div class="col">
            <form method="GET">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Search Item Name">
                    </div>
                    <button type="submit" class="btn btn-primary"><span class="fas fa-search "></span></button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- List table of Medicine and Equipment that have in Inventory -->
    <div class="mt-3 customize-table-container">
        <table class="table">
            <!-- Header of the table -->
            <thead>
                <tr>
                    <th class="th-position">Item Name</th>
                    <th class="th-position">Dosage (mg)</th>
                    <th class="th-position">Quantity</th>
                    <th class="th-position">Item Type</th>
                </tr>
            </thead>
            <!-- Body of the table -->
            <tbody>
                <!-- Showing all items in the inventory table and each item will be called as "inventoryItem" -->
                @foreach($inventoryItems as $inventoryItem)
                <tr>
                    <td>{{ $inventoryItem->name }}</td>
                    <td>{{ $inventoryItem->type }}</td>
                    <td>{{ $inventoryItem->quantity }}</td>
                    <!-- If Item type is 'Medicine', show 'grams' -->
                    @if($inventoryItem->type == 'Medicine')
                    <td>{{ $inventoryItem->gram }}</td>
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Buttons that allow to next page of the table -->
{!! $inventoryItems->links('zomproj.customize-pagination', ['paginator' => $inventoryItems]) !!}
@stop

<!-- CSS -->
@section('css')
    <!-- AdminLTE css -->
    <link rel="stylesheet" href="/css/admin_custom.css">

    <!-- ZomProj css -->
    <link rel="stylesheet" href="{{ asset('assets/css/zomproj-table-design.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/inventory/zomproj-invetory-design.css') }}">
@stop

<!-- JavaScript -->
@section('js')
    
@stop