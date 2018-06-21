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
use Illuminate\Support\Str;


use App\Models;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Post Index');
            $content->row(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $grid = Admin::grid(Models\Post::class, function(Grid $grid){
                        // 第一列显示id字段，并将这一列设置为可排序列
                        $grid->id('Id')->sortable();
                        $grid->head('标题')->editable()->setAttributes(['width' => '40%']);
                        $grid->author('作者');
                        $grid->category('分类')->name();
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
                        $grid->paginate(10);

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

    /**
     * 表单对象
     *
     */
    private function _createForm($id = null)
    {
        return Admin::form(Models\Post::class, function(Form $form) use ($id){
            $form->text('author', '作者')->rules('required');
            $catRs = Models\Category::select('id', 'name')->get();
            $catOptions = [];
            if ($catRs) {
                foreach ($catRs->toArray() as $value) {
                    $catOptions[$value['id']] = $value['name'];
                }
            }
            $form->select('category_id', '分类')->options($catOptions)->rules('required');
            $form->text('head', '标题')->rules('required');
            // 等pullrequest merge了之后
            // $form->text('subhead', '副标题')->rules('required')->customFormat(function($value) {
            //     return str_replace('-', ' ', $value);
            // });
            $form->text('subhead', '副标题')->rules('required');
            $form->textarea('guide')->rows(5)->rules('required');
            $form->editor('content')->rules('required');
            $form->display('created_at', 'Created At')->rules('required');
            // 抛出错误信息
            // saving和saved在展示表单的时候是冗余的
            $form->saving(function ($form) {
                $form->subhead = Str::slug($form->subhead);
                // $error = new MessageBag([
                //     'title'   => 'title...',
                //     'message' => 'message....',
                // ]);
                // return back()->with(compact('error'));
            });
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
