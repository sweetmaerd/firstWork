<?php
return array(
    'title' => 'Категории',
    'single' => 'категорию',
    'model' => 'App\Category',
    'form_width'=>500,
    'permission'=> function() {
        return (Auth::user()->role_id == '1')? TRUE:FALSE;
    },

    //колонки
    'columns'=>array(
        'id'=>array('width'=>'10px'),
        'parent_id'=>array(
            'title'=>'Подкатегория'
        ),
        'name'=>array(
            'title'=>'Категория'
        ),
        'alias'=> array(
            'title'=>'Подкатегория'
        ),
        'showhide',

    ),

    //фильтры
    'filters'=>array(
        'id'=>array(
            'title'=>'ID категории',
        ),
        'parent_id'=>array(
            'title'=>'Подкатегория'
        ),
        'name'=> array(
            'title'=>'Категория',
        ),
        'alias'=>array(
            //'type'=>'relationship',
            'title'=>'Подкатегория',
            //'name_field' => ''
        ),
        'showhide'=>array(
            'title'=>'Видимость',
            'options' => array('show', 'hide'),
            'type'=>'enum'
        ),
    ),

    //формы
    'edit_fields' => array(

        'parent_id'=>array(
            'title'=>'Подкатегория'
        ),
        'name' => array(
            'title'=>'Название категории',
        ),
        'alias'=>array(
            //'type'=>'relationship',
            'title'=>'Подкатегория',
            // 'name_field' => 'name'
        ),
        'showhide'=>array(
            'title'=> 'Видимость',
            'options' => array('show', 'hide'),
            'type'=>'enum'
        ),
    )
);