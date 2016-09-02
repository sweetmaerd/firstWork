<?php
/**
 * Created by PhpStorm.
 * User: SRZAI
 * Date: 02.09.16
 * Time: 20:25
 */
return array(
    'title' => 'Товар',
    'single' => 'товар',
    'model' => 'App\Product',
    'form_width'=>500,

    //колонки
    'columns'=>array(
        'id'=>array('width'=>'10px'),
        'img'=>array(
            'title'=>'Изображение',
            'width'=>100,
            'output'=>"<img src=".url('public/media/uploads'.(((":value")!=null)?'/(:value)':'/default.jpg'))." width='50px'/>"
        ),
        'title',
        'categories',
        'author',
        'showhide',

    ),

    //фильтры
    'filters'=>array(
        'id','title','author','showhide'
    ),

    //формы
    'edit_fields' => array(
        'title' => array(
            'title'=>'Название',
        ),
        'description'=>array(
            'title'=> 'описание',
            'type'=>'wysiwyg'
        ),
        'img'=>array(
            'title'=>'Изображение 500x300',
            'type'=>'image',
            'location'=>'../public/media/uploads/',
            'naming'=>'random',
            'lenght'=>20,
            'size'=>array(
                array(200,150,'landscape',url('public/media/uploads/s_'),100)
            )
        ),
        'author'=>array(
            'title'=> 'Автор',
            //'type'=>'select',
        ),
        'showhide'=>array(
            'title'=> 'Видимость',
            //'type'=>'select'
        ),
    )
);