<?php

return array(
    'title' => 'Пользователи',
    'single' => 'пользователя',
    'model' => 'App\User',
    'form_width'=>500,
    'permission'=> function() {
        return (Auth::user()->role_id == '1')? TRUE:FALSE;
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
        'roles'=>array(
            'title'=>'Роль',
            'relationship'=>'role',
            'select' => '(:table).name'

        )

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
            'title'=>'Роль',
            'type'=>'relationship',
            'name_field' => 'name'
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
            'title'=>'Роль',
            'type'=>'relationship',
            'name_field' => 'name'
        )
    )
);