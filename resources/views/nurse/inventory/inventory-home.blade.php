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
            <div class="row">
                <div class="col-3" style="padding-top: 6px;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New Item</button>
                </div>
                <div class="col-9">
                    @if($errors->has('name') || $errors->has('type') || $errors->has('quantity') || $errors->has('dosage'))
                    <div class="alert alert-danger">Adding fail, there are missing credentials</div>
                    @endif
                    <!-- id Item already exist -->
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <!-- If Adding Item was a Success -->
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
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
                    <th class="th-position">Item Type</th>
                    <th class="th-position">Quantity</th>
                    <th class="th-position">Dosage (mg)</th>
                </tr>
            </thead>
            <!-- Default body of the table -->
            <tbody class="inventory-content-default">
                <!-- Showing all items in the inventory table and each item will be called as "inventoryItem" -->
                @foreach($inventoryItems as $inventoryItem)
                <tr>
                    <td>{{ $inventoryItem->name }}</td>
                    <td>{{ $inventoryItem->type }}</td>
                    <td>{{ $inventoryItem->quantity }}</td>
                    <!-- If Item type is 'Medicine', show 'dosages' -->
                    @if($inventoryItem->type == 'Medicine')
                    <td>{{ $inventoryItem->dosage }}</td>
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach
            </tbody>

            <!-- Search body of the table -->
            <tbody id="inventory-content" class="inventory-content-search"></tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Adding Items</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="{{ route('nurse.inventoryStore') }}">
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
<!-- Bootstrap package -->
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

<!-- Adding Items (Change display depends on Select method) -->
<script>
    $(document).ready(function () {
        // Function to toggle form fields based on item type selection
        function toggleFields() {
            var itemType = $("#inventory-add-select").val();
            const type_value = document.getElementById("type-value");
            const quantity_status1 = document.getElementById("quantity-status-1");
            const quantity_status2 = document.getElementById("quantity-status-2");
            const dosage_status = document.getElementById("dosage-status");

            if (itemType === "Medicine") {
                $("#choosen-medicine").show();
                $("#choosen-equipment").hide();
                type_value.value = 'Medicine';
                quantity_status1.disabled = false;
                quantity_status2.disabled = true;
                dosage_status.disabled = false;
            } else if (itemType === "Equipment") {
                $("#choosen-medicine").hide();
                $("#choosen-equipment").show();
                type_value.value = 'Equipment';
                quantity_status1.disabled = true;
                quantity_status2.disabled = false;
                dosage_status.disabled = true;
            }
        }

        // Initial call to toggle fields based on the default selected item type
        toggleFields();

        // Attach an event handler to the item type select field
        $("#inventory-add-select").on("change", function () {
            toggleFields();
        });
    });
</script>
@stop