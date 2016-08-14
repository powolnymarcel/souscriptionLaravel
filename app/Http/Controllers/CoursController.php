<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CoursController extends Controller
{
    public function index()
    {
        return 'Index du cours';
    }

    public function pro()
    {
        return 'Index du cours pro';
    }
}
