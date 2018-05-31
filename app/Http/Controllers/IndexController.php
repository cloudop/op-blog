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
            $postRs = Models\Post::with('category:id,name')
                        ->select('id', 'author', 'head', 'subhead', 'guide', 'created_at', 'category_id', 'content')
                        ->orderBy('id', 'desc')
                        ->take(10)
                        ->get();
            $postData = [];
            $assignArr = [
                'bannerPost' => [],
                'recommendPost' => [],
                'posts' => []
            ];
            if (count($postRs) > 0) {
                $guideShowLen = 70;
                foreach ($postRs as $key => $value) {
                    if ($key < 3 && mb_strlen($value['guide']) > $guideShowLen) {
                        $value['guide'] = mb_substr($value['guide'], 0, $guideShowLen). '...';
                    }
                    $postData[] = $value;
                }
                $assignArr = [
                    'title' => '西瓜炒面',
                    'guide' => '林云开的个人站',
                    'bannerPost' => array_shift($postData),
                    'recommendPost' => array_splice($postData, 0, 2),
                    'posts' => $postData
                ];
            }
            return view('index/index', $assignArr);
        } catch (\Exception $e) {
            echo $e->getMessage();
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