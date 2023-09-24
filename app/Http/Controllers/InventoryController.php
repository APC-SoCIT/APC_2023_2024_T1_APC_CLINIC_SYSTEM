<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class InventoryController extends Controller
{
    /**
     * Live Search on Table
     */
    public function search(Request $request)
    {
        $output = "";
        $inventoryItem = Inventory::where('name', 'LIKE', '%'.$request->search.'%')->get();

        foreach($inventoryItem as $inventoryItem)
        {
            $output.=
            '<tr>
            <td>'.$inventoryItem->name.'</td>
            <td>'.$inventoryItem->type.'</td>
            <td>'.$inventoryItem->quantity.'</td>';
            if($inventoryItem->type == 'Medicine'){
                $output.='<td>'.$inventoryItem->gram.'</td>';
            } 
            else {
                $output.='<td></td>';
            }
            
            $output.='</tr>';
        }

        return response($output);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //declaring Inventory Model to "inventoryItems" to callout items on inventory table max of 10
        $inventoryItems = Inventory::orderBy('name', 'asc')->paginate(10);

        return view('nurse.inventory.inventory-home', compact('inventoryItems'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
        //
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
