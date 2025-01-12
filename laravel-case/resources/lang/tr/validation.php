<?php

return [
    'accepted' => ':attribute kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL değil.',
    'after' => 'Tarih, :date tarihinden sonra olmalıdır.',
    'after_or_equal' => ':attribute, :date tarihine eşit veya sonra olmalıdır.',
    'alpha' => ':attribute sadece harf içerebilir.',
    'alpha_dash' => ':attribute sadece harf, rakam, tire ve alt çizgi içerebilir.',
    'alpha_num' => ':attribute sadece harf ve rakam içerebilir.',
    'array' => ':attribute bir dizi olmalıdır.',
    'before' => ':attribute, :date tarihinden önce olmalıdır.',
    'before_or_equal' => ':attribute, :date tarihine eşit veya önce olmalıdır.',
    'between' => [
        'numeric' => ':attribute, :min ile :max arasında olmalıdır.',
        'file' => ':attribute, :min ile :max kilobayt arasında olmalıdır.',
        'string' => ':attribute, :min ile :max karakter arasında olmalıdır.',
        'array' => ':attribute, :min ile :max öğe arasında olmalıdır.',
    ],
    'boolean' => ':attribute alanı true veya false olmalıdır.',
    'confirmed' => ':attribute doğrulama eşleşmiyor.',
    'date' => ':attribute geçerli bir tarih değil.',
    'date_equals' => ':attribute, :date tarihine eşit olmalıdır.',
    'date_format' => ':attribute, :format formatıyla eşleşmiyor.',
    'different' => ':attribute ve :other farklı olmalıdır.',
    'digits' => ':attribute, :digits basamaklı olmalıdır.',
    'digits_between' => ':attribute, :min ile :max basamak arasında olmalıdır.',
    'dimensions' => ':attribute geçersiz resim boyutlarına sahip.',
    'distinct' => ':attribute alanı yinelenen bir değere sahip.',
    'email' => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'ends_with' => ':attribute aşağıdaki değerlerden biriyle bitmelidir: :values',
    'exists' => 'Seçili :attribute geçersiz.',
    'file' => ':attribute bir dosya olmalıdır.',
    'filled' => ':attribute alanı gereklidir.',
    'gt' => [
        'numeric' => ':attribute, :value değerinden büyük olmalıdır.',
        'file' => ':attribute, :value kilobayttan büyük olmalıdır.',
        'string' => ':attribute, :value karakterden daha uzun olmalıdır.',
        'array' => ':attribute, :value öğeden daha fazla olmalıdır.',
    ],
    'gte' => [
        'numeric' => ':attribute, :value değerine eşit veya büyük olmalıdır.',
        'file' => ':attribute, :value kilobayta eşit veya büyük olmalıdır.',
        'string' => ':attribute, :value karaktere eşit veya daha uzun olmalıdır.',
        'array' => ':attribute, :value veya daha fazla öğe içermelidir.',
    ],
    'image' => ':attribute bir resim olmalıdır.',
    'in' => 'Seçili :attribute geçersiz.',
    'in_array' => ':attribute alanı :other içinde mevcut değil.',
    'integer' => ':attribute bir tamsayı olmalıdır.',
    'ip' => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute geçerli bir JSON dizesi olmalıdır.',
    'lt' => [
        'numeric' => ':attribute, :value değerinden küçük olmalıdır.',
        'file' => ':attribute, :value kilobayttan küçük olmalıdır.',
        'string' => ':attribute, :value karakterden daha kısa olmalıdır.',
        'array' => ':attribute, :value öğeden daha az olmalıdır.',
    ],
    'lte' => [
        'numeric' => ':attribute, :value değerine eşit veya küçük olmalıdır.',
        'file' => ':attribute, :value kilobayta eşit veya küçük olmalıdır.',
        'string' => ':attribute, :value karaktere eşit veya daha kısa olmalıdır.',
        'array' => ':attribute, :value veya daha az öğe içermelidir.',
    ],
    'max' => [
        'numeric' => ':attribute, :max değerinden büyük olamaz.',
        'file' => ':attribute, :max kilobayttan büyük olamaz.',
        'string' => ':attribute, :max karakterden uzun olamaz.',
        'array' => ':attribute, :max öğeden fazla olamaz.',
    ],
    'mimes' => ':attribute, :values türünde bir dosya olmalıdır.',
    'mimetypes' => ':attribute, :values türünde bir dosya olmalıdır.',
    'min' => [
        'numeric' => ':attribute, en az :min olmalıdır.',
        'file' => ':attribute, en az :min kilobayt olmalıdır.',
        'string' => ':attribute, en az :min karakter olmalıdır.',
        'array' => ':attribute, en az :min öğe içermelidir.',
    ],
    'not_in' => 'Seçili :attribute geçersiz.',
    'not_regex' => ':attribute biçimi geçersiz.',
    'numeric' => ':attribute bir sayı olmalıdır.',
    'password' => 'Parola yanlış.',
    'present' => ':attribute alanı mevcut olmalıdır.',
    'regex' => ':attribute biçimi geçersiz.',
    'required' => ':attribute alanı gereklidir.',
    'required_if' => ':attribute alanı, :other :value olduğunda gereklidir.',
    'required_unless' => ':attribute alanı, :other :values içinde değilse gereklidir.',
    'required_with' => ':attribute alanı, :values mevcut olduğunda gereklidir.',
    'required_with_all' => ':attribute alanı, :values mevcut olduğunda gereklidir.',
    'required_without' => ':attribute alanı, :values mevcut olmadığında gereklidir.',
    'required_without_all' => ':attribute alanı, :values değerlerinden hiçbiri mevcut olmadığında gereklidir.',
    'same' => ':attribute ve :other eşleşmelidir.',
    'size' => [
        'numeric' => ':attribute, :size olmalıdır.',
        'file' => ':attribute, :size kilobayt olmalıdır.',
        'string' => ':attribute, :size karakter olmalıdır.',
        'array' => ':attribute, :size öğe içermelidir.',
    ],
    'starts_with' => ':attribute aşağıdaki değerlerden biriyle başlamalıdır: :values',
    'string' => ':attribute bir metin olmalıdır.',
    'timezone' => ':attribute geçerli bir saat dilimi olmalıdır.',
    'unique' => ':attribute zaten alınmış.',
    'uploaded' => ':attribute yüklemesi başarısız.',
    'url' => ':attribute biçimi geçersiz.',
    'uuid' => ':attribute geçerli bir UUID olmalıdır.',
    'current_week' => 'Tarihler bulunduğumuz hafta içerisinde olmalıdır.',
    'hourly' => 'Tarihler saat başı olmalıdır.',
    'package_max_limit' => 'Her kullanıcı en fazla 5 pakete sahip olabilir.',
    'experience_period' => 'Periyod geçerli bir tarih aralığı olmalıdır ve başlangıç tarihi, bitiş tarihinden önce olmalıdır ve bugünden küçük olmalıdır. Geçerli format : YYYY-MM/YYYY-MM',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'availabilities.*.date' => [
            'date_format' => 'Tarih alanı Y-m-d H:i:s formatında olmalıdır.',
            'after' => 'Tarih alanı bugünden sonraki bir tarih olmalıdır.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'Ad',
        'email' => 'E-posta adresi',
        'password' => 'Parola',
        'password_confirmation' => 'Parola tekrarı',
        'quantity' => 'Miktar',
    ],
];
