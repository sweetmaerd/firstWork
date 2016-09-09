<?php
/**
 * Created by PhpStorm.
 * User: SRZAI
 * Date: 02.09.16
 * Time: 20:25
 */
return array(
    'title' => 'Категории',
    'single' => 'категорию',
    'model' => 'App\Category',
    'form_width'=>500,
    'permission'=> function() {
        return (Auth::user()->role == 'admin')? TRUE:FALSE;
    },

    //колонки
    'columns'=>array(
        'id'=>array('width'=>'10px'),
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
        'name'=> array(
            'title'=>'Категория',
        ),
        'alias'=>array(
            //'type'=>'relationship',
            'title'=>'Подкатегория',
           // 'name_field' => 'name'
        ),
        'showhide'=>array(
            'title'=>'Видимость',
            'options' => array('show', 'hide'),
            'type'=>'enum'
        ),
    ),

    //формы
    'edit_fields' => array(
        'name' => array(
            'title'=>'Название категории',
        ),
        'description'=>array(
            'title'=> 'Описание',
            'type'=>'textarea'
        ),
        'alias'=>array(
            //'type'=>'relationship',
            'title'=>'Подкатегория',
            // 'name_field' => 'name'
        ),
        'showhide'=>array(
            'title'=> 'Видимость',
            //'type'=>'relationship',
            //'name_field' => 'name'
        ),
    )
);