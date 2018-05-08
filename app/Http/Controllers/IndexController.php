<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class IndexController extends Controller
{
    public function __construct()
    {
    }


    public function index(Request $request)
    {
        try {
            $assignArr = [
            ];
            return view('index/index', $assignArr);
        } catch (\Exception $e) {

        }
    }

    public function sidebar(Request $request)
    {
        try {
            $assignArr = [
            ];
            return view('index/sidebar', $assignArr);
        } catch (\Exception $e) {

        }
    }

}