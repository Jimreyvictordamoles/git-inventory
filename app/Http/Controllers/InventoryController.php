<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventory = Inventory::all();


        return view('inventory.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_unit' => 'required',
            'category' => 'required',
            'quantity' => 'required|numeric',
            'status' => 'required',
            'remarks' => 'nullable',
        ]);

        Inventory::create([
            'computer_unit' => $request->input('computer_unit'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'remarks' => $request->filled('remarks') ? $request->input('remarks') : null,
        ]);

        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventory = Inventory::findOrFail($id);

        if (!$inventory) {
            // Handle the case where the inventory item is not found.
            // You might want to redirect to an error page or display a message.
            return redirect()->route('inventory.index')->with('error', 'Inventory item not found.');
        }
    

        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the inventory item by ID
        $inventory = Inventory::find($id);

        // Check if the inventory item exists
        if (!$inventory) {
            // Handle the case where the inventory item is not found.
            // You might want to redirect to an error page or display a message.
            return redirect()->route('inventory.index')->with('error', 'Inventory item not found.');
        }

        // Pass the inventory item to the view
        return view('inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'computer_unit' => 'required',
            'category' => 'required',
            'quantity' => 'required|numeric',
            'status' => 'required',
            'remarks' => 'nullable',
        ]);
    
        $inventory = Inventory::find($id);
    
        // Check if the inventory item exists
        if (!$inventory) {
            // Handle the case where the inventory item is not found.
            // You might want to redirect to an error page or display a message.
            return redirect()->route('inventory.index')->with('error', 'Inventory item not found.');
        }
    
        // Update the inventory item with the new data
        $inventory->update([
            'computer_unit' => $request->input('computer_unit'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'remarks' => $request->filled('remarks') ? $request->input('remarks') : null,
        ]);
    
        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = Inventory::find($id);

        // Check if the item was found
        if (!$inventory) {
            return redirect()->route('inventory.index')->with('error', 'Inventory item not found.');
        }

        // Delete the inventory item
        $inventory->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('inventory.index')->with('success', 'Inventory item deleted successfully.');
    }
}
