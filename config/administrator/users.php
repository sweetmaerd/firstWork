<?php

return array(
    'title' => 'Пользователи',
    'single' => 'пользователя',
    'model' => 'App\User',
    'form_width'=>500,
    'permission'=> function() {
        return (Auth::user()->role == 'admin')? TRUE:FALSE;
    },
    

    //колонки
    'columns'=>array(
        'id'=>array('width'=>'10px',),
        'name'=>array(
            'title'=>'Имя'
        ),
        'email'=> array(
            'title'=>'E-mail'
        ),
        'role'=>array(
            'title'=>'Роль',
        ),
        'select' => "WHERE((:table).id=Auth::user()->id)",

    ),

    //фильтры
    'filters'=>array(
        'id'=>array(
            'title'=>'ID пользователя',
            ),
        'name'=> array(
            'title'=>'Имя',
        ),
        'email'=>array(
            //'type'=>'relationship',
            'title'=>'E-mail',
           // 'name_field' => 'name'
        ),
        'role'=>array(
            'title'=>'Роль'
        )
    ),

    //формы
    'edit_fields' => array(
        'name' => array(
            'title'=>'Имя пользователя',
        ),
        'email'=>array(
            'title'=> 'E-mail'
        ),
        'role'=>array(
            //'type'=>'relationship',
            'title'=>'Роль',
            // 'name_field' => 'name'
        )
    )
);