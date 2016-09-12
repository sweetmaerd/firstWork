<?php

return array(
    'title' => 'Роль',
    'single' => 'роль',
    'model' => 'App\Role',
    'form_width'=>500,
    'permission'=> function() {
        return (Auth::user()->role_id == '1')? TRUE:FALSE;
    },
    

    //колонки
    'columns'=>array(
        'id'=>array('width'=>'10px',),
        'name'=>array(
            'title'=>'Роль'
        ),
        'showhide'=>array(
            'title'=>'Актуальность',
        )

    ),

    //фильтры
    'filters'=>array(
        'id'=>array(
            'title'=>'ID',
            ),
        'name'=> array(
            'title'=>'Роль',
        ),
        'showhide'=>array(
            'title'=>'Актуальность',
            'type' => 'enum',
            'options' => array('show','hide')
        )
    ),

    //формы
    'edit_fields' => array(
        'name'=> array(
            'title'=>'Роль',
        ),
        'showhide'=>array(
            'title'=>'Актуальность',
            'type' => 'enum',
            'options' => array('show','hide')
        )
    )
);