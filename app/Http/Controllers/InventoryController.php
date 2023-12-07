<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;
use DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // 1st approach 
        $inventory = Inventory::join('categories','inventories.category_id','=','categories.id')
            ->select([
                'inventories.id',
                'inventories.computer_unit',
                'inventories.quantity',
                'inventories.status',
                'inventories.remarks',
                'inventories.created_at',
                'inventories.updated_at',
                'categories.category_name'
            ])->get();

        // left join  - e display gihapon ang mga invalid/valid data
        $left_join = DB::table('categories')
                    ->leftJoin('inventories', 'categories.id', '=', 'inventories.category_id')
                    ->get();


        // right join - e display ra niya ang valid na data from inventories
        $right_join = DB::table('categories')
                    ->rightjoin('inventories', 'categories.id', '=', 'inventories.category_id')
                    ->get();

        $cross_join = DB::table('categories')
                    ->crossJoin('inventories')
                    ->get();

        // dd($join, $left_join, $right_join, $cross_join);

        // 2nd approach 
        $inventory = Inventory::All(); //table 1
        foreach($inventory as $item){ //table 2
            $category = Category::find($item->category_id);
            $item -> category_name = $category->category_name;
        }

        // 3rd approach 
        $inventory_list = Inventory::All();
        $category_list = Category::All();
        foreach($inventory_list as $inventory){
            foreach($category_list as $category){
                if($inventory->category_id == $category->id){
                    $inventory -> category_name = $category->category_name;
                }
            }
        }

        dd($inventory_list);



        return view('inventory.index', [
            'inventory' => $inventory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_list = Category::all();

        return view('inventory.create', [
            'category_list' => $category_list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_unit' => 'required',
            'category_id' => 'required',
            'quantity' => 'required|numeric',
            'status' => 'required',
            'remarks' => 'nullable',
        ]);

        Inventory::create([
            'computer_unit' => $request->input('computer_unit'),
            'category_id' => $request->input('category_id'),
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

        $category_list = Category::all();


        // Pass the inventory item to the view
        return view('inventory.edit', compact('inventory','category_list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'computer_unit' => 'required',
            'category_id' => 'required',
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
            'category_id' => $request->input('category_id'),
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
