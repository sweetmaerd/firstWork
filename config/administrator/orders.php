<?php

/**
 * Created by PhpStorm.
 * User: SRZAI
 * Date: 02.09.16
 * Time: 20:25
 */
return array(
    'title' => 'Заказы',
    'single' => 'заказ',
    'model' => 'App\Order',
    'form_width'=>500,
    'permission'=> function() {
        return (Auth::user()->role_id == '1')? TRUE:FALSE;
    },

    //колонки
    'columns'=>array(
        'id',
        'user_id'=>array(
            'title'=>'Id пользователя'
        ),
        'fio'=>array(
            'title'=>'ФИО'
        ),
        'email'=>array(
            'title'=>'Почта',
        ),
        'phone'=> array(
            'title'=>'Телефон'
        ),
        'zakaz'=>array(
            'title'=>'Заказ'
        ),
        'status'=>array(
            'title'=>'Статус заказа'
        )
    ),

    //фильтры
    'filters'=>array(
        'id'=>array(
            'title'=>'ID заказа'
        ),
        'user_id'=>array(
            'title'=>'Id пользователя'
        ),
        'fio'=>array(
            'title'=>'ФИО'
        ),
        'email'=>array(
            'title'=>'Почта',
        ),
        'phone'=> array(
            'title'=>'Телефон'
        ),
        'status'=>array(
            'title'=>'Статус заказа',
            'options' => array('new', 'open','close'),
            'type'=>'enum'
        )
    ),

    //формы
    'edit_fields' => array(
        'fio'=>array(
            'title'=>'ФИО'
        ),
        'email'=>array(
            'title'=>'Почта',
        ),
        'phone'=> array(
            'title'=>'Телефон',
        ),
        'zakaz'=>array(
            'title'=>'Заказ'
        ),
        'status'=>array(
            'title'=>'Статус заказа',
            'options' => array('new', 'open','close'),
            'type'=>'enum'
        )
    ),
);