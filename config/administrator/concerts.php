<?php

return array(
    'title' => 'Мероприятия',
    'single' => 'мероприятие',
    'model' => 'App\Concert',
    'form_width'=>500,
    
    
    

    //колонки
    'columns'=>array(
        'id'=>array('width'=>'10px'),
        'title'=>array(
            'title'=>'Название'
        ),
        'description'=> array(
            'title'=>'Описание',
            'type'=>'wysiwyg'
        ),
        'date'=>array(
            'title'=>'Дата',
            'type'=>'date'
        ),
        'time'=>array(
            'title'=>'Время',
            'type'=>'time'
        ),
        'showhide'=>array(
            'title'=>'Актуальность',
            'options' => array('show', 'hide'),
            'type'=>'enum'
        )

    ),

    //фильтры
    'filters'=>array(
        'id'=>array('width'=>'10px'),
        'title'=>array(
            'title'=>'Название'
        ),
        'date'=>array(
            'title'=>'Дата',
            'type'=>'date'
        ),
        'time'=>array(
            'title'=>'Время',
            'type'=>'time'
        ),
        'showhide'=>array(
            'title'=>'Актуальность',
            'options' => array('show', 'hide'),
            'type'=>'enum'
        )
    ),

    //формы
    'edit_fields' => array(
        'id'=>array('width'=>'10px'),
        'title'=>array(
            'title'=>'Название'
        ),
        'description'=> array(
            'title'=>'Описание',
            'type'=>'wysiwyg'
        ),
        'date'=>array(
            'title'=>'Дата',
            'type'=>'date'
        ),
        'time'=>array(
            'title'=>'Время',
            'type'=>'time'
        ),
        'showhide'=>array(
            'title'=>'Актуальность',
            'options' => array('show', 'hide'),
            'type'=>'enum'
        )
    )
);