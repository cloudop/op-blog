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
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('分类列表');
            $content->row(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $grid = Admin::grid(Models\Category::class, function(Grid $grid){
                        $grid->id('Id')->sortable();
                        $grid->name('名称')->editable()->setAttributes(['width' => '40%']);
                        // 影响性能，算了
                        // $grid->posts('文章数')->display(function ($posts) {
                        //     $count = count($posts);
                        //     return "<span class='label label-warning'>{$count}</span>";
                        // });
                        $grid->created_at('创建时间');
                        $grid->filter(function ($filter) {
                            $filter->between('created_at', 'Created Time')->datetime();
                        });
                        $grid->paginate(20);
                        $grid->disableExport();
                    });
                    $column->append($grid);
                });
            });

        });
    }


    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('分类');
            $content->row(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->append($this->_createForm());
                });
            });
        });
    }

    /**
     * 表单对象
     *
     */
    private function _createForm($id = null)
    {
        return Admin::form(Models\Category::class, function (Form $form) use ($id){
            $form->text('name', '名称')->rules('required');
            $form->display('created_at', 'Created At')->rules('required');
            // 抛出错误信息
            // saving和saved在展示表单的时候是冗余的
            // $form->saving(function ($form) {
            //     $error = new MessageBag([
            //         'title'   => 'title...',
            //         'message' => 'message....',
            //     ]);
            //     return back()->with(compact('error'));
            // });
        });
    }

    /**
     * form 提交创建
     *
     */
    public function store(Request $request)
    {
        return $this->_createForm()->store();
    }


    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->body($this->_createForm()->edit($id));
        });
    }

    /**
     * ajax update
     *
     */
    public function update($id)
    {
        return $this->_createForm($id)->update($id);
    }

    /**
     * ajax delete
     *
     */
    public function destroy($id)
    {
        if ($this->_createForm()->destroy($id)) {
            return response()->json([
                'status'  => true,
                'message' => 'Succeeded',
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Failed',
            ]);
        }
    }
}
