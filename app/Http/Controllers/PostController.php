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
            $postData = Models\PostModel::where([
                'id' => $input['id']
            ])->first();
            if (empty($postData)) {
                throw new \Exception('post empty');
            }
            $assignArr = [
                'postData' => $postData
            ];
            return view('post/show', $assignArr);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}