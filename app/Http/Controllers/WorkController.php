<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models;

class WorkController extends Controller
{
    public function __construct()
    {

    }


    public function show(Request $request)
    {
        try {
            $assignArr = [
            ];
            return view('work/show', $assignArr);
        } catch (\Exception $e) {

        }
    }

}