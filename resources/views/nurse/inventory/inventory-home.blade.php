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
            <div class="row">
                <div class="col">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search Item Name">
                </div>
                <button type="button" class="btn btn-primary" style="cursor: auto;" disabled><span class="fas fa-search "></span></button>
            </div>
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
            <tbody class="inventory-content-default">
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

            <tbody id="inventory-content" class="inventory-content-search"></tbody>
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
    <link rel="stylesheet" href="{{ asset('assets/css/inventory/zomproj-inventory.css') }}">
@stop

<!-- JavaScript -->
@section('js')
<!-- JQuery CDN (Content Delivery Network) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Live Search on table -->
<script type="text/javascript">
    // This script listens for user input in the 'search' input field and triggers an action when a key is released.
    $('#search').on('keyup', function(){
        // Get the value entered by the user.
        $value=$(this).val();

        // default will be change into search if it has value
        if($value){
            $('.inventory-content-default').hide();
            $('.inventory-content-search').show();
        }else{
            $('.inventory-content-default').show();
            $('.inventory-content-search').hide();            
        }

        // Send an AJAX GET request to the server to perform a search using the user's input.
        $.ajax({
            type:'get',
            // Define the URL for the search request (likely configured in a Laravel route).
            url:'{{ URL::to('search') }}',
            // Send the user's input as search data.
            data:{'search':$value},

            // When the server responds successfully, update the page with the received data.
            success:function(data){
                // Log the received data to the console for debugging.
                console.log(data);
                // Replace the HTML content of an element with id 'Content' with the new data.
                $('#inventory-content').html(data)
            }
        });
    });
</script>
@stop