<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;


use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\MessageBag;


use App\Models;

class PostController extends Controller
{
    public function index()
    {
        // return Admin::content(function (Content $content) {
        //
        //     $content->header('Post Index');
        //     $content->description('');
        //
        //     $content->row(function (Row $row) {
        //
        //         $row->column(4, function (Column $column) {
        //             $column->append(Dashboard::environment());
        //         });
        //
        //         $row->column(4, function (Column $column) {
        //             $column->append(Dashboard::extensions());
        //         });
        //
        //         $row->column(4, function (Column $column) {
        //             $column->append(Dashboard::dependencies());
        //         });
        //     });
        // });
        return Admin::content(function (Content $content) {

            $content->header('Post Index');
            $content->row(function (Row $row) {

                $row->column(12, function (Column $column) {
                    $grid = Admin::grid(Models\PostModel::class, function(Grid $grid){

                        // 第一列显示id字段，并将这一列设置为可排序列
                        $grid->id('Id')->sortable();

                        $grid->head('标题');

                        // 第二列显示title字段，由于title字段名和Grid对象的title方法冲突，所以用Grid的column()方法代替
                        // $grid->column('title');

                        // 第三列显示director字段，通过display($callback)方法设置这一列的显示内容为users表中对应的用户名
                        // $grid->director()->display(function($userId) {
                        //     return User::find($userId)->name;
                        // });

                        // 下面为三个时间字段的列显示
                        $grid->created_at('创建时间');

                        // filter($callback)方法用来设置表格的简单搜索框
                        $grid->filter(function ($filter) {

                            // 设置created_at字段的范围查询
                            $filter->between('created_at', 'Created Time')->datetime();
                        });
                        // 默认为每页20条
                        $grid->paginate(15);
                        $grid->disableExport();
                    });
                    // return $grid;
                    $column->append($grid);
                });
            });

        });
    }


    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('post');
            $content->row(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->append($this->_createForm());
                });
            });
        });
    }

    private function _createForm()
    {
        return Admin::form(Models\PostModel::class, function (Form $form) {
            $form->setAction('save');
            $form->text('head', '标题');
            $form->display('created_at', 'Created At');
            // 抛出错误信息
            $form->saving(function ($form) {
                $error = new MessageBag([
                    'title'   => 'title...',
                    'message' => 'message....',
                ]);
                return back()->with(compact('error'));
            });
        });
    }

    public function save()
    {
        print_r($_POST);
    }


    public function edit()
    {

    }
}
