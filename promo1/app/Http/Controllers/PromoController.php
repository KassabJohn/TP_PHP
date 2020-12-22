<?php

namespace App\Http\Controllers;

use App\Address;
use App\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        if ($search) {
            $promo = Promo::where('promo', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('schoolname', 'like', '%' . $search . '%')
                ->orWhere('specialite', 'like', '%' . $search . '%')
                ->get();
        } else {
            $promo = Promo::all();
        }
        return view("promo.index", ["promos" => $promo, "search" => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("promo.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $promo = new Promo();
        $promo->promo = $request->input("promo");
        $promo->moodle = $request->input("moodle");
        $promo->description = $request->input("description");
        $promo->schoolname = $request->input("schoolname");
        $promo->specialite = $request->input("specialite");
        $promo->save();
        return redirect()->action([PromoController::class, 'index']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Promo $promo)
    {
        return view("promo.show", ["p" => $promo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promo $promo)
    {
        return view("promo.edit", ["p" => $promo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        $p = Promo::find($promo->id);
        $p->update([
            "promo" => $request->input("promo"),
            "moodle" => $request->input("moodle"),
            "description" => $request->input("description"),
            "schoolname" => $request->input("schoolname"),
            "specialite" => $request->input("specialite"),
        ]);

        return redirect()->action([PromoController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promo)
    {
        if (sizeof($promo->students) == 0) {
            $promo->modules()->detach();
            $promo->delete();
            return redirect()->action([PromoController::class, 'index']);
        }
        else {
            return redirect()->action([PromoController::class, 'index']);
        }
    }
}
