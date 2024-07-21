<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"=> "يجب قبول هذا الحقل.",
    "accepted_if"=> "يجب قبول هذا الحقل في حالة :attribute يساوي :value.",
    "active_url"=> "لا يُمثّل رابطًا صحيحًا.",
    "after"=> "يجب أن يكون تاريخًا لاحقًا للتاريخ :date.",
    "after_or_equal"=> "يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.",
    "alpha"=> "يجب أن لا يحتوي سوى على حروف.",
    "alpha_dash"=> "يجب أن لا يحتوي سوى على حروف، أرقام ومطّات.",
    "alpha_num"=> "يجب أن يحتوي على حروفٍ وأرقامٍ فقط.",
    "array"=> "يجب أن يكون مصفوفة.",
    "ascii"=> "يجب أن يحتوي هذا الحقل فقط على أحرف أبجدية رقمية أحادية البايت ورموز.",
    "attached"=> "هذا الحقل تم إرفاقه بالفعل.",
    "before"=> "يجب أن يكون تاريخًا سابقًا للتاريخ :date.",
    "before_or_equal"=> "يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date.",
    "between.array"=> "يجب أن يحتوي على عدد من العناصر بين :min و :max.",
    "between.file"=> "يجب أن يكون حجم الملف بين :min و :max كيلوبايت.",
    "between.numeric"=> "يجب أن تكون القيمة بين :min و :max.",
    "between.string"=> "يجب أن يكون عدد حروف النّص بين :min و :max.",
    "boolean"=> "يجب أن تكون قيمة هذا الحقل إما true أو false .",
    "confirmed"=> "التأكيد غير متطابق.",
    "country"=> "هذا الحقل لا يمثل دولة صالحة.",
    "date"=> "هذا ليس تاريخًا صحيحًا.",
    "date_equals"=> "يجب أن يكون تاريخاً مطابقاً للتاريخ :date.",
    "date_format"=> "لا يتوافق مع الشكل :format.",
    "decimal"=> "يجب أن يحتوي هذا الحقل على :decimal منزلة/منازل عشرية.",
    "declined"=> "يجب رفض هذه القيمة.",
    "declined_if"=> "يجب رفض هذه القيمة في حالة :attribute هو :value.",
    "different"=> "يجب أن تكون القيمة مختلفة عن :attribute.",
    "digits"=> "يجب أن يحتوي على :digits رقمًا/أرقام.",
    "digits_between"=> "يجب أن يكون بين :min و :max رقمًا/أرقام .",
    "dimensions"=> "الصورة تحتوي على أبعاد غير صالحة.",
    "distinct"=> "هذا الحقل يحمل قيمة مُكرّرة.",
    "doesnt_end_with"=> "هذا الحقل يجب ألّا ينتهي بأحد القيم التالية: :values.",
    "doesnt_start_with"=> "هذا الحقل يجب ألّا يبدأ بأحد القيم التالية: :values.",
    "email"=> "يجب أن يكون عنوان بريد إلكتروني صحيح البُنية.",
    "ends_with"=> "يجب أن ينتهي بأحد القيم التالية: :values",
    "enum"=> "القيمة المحددة غير صالحة.",
    "exists"=> "القيمة المحددة غير صالحة.",
    "file"=> "المحتوى يجب أن يكون ملفا.",
    "filled"=> "هذا الحقل إجباري.",
    "gt.array"=> "يجب أن يحتوي على أكثر من :value عناصر/عنصر.",
    "gt.file"=> "يجب أن يكون حجم الملف أكبر من :value كيلوبايت.",
    "gt.numeric"=> "يجب أن تكون القيمة أكبر من :value.",
    "gt.string"=> "يجب أن يكون طول النّص أكثر من :value حروفٍ/حرفًا.",
    "gte.array"=> "يجب أن يحتوي على الأقل على :value عُنصرًا/عناصر.",
    "gte.file"=> "يجب أن يكون حجم الملف على الأقل :value كيلوبايت.",
    "gte.numeric"=> "يجب أن تكون القيمة مساوية أو أكبر من :value.",
    "gte.string"=> "يجب أن يكون طول النص على الأقل :value حروفٍ/حرفًا.",
    "image"=> "يجب أن تكون صورةً.",
    "in"=> "القيمة المختارة غير صالحة.",
    "in_array"=> "هذه القيمة غير موجودة في :attribute.",
    "integer"=> "يجب أن يكون عددًا صحيحًا.",
    "ip"=> "يجب أن يكون عنوان IP صحيحًا.",
    "ipv4"=> "يجب أن يكون عنوان IPv4 صحيحًا.",
    "ipv6"=> "يجب أن يكون عنوان IPv6 صحيحًا.",
    "json"=> "يجب أن يكون نصًا من نوع JSON.",
    "lowercase"=> "يجب أن يحتوي الحقل على حروف صغيرة.",
    "lt.array"=> "يجب أن يحتوي على أقل من :value عناصر/عنصر.",
    "lt.file"=> "يجب أن يكون حجم الملف أصغر من :value كيلوبايت.",
    "lt.numeric"=> "يجب أن تكون القيمة أصغر من :value.",
    "lt.string"=> "يجب أن يكون طول النّص أقل من :value حروفٍ/حرفًا.",
    "lte.array"=> "يجب أن لا يحتوي على أكثر من :value عناصر/عنصر.",
    "lte.file"=> "يجب أن لا يتجاوز حجم الملف :value كيلوبايت.",
    "lte.numeric"=> "يجب أن تكون القيمة مساوية أو أصغر من :value.",
    "lte.string"=> "يجب أن لا يتجاوز طول النّص :value حروفٍ/حرفًا.",
    "mac_address"=> "يجب أن تكون القيمة عنوان MAC صالحاً.",
    "max.array"=> "يجب أن لا يحتوي على أكثر من :max عناصر/عنصر.",
    "max.file"=> "يجب أن لا يتجاوز حجم الملف :max كيلوبايت.",
    "max.numeric"=> "يجب أن تكون القيمة مساوية أو أصغر من :max.",
    "max.string"=> "يجب أن لا يتجاوز طول النّص :max حروفٍ/حرفًا.",
    "max_digits"=> "يجب ألا يحتوي هذا الحقل على أكثر من :max رقم/أرقام.",
    "mimes"=> "يجب أن يكون ملفًا من نوع : :values.",
    "mimetypes"=> "يجب أن يكون ملفًا من نوع : :values.",
    "min.array"=> "يجب أن يحتوي على الأقل على :min عُنصرًا/عناصر.",
    "min.file"=> "يجب أن يكون حجم الملف على الأقل :min كيلوبايت.",
    "min.numeric"=> "يجب أن تكون القيمة مساوية أو أكبر من :min.",
    "min.string"=> "يجب أن يكون طول النص على الأقل :min حروفٍ/حرفًا.",
    "min_digits"=> "يجب أن يحتوي هذا الحقل على الأقل :min رقم/أرقام.",
    "multiple_of"=> "يجب أن تكون القيمة من مضاعفات :value",
    "not_in"=> "العنصر المحدد غير صالح.",
    "not_regex"=> "صيغة غير صالحة.",
    "numeric"=> "يجب أن يكون رقمًا.",
    "password.letters"=> "يجب أن يحتوي هذا الحقل على حرف واحد على الأقل.",
    "password.mixed"=> "يجب أن يحتوي هذا الحقل على حرف كبير وحرف صغير على الأقل.",
    "password.numbers"=> "يجب أن يحتوي هذا الحقل على رقمٍ واحدٍ على الأقل.",
    "password.symbols"=> "يجب أن يحتوي هذا الحقل على رمزٍ واحدٍ على الأقل.",
    "password.uncompromised"=> "قيمة هذا الحقل ظهرت في بيانات مُسربة. الرجاء اختيار قيمة مختلفة.",
    "present"=> "يجب توفر هذا الحقل.",
    "prohibited"=> "هذا الحقل محظور.",
    "prohibited_if"=> "هذا الحقل محظور إذا كان :attribute هو :value.",
    "prohibited_unless"=> "هذا الحقل محظور ما لم يكن :attribute ضمن :values.",
    "prohibits"=> "هذا الحقل يحظر تواجد الحقل :attribute.",
    "regex"=> "الصيغة غير صحيحة.",
    "relatable"=> "هذا الحقل قد لا يكون مرتبطا بالمصدر المحدد.",
    "required"=> "هذا الحقل مطلوب.",
    "required_array_keys"=> "يجب أن يحتوي هذا الحقل على مدخلات لـ: :values.",
    "required_if"=> "هذا الحقل مطلوب في حال ما إذا كان :attribute يساوي :value.",
    "required_if_accepted"=> "هذا الحقل مطلوب عند قبول الحقل :attribute.",
    "required_unless"=> "هذا الحقل مطلوب في حال ما لم يكن :attribute يساوي :values.",
    "required_with"=> "هذا الحقل مطلوب إذا توفّر :values.",
    "required_with_all"=> "هذا الحقل مطلوب إذا توفّر :values.",
    "required_without"=> "هذا الحقل مطلوب إذا لم يتوفّر :values.",
    "required_without_all"=> "هذا الحقل مطلوب إذا لم يتوفّر :values.",
    "same"=> "يجب أن يتطابق هذا الحقل مع :attribute.",
    "size.array"=> "يجب أن يحتوي على :size عنصرٍ/عناصر بالضبط.",
    "size.file"=> "يجب أن يكون حجم الملف :size كيلوبايت.",
    "size.numeric"=> "يجب أن تكون القيمة مساوية لـ :size.",
    "size.string"=> "يجب أن يحتوي النص على :size حروفٍ/حرفًا بالضبط.",
    "starts_with"=> "يجب أن يبدأ بأحد القيم التالية: :values",
    "string"=> "يجب أن يكون نصًا.",
    "timezone"=> "يجب أن يكون نطاقًا زمنيًا صحيحًا.",
    "ulid"=> "يجب أن يكون بصيغة ULID سليمة.",
    "unique"=> "هذه القيمة مُستخدمة من قبل.",
    "uploaded"=> "فشل في عملية التحميل.",
    "uppercase"=> "يجب أن يحتوي الحقل على حروف كبيرة.",
    "url"=> "الصيغة غير صحيحة.",
    "uuid"=> "يجب أن يكون بصيغة UUID سليمة.",

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
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
