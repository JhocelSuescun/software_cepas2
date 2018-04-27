<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DataTables;

class AjaxdataController extends Controller
{
    function index()
    {
     return view('ajaxdata');
     //http://127.0.0:8000/ajaxdata
    }

    function getdata()
    {
     $students = Student::select('first_name', 'last_name','id');
     return DataTables::of($students)->make(true);
    }
}
