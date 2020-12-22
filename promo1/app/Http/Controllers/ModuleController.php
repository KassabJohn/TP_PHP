<?php

namespace App\Http\Controllers;

use App\Module;
use App\Student;
use App\Promo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @param Promo $promo
     * @return View
     */
    public function index(Request $request) {
        $search = $request->get("search");
        if($search){
            $module = Module::where('promo', 'like', '%'.$search.'%')
                ->get();
        }else{
            $module = Module::all();
        }
        return view("module.index",["current_promo_id" => $request->get("promo"),
                                        "current_student_id" => $request->get("students"),
                                        "modules"=>Module::all(),"modules" => $module, "search" => $search]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Request $request): View {
        return \view(
            "module.create",
            [
                "promos" => Promo::all(),
                "students" => Student::all(),
                "current_promo_id" => $request->input("promo_id"),
                "current_student_id" => $request->input("student_id"),
            ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $newModule = new Module();
        $newModule->promo = $request->input("promo");
        $newModule->description = $request->input("description");
        $newModule->save();

        $newModule->promos()->attach($request->input("promos"));
        $newModule->students()->attach($request->input("students"));

        return redirect()->route(
            "module.index",
            [
                "promo" => $request->get("promo_id"),
                "student" => $request->get("student_id"),
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Module $module
     * @param Promo $promo
     * @return View
     */
    public function show(Module $module): View {
        return view("module.show", ["current_module" => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Module $module
     * @return View
     */
    public function edit(Module $module) {
        return \view("module.edit",
            [
                "promos" => Promo::all(),
                "modules"=> Module::all(),
                "students"=> Student::all(),
                "editing_module" => $module
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Module $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $module->promo = $request->input("promo");
        $module->description = $request->input("description");
        $module->promos()->detach();
        $module->promos()->attach($request->input("promos"));
        $module->save();

        return redirect()->route("module.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Module $module
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->action([ModuleController::class, 'index']);
    }
}
