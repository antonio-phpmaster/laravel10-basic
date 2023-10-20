<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
//        $supports = Support::all();
//        $support = new Support();
        $supports = $support->all();

//        dd($supports);

//        return view('admin.supports.index', [
//            'supports' => $supports
//        ]);
        $xss = '<script>alert("Cuidado com ataques XSS");</script>';
        return view ('admin.supports.index', compact('supports', 'xss'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
