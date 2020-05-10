<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class uploadgradescontroller extends Controller
{
    public function index()
    {
        $x = AUTH::user()->name;
        $uploadgrade = DB::select("select * from users INNER JOIN studentandclasses on users.id = studentandclasses.studentId
        INNER JOIN classes on studentandclasses.classId=classes.id where classes.teacher='$x'");
        $statment2 = DB::select("select * from classes where teacher='$x'");
        //$uploadgrade = DB::select("select name,selected,courseid from $statment1 UNION $statment2");
        //$uploadgrade = DB::select("select * from users");
        return view('UploadGrade', ['uploadgrade' => $uploadgrade]);
    }

    function update(Request $request)
    {
        $week = $request->input('QuizWeek');
        $grade = $request->input('Grade');
        $sid = $request->input('id');
        DB::update("update grades set quizweek=$week, grade=$grade where sid=$sid");
        return view("/Teacher");
    }


    public function insert(Request $request)
    {
        $week = $request->input('QuizWeek');
        $grade = $request->input('Grade');
        $sid = $request->input('id');
        $data = array('sid' => $sid, "quizweek" => $week, "grade" => $grade);
        DB::table('grades')->insert($data);
        return view("/Teacher");
    }
}
