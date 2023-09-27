@extends('adminlte::page')

<!-- Tabs Title -->
@section('title', 'Health Record')

<!-- Content Header -->
@section('content_header')
    <h1>List of Patient's Health Record</h1>
@stop

<!-- Content Body -->
@section('content')
<!-- Body -->
<div class="container-xxl mb-2 inventory-customize-container-height">
    <!-- Add and Search Item -->
    <div class="row">
        <!-- Search Item -->
        <div class="col">
            <div class="row">
                <div class="col">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search Patient's Name">
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
                    <th class="th-position">Patient Name</th>
                    <th class="th-position">Item Type</th>
                    <th class="th-position">Quantity</th>
                    <th class="th-position">Dosage (mg)</th>
                    <th class="th-position" style="text-align: center;">Update Item</th>
                </tr>
            </thead>
            <!-- Default body of the table -->
            <tbody class="inventory-content-default">
                <!-- Showing all items in the inventory table and each item will be called as "inventoryItem" -->
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->type }}</td>
                    <td>{{ $user->quantity }}</td>
                </tr>
                @endforeach
            </tbody>

            <!-- Search body of the table -->
            <tbody id="inventory-content" class="inventory-content-search">
            </tbody>
        </table>
    </div>
</div>

<!-- Add Item Modal -->
<div class="modal fade" id="staticBackdropNew" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Adding Items</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="{{ route('nurse.inventoryStore') }}" onsubmit="return confirm('Are you sure you want to add this item?');">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label><b>Item Name:</b></label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label><b>Item Type:</b></label>
                            <select class="form-control" id="inventory-add-select">
                                <option>Medicine</option>
                                <option>Equipment</option>
                            </select>

                            <!-- Hidden 'type' input -->
                            <input type="hidden" name="type" id="type-value">
                        </div>
                    </div>

                    <!-- If 'type' is Medicine -->
                    <div class="row" id="choosen-medicine">
                        <div class="col">
                            <label><b>Quantity:</b></label>
                            <input type="number" class="form-control" id="quantity-status-1" name="quantity">
                            @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label><b>Dosage:</b></label>
                            <input type="number" class="form-control" id="dosage-status" name="dosage">
                            @error('dosage')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- If 'type' is Equipment -->
                    <div class="row" id="choosen-equipment" style="display: none;">
                        <div class="col">
                            <label><b>Quantity:</b></label>
                            <input type="number" class="form-control" id="quantity-status-2" name="quantity" disabled>
                            @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary float-right mt-3">Add Item</button>
                </form>
            </div>
                
            <!-- Modal footer 
            <div class="modal-footer">
            </div>
            -->
        </div>
    </div>
</div>
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

<!-- Bootstrap package -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

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
            url:'{{ URL::to('record/search') }}',
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