<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

function helloInsideApi(){
    return "<h1>Hello World Inside Api </h1>";
}


    function getStudents(){

        $students = Student::all();

        if($students -> isEmpty() ){

            return response() -> json( [
                "status" => 404,
                "message" => "Error no record found in the DB"
            ] , 404);
        }
        else{
// Making an Asssoc array with the keys and values
                $student_data = [
                    "status" => 200,
                    "students" => $students
                    ];
            return response() -> json( $student_data, 200);
        }
    }

    function addStudents(Request $req) {

        $validator = Validator::make($req -> all(), [
            "course" => "required| string| max:200" ,
            "age" => "required| integer | digits:2 ",
            "city" => "required| string | max:200"
        ]);


        if($validator -> fails()){

            return response()->json([
                "status" => 422,
                "errors" => $validator ->messages()
            ], 422);
        }
        else{
            $students = Student::create([
                "course" => $req ->course,
                "age" => $req -> age,
                "city" => $req -> city
            ]);
        }

        if($students){
            return response()->json( [
                'status' => 200,
                "Success message" => "User Data added successfully"
            ], 200);
        }
        else{
            return response()->json([
                "status" => 500,
                "message" => " Something went wrong"
            ], 500);
        }


    }

    

}
