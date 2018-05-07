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
                'prevId' => false,
                'nextId' => false
            ];
            $cond = [
                ['id', '>=', $input['id']]
            ];
            $rs = Models\PostModel::where($cond)->orderBy('id', 'asc')->take(2)->get();
            if ($rs) {
                foreach ($rs->toArray() as $key => $value) {
                    if ($value['id'] == $input['id']) {
                        $assignArr['postData'] = $value;
                    }
                    if ($value['id'] > $input['id']) {
                        $assignArr['nextId'] = $value['id'];
                    }
                }
            }
            $preData = Models\PostModel::select('id')->where([['id', '<', $input['id']]])->orderBy('id', 'desc')->first();
            if (!empty($preData)) {
                $assignArr['prevId'] = $preData['id'];
            }
            return view('post/show', $assignArr);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}