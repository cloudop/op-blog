<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use FlushTrait;
    public function __construct()
    {
        $this->flushHeader();
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
                foreach ($rs as $value) {
                    if ($value->id == $id) {
                        $assignArr['postData'] = $value;
                        $assignArr['statData'] = $value->stat->toArray();
                        $value->stat->increment('view', 1);
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

    public function favorite(int $postId, int $likeOrNot)
    {
        try {
            $checkKey = 'post-favorite-'. $postId. '-'. $_SERVER['REMOTE_ADDR'];
            $check = Models\Check::firstOrCreate(['key' => $checkKey]);
            if ($check->wasRecentlyCreated != true) {
                throw new \Exception('duplicate');
            }
            $field = 'nine';
            if ($likeOrNot) {
                $field = 'six';
            }
            Models\Stat::where('post_id', $postId)->increment($field, 1);
            return response()->json([
                'code' => '0',
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => '-1',
                'message' => $e->getMessage(),
                'exception' => $e->getLine(). ' '. $e->getFile(). ' '. $e->getMessage()
            ]);
        }
    }


}