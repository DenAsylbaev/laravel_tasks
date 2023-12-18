<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();

        return \view('admin.resources.index', [
            'resources' => $resources,
        ]);    
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //  
    }

    public function update()
    {
        //
    }

    public function destroy(Resource $resources)
    {
        if ($resources->delete()) {
            return redirect()->route('admin.resources.index')->with('success', 'Запись успешно удалена');
        }
        return back()->with('error', 'Не удалось удалить запись');
    }
}
