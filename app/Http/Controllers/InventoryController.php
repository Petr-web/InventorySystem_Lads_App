<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockInventory;

class InventoryController extends Controller
{
    protected $stockInventory;

    public function __construct()
    {
        $this->stockInventory = new StockInventory();
    }

    public function index()
    {
        $stockItems = $this->stockInventory->all();
        return view('pages.index', compact('stockItems'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductName' => 'required',
            'Quantity' => 'required|integer',
            'Price' => 'required|numeric',
        ]);

        $this->stockInventory->create($request->all());
        return redirect()->route('inventory.index')->with('success', 'Item added successfully');
    }

    public function edit($id)
    {
        $stockItem = $this->stockInventory->findOrFail($id);
        return view('pages.edit', compact('stockItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ProductName' => 'required',
            'Quantity' => 'required|integer',
            'Price' => 'required|numeric',
        ]);

        $stockItem = $this->stockInventory->findOrFail($id);
        $stockItem->update($request->all());
        return redirect()->route('inventory.index')->with('success', 'Item updated successfully');
    }

    public function destroy($id)
    {
        $stockItem = $this->stockInventory->findOrFail($id);
        $stockItem->delete();
        return redirect()->route('inventory.index')->with('success', 'Item deleted successfully');
    }
}
