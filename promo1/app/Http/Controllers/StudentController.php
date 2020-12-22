<?php

namespace App\Http\Controllers;

use App\Student;
use App\Promo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        if($search){
            $student = Student::where('firstname', 'like', '%'.$search.'%')
                ->orWhere('lastname', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->get();
        }else{
            $student = Student::all();
        }
        return view("student.index", ["students" => Student::all(), "search" => null, "students" => $student, "search" => $search]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @param Promo $promo
     * @return Application|Factory|View
     */
    public function create(Request $request, Promo $promo)
    {
        $promo_id = $request->input("promo");

        return view(
            "student.create",
            ["promo" => Promo::find($promo_id)]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $newStudent = new Student();
        $newStudent->firstname = $request->input("firstname");
        $newStudent->lastname = $request->input("lastname");
        $newStudent->email = $request->input("email");
        $newStudent->promo_id = $request->input("promo_id");

        $newStudent->save();

        return redirect()->route("student.index");
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return View
     */
    public function show(Student $student): View {
        return view("student.show", ["student" => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return View
     */
    public function edit(Student $student): View
    {
        return view("student.edit", ["student"=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param Student $student
     * @return RedirectResponse
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
           "firstname" => $request->input("firstname"),
            "lastname" => $request->input("lastname"),
            "email" => $request->input("email")
        ]);

        return redirect()->action([StudentController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return RedirectResponse
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->action([StudentController::class, 'index']);
    }
}
