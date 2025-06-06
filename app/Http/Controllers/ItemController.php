<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
    
    public function create()
    {
        return view('items.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:200',
        ]);
        
        Item::create([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);
        
        return redirect()->route('items.index')
                        ->with('success', 'Item created successfully.');
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:200',
        ]);
        
        $item->update([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);
        
        return redirect()->route('items.index')
                        ->with('success', 'Item updated successfully.');
    }   
    
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }
    
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }
    
    public function destroy(Item $item)
    {
        $item->delete();
        
        return redirect()->route('items.index')
                         ->with('success', 'Item deleted successfully.');
    }
}