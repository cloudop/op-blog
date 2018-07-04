<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
    }

    public function show(int $id)
    {
        try {
            $assignArr = [
                'prev' => false,
                'next' => false,
                'postData' => null
            ];
            $cond = [
                ['id', '>=', $id]
            ];
            $rs = Models\Post::where($cond)->orderBy('id', 'asc')->take(2)->get();
            if ($rs) {
                // $rs->each(function ($postData) use ($assignArr, $id) {
                //     var_dump($postData->head);
                //     if ($postData->id == $id) {
                //         var_dump('aaa');
                //         $assignArr['postData'] = $postData->toArray();
                //     }
                //     if ($postData->id > $id) {
                //         $assignArr['next'] = $postData->toArray();
                //     }
                // });
                // var_dump($assignArr);
                foreach ($rs as $value) {
                    if ($value->id == $id) {
                        $assignArr['postData'] = $value;
                        $r = Models\Stat::updateOrCreate([
                            'post_id' => $value->id
                        ], [
                            'view' => DB::raw('view+1'),
                        ]);
                        // var_dump($r->wasRecentlyCreated);
                        // var_dump($r->isDirty());
                        // $value->stat;
                        // $value->stat->increment('view');
                    }
                    if ($value->id > $id) {
                        $assignArr['next'] = $value;
                    }
                }
            }
            $preData = Models\Post::select('id', 'head', 'subhead')->where([['id', '<', $id]])->orderBy('id', 'desc')->first();
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
            $postRs = Models\Post::select('id', 'head', 'subhead')
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