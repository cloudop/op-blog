<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades;
/**
 *
 */
trait FlushTrait
{
    function flushHeader()
    {
        if (Facades\Request::ajax() == false) {
            $assignArr = [
                'title' => 'clougop',
                'guide' => '林云开的个人站'
            ];
            $view = Facades\View::make('public/header', $assignArr);
            echo $view->render();
        }
    }
}

?>