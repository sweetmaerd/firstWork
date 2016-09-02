<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Следующие строки языка содержат сообщения об ошибке по умолчанию,  используемые в
    | классе validator. Некоторые из этих правил имеют несколько версий, таких как правила
    | размера. Не стесняйтесь настроить каждое из этих сообщений здесь.
    |
    */

    'accepted'             => ':attribute должен быть введен.',
    'active_url'           => ':attribute не является допустимым URL.',
    'after'                => ':attribute должна быть после даты :date.',
    'alpha'                => ':attribute может содержать только буквы.',
    'alpha_dash'           => ':attribute может содержыть только буквы, цифры и дефис.',
    'alpha_num'            => ':attribute может содержыть только буквы и цифры.',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute должна быть до даты :date.',
    'between'              => [
        'numeric' => ':attribute должен быть между :min and :max.',
        'file'    => ':attribute должен быть между :min and :max Kbyte.',
        'string'  => ':attribute должен иметь длинну между :min and :max. символов',
        'array'   => ':attribute должен иметь элементы между:min and :max.',
    ],
    'boolean'              => ':attribute поле должно быть true или false.',
    'confirmed'            => ':attribute подтверждение не совпадает.',
    'date'                 => ':attribute не является действительной датой.',
    'date_format'          => ':attribute не соответствует формату :format.',
    'different'            => ':attribute и :other должны быть разными.',
    'digits'               => ':attribute должен быть :digits цифровым.',
    'digits_between'       => ':attribute должен быть между :min and :max цифровым.',
    'email'                => ':attribute e-mail должен быть действительным.',
    'exists'               => 'Выбранный :attribute является недействительным.',
    'filled'               => ':attribute должно быть заполнено.',
    'image'                => ':attribute должен быть изображением.',
    'in'                   => ':attribute не действителен.',
    'integer'              => ':attribute должен быть integer.',
    'ip'                   => ':attribute должен быть действительным IP адресом.',
    'json'                 => ':attribute должен быть действительной JSON строкой.',
    'max'                  => [
        'numeric' => ':attribute не может быть больше, чем :max.',
        'file'    => ':attribute не может быть больше, чем :max Kbyte.',
        'string'  => ':attribute не может быть больше, чем :max символов.',
        'array'   => ':attribute не может быть больше, чем :max элементов.',
    ],
    'mimes'                => ':attribute должен быть файл типа: :values.',
    'min'                  => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file'    => ':attribute должен быть не менее :min Kbyte.',
        'string'  => ':attribute должен быть не менее :min символов.',
        'array'   => ':attribute должен быть не менее :min элементов.',
    ],
    'not_in'               => 'Выбранный :attribute является недействительным.',
    'numeric'              => ':attribute должен быть number.',
    'regex'                => ':attribute неверный формат.',
    'required'             => ':attribute должно быть заполнено.',
    'required_if'          => ':attribute обязательно для заполнения, когда :other = :value .',
    'required_unless'      => ':attribute не требуется, если :other = :values.',
    'required_with'        => ':attribute обязательно для заполнения, когда присутствует значение :values .',
    'required_with_all'    => ':attribute обязательно для заполнения, когда присутствует значение :values .',
    'required_without'     => ':attribute обязательно для заполнения, когда нет значения :values .',
    'required_without_all' => ':attribute обязательно для заполнения, когда нет ни одного значения :values .',
    'same'                 => ':attribute и :other должен соответствовать.',
    'size'                 => [
        'numeric' => ':attribute должен быть :size.',
        'file'    => ':attribute должен быть :size Kbyte.',
        'string'  => ':attribute должен быть :size символов.',
        'array'   => ':attribute должен содержать значение :size .',
    ],
    'string'               => ':attribute должен быть string.',
    'timezone'             => ':attribute должен быть действительной timeone.',
    'unique'               => ':attribute уже был взят.',
    'url'                  => ':attribute неверный формат URL.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете задать пользовательские сообщения проверки для атрибутов с помощью
    | конвенция "attribute.rule", чтобы назвать линии. Это позволяет быстро
    | указать конкретную строку пользовательского языка для данного правила атрибута.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Следующие строки языка используются для замены атрибутов местоблюстителем
    | с чем-то большим для читателя, такие как E-Mail Address вместо
    | из "email". Это просто помогает нам создавать сообщения немного красивее.
    |
    */

    'attributes' => [
        //'categories_id' => 'Выбраная категория',
    ],

];
