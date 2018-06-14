<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class PostController extends Controller
{
    public function __construct()
    {
    }

    public function show(Request $request)
    {
        try {
            $input = $request->only('id');
            $assignArr = [
                'prev' => false,
                'next' => false
            ];
            $cond = [
                ['id', '>=', $input['id']]
            ];
            $rs = Models\Post::where($cond)->orderBy('id', 'asc')->take(2)->get();
            if ($rs) {
                foreach ($rs->toArray() as $key => $value) {
                    if ($value['id'] == $input['id']) {
                        $assignArr['postData'] = $value;
                    }
                    if ($value['id'] > $input['id']) {
                        $assignArr['next'] = $value;
                    }
                }
            }
            $preData = Models\Post::select('id', 'head')->where([['id', '<', $input['id']]])->orderBy('id', 'desc')->first();
            if (!empty($preData)) {
                $assignArr['prev'] = $preData;
            }
            $assignArr['title'] = $assignArr['postData']['head'];
            $assignArr['guide'] = $assignArr['postData']['guide'];
            $assignArr['categoryId'] = $assignArr['postData']['category_id'];
            return view('post/show', $assignArr);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function sidebar(Request $request)
    {
        try {
            $input = $request->only('category_id', 'id');
            $postRs = Models\Post::select('id', 'head')
                        ->where([
                                ['category_id', $input['category_id']],
                                ['id', '<>', $input['id']]
                            ])
                        ->orderBy('id', 'asc')
                        ->take(10)
                        ->get();
            $postArr = [];
            if ($postRs) {
                $postArr = $postRs->toArray();
            }
            $assignArr = [
                'postArr' => $postArr
            ];
            return view('post/sidebar', $assignArr);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}