<?php
use App\Parser\Google;
/**
 * Created by PhpStorm.
 * User: SRZAI
 * Date: 02.09.16
 * Time: 20:25
 */
return array(
    'title' => 'Статьи',
    'single' => 'статью',
    'model' => 'App\Content',
    'form_width'=>500,
    'permission'=> function() {
        return (Auth::user()->role_id == '1')? TRUE:FALSE;
    },

    //колонки
    'columns'=>array(
        'id',
        'img'=>array(
            'title'=>'Изображения',
            'width'=>100,
            'output'=>"<img src=".public_path().'/media/'.('/' != ((":value"))?"uploads/(:value)":"default.jpg")." width='100px' alt=(:value)/>"
        ),
        'title'=>array(
            'title'=>'Название'
        ),
        'categories'=>array(
            'title'=>'Категория',
            'relationship'=>'category',
            'select'=>'(:table).alias'
            
        ),
        'author'=> array(
            'title'=>'Автор'
        ),
        'showhide'=>array(
            'title'=>'Видимость'
        ),
        'url'=>array(
            'title'=>'URL'
        )

    ),

    //фильтры
    'filters'=>array(
        'id'=>array(
            'title'=>'ID статьи',
        ),
        'title'=> array(
            'title'=>'Низвание статьи',
        ),
        'author'=>array(
            //'type'=>'relationship',
            'title'=>'Автор',
           // 'name_field' => 'name'
        ),
        'showhide'=>array(
            'title'=>'Видимость',
            'options' => array('show', 'hide'),
            'type'=>'enum'
        ),
        'category'=>array(
            'title'=>'Категория',
            'type'=>'relationship',
            'name_field' => 'alias'
        ),
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
                array(200,150,'landscape','../public/media/uploads/s_',100)
            )
        ),
        'category'=>array(
            'title'=>'Категория',
            'type'=>'relationship',
            'name_field' => 'alias'
        ),
        'url'=>array(
            'title'=>'ЧПУ адрес',
            'type'=>'text',
            'limit'=>'30'
        ),
        'showhide'=>array(
            'title'=> 'Видимость',
            'options' => array('show', 'hide'),
            'type'=>'enum'
        ),
    ),
    
    'global_actions'=>array(
        'parse'=>array(
            'title'=>'Найти изображение в Google',
            'message'=>array(
                'active'=>'Идет поиск изображения',
                'success'=>'Успешно',
                'error'=>'Ошибка'
            ),
            'action'=>function(&$data){
                $prods=$data->where('img','')->get();
                $obj = new Google();
                $obj->getParse($prods);
            }
        )
    )
);