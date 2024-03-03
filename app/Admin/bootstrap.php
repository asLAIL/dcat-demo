<?php

use App\Admin\Grid\Tools\SwitchGridMode;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Form;
use Dcat\Admin\Grid\Filter;
use Dcat\Admin\Layout\Navbar;
use Dcat\Admin\Show;
use Dcat\Admin\Repositories\Repository;
/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

// dd(config('app.locale'));
config(['app.locale' => 'zh_CN']);
Admin::navbar(function (Navbar $navbar) {
  
    // 下拉菜单
    // $navbar->right(view('admin.language'));

   

    // 下拉面板
    // $navbar->right(view('admin.notice'));
});