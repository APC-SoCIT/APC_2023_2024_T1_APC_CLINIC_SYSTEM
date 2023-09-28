<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InventoryController extends Controller
{
    /**
     * Live Search on Table
     */
    public function search(Request $request)
    {
        $output = "";
        $inventoryItems = Inventory::where('name', 'LIKE', '%'.$request->search.'%')->get();

        foreach($inventoryItems as $inventoryItem)
        {
            $output.=
            '<tr>
            <td>'.$inventoryItem->name.'</td>
            <td>'.$inventoryItem->type.'</td>
            <td>'.$inventoryItem->quantity.'</td>';

            //If item type is 'Medicine'
            if($inventoryItem->type == 'Medicine'){
                $output.='<td>'.$inventoryItem->dosage.' mg</td>';
            } 
            else {
                $output.='<td></td>';
            }
            
            $output.=
            '<td>
                <div class="row justify-content-center">
                    <div class="col-3">
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdate'.$inventoryItem->id.'">Update Item</button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdropAdd'.$inventoryItem->id.'">Add Quantity</button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropReduce'.$inventoryItem->id.'">Reduce Quantity</button>
                    </div>
                </div>
            </td>
            </tr>';
        }

        return response($output);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventoryItems = Inventory::orderBy('name', 'asc')->get();

        return view('nurse.inventory.inventory-home', compact('inventoryItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('inventories')->where(function ($query) use ($request) {
                    return $query->where('type', $request->type)
                        ->orWhere('dosage', $request->dosage);
                }),
            ],
            'type' => 'in:Medicine,Equipment',
            'quantity' => 'required_if:type,Medicine,Equipment|integer',
            'dosage' => 'required_if:type,Medicine|integer',
        ]);

        Inventory::create($request->all());
        return redirect()->route('nurse.inventoryIndex')
            ->with('success', 'Item added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update item info
     */
    public function update(Request $request, Inventory $inventoryItem)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('inventories')
                    ->ignore($inventoryItem->id)
                    ->where(function ($query) use ($request) {
                        return $query->where('type', $request->type)
                            ->orWhere('dosage', $request->dosage);
                    }),
            ],
            'type' => 'in:Medicine,Equipment',
            'dosage' => 'required_if:type,Medicine|integer',
        ]);

        // Capitalize the 'name' before updating
        $request->merge(['name' => ucwords($request->input('name'))]);

        $inventoryItem->update($request->all());

        return redirect()->route('nurse.inventoryIndex')
            ->with('success', 'Item updated successfully');
    }

    /**
     * adding quantity
     */
    public function add(Request $request, Inventory $inventoryItem)
    {
        /**
         * Update item info
         */
        $request->validate([
            'add_quantity' => 'required|integer',
        ]);
    
        // Ensure the reduce_quantity is less than or equal to the current quantity
        $newQuantity = $inventoryItem->quantity + $request->input('add_quantity');
        $inventoryItem->update(['quantity' => $newQuantity]);

        return redirect()->route('nurse.inventoryIndex')
            ->with('success', "Item's quantity added successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function reduce(Request $request, Inventory $inventoryItem)
    {
        $request->validate([
            'reduce_quantity' => 'required|integer',
        ]);
    
        // Ensure the reduce_quantity is less than or equal to the current quantity
        if ($request->input('reduce_quantity') <= $inventoryItem->quantity) {
            $newQuantity = $inventoryItem->quantity - $request->input('reduce_quantity');
            $inventoryItem->update(['quantity' => $newQuantity]);
    
            return redirect()->route('nurse.inventoryIndex')
                ->with('success', "Item's quantity deducted successfully");
        } else {
            return redirect()->route('nurse.inventoryIndex')
                ->with('error', 'Input cannot exceed on the current quantity');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
