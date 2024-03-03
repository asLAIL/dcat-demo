<?php
namespace App\Admin\Controllers;

use App\Admin\Metrics\Examples;
use App\Http\Controllers\Controller;
use Dcat\Admin\Http\Controllers\Dashboard;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Dcat\Admin\Http\JsonResponse;
class SysConfigController extends AdminController
{
    
    
    
    public function index(Content $content)
    {
        return $content
            ->title('配置')
            ->description('系统参数配置')
            ->body($this->form());
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
            

            $form = new Form();
            $form->disableResetButton();
            $form->tab('网站设置', function (Form $form) {

            });

            $form->action('sys/config/save');
            return $form;
    }

    public function saveConfig(Request $request){
        // dd($request);
        $input = $request->post();
        
        
        
        return JsonResponse::make()->success('设置！');
    }
    
    
    
    
    


}
