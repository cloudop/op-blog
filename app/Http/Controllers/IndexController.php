<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class IndexController extends Controller
{
    use FlushTrait;
    public function __construct()
    {
        $this->flushHeader();
    }

    public function index(Request $request)
    {
        try {
            $input = $request->only('category_id');
            $cond = [];
            $input['category_id'] = empty($input['category_id'])? 0: intval($input['category_id']);
            if ($input['category_id'] > 0) {
                $cond['category_id'] = (int) $input['category_id'];
            }
            $postRs = Models\Post::with('category:id,name')
                        ->select('id', 'author', 'head', 'subhead', 'guide', 'created_at', 'category_id', 'content')
                        ->where($cond)
                        ->orderBy('id', 'desc')
                        ->take(20)
                        ->get();
            $postData = [];
            if (!empty($postRs)) {
                $guideShowLen = 105;
                foreach ($postRs->toArray() as $key => $value) {
                    if (mb_strlen($value['guide']) > $guideShowLen) {
                        $value['guide'] = mb_substr($value['guide'], 0, $guideShowLen). '...';
                    }
                    $postData[] = $value;
                }

            }
            $assignArr = [
                'title' => 'clougop',
                'guide' => '林云开的个人站',
                'posts' => $postData,
                'categoryId' => $input['category_id']
            ];
            return view('index/index0', $assignArr);
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