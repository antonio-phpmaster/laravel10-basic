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

    public function store(Request $request, Support $support)
    {
//        dd($request->all());
//        dd($request->only('subject', 'body'));
//        dd($request->only(['subject', 'body']));
//        dd($request->only(['body']));
//        dd($request->only('body'));
//        dd($request->body);
//        dd($request->get('body'));//valor do body, caso seja vazio vai mostrar null
//        dd($request->get('body', 'default'));//valor do body, caso seja vazio vai mostrar null
//        dd($request->get('xpt', 'default'));//caso nao exista o campo vai mostrar o valor null
//        dd($request->all());
        $data = $request->all();
//        Support::create($data);
        $support->create($data);

        return redirect()->route('supports.index');
    }
}
