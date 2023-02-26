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

    'accepted'             => 'يجب قبول :attribute.',
    'accepted_if'          => 'يجب قبول :attribute في حالة :other يساوي :value.',
    'active_url'           => ' :attribute لا يُمثّل رابطًا صحيحًا.',
    'after'                => 'يجب على  :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal'       => ' :attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي  :attribute سوى على حروف.',
    'alpha_dash'           => 'يجب أن لا يحتوي  :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num'            => 'يجب أن يحتوي  :attribute على حروفٍ وأرقامٍ فقط.',
    'array'                => 'يجب أن يكون  :attribute ًمصفوفة.',
    'before'               => 'يجب على  :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal'      => ' :attribute يجب أن يكون تاريخا سابقا أو مطابقا لتاريخ :date.',
    'between'              => [
        'array'   => 'يجب أن يحتوي  :attribute على عدد من العناصر بين :min و :max.',
        'file'    => 'يجب أن يكون حجم ملف  :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة  :attribute بين :min و :max.',
        'string'  => 'يجب أن يكون عدد حروف نّص  :attribute بين :min و :max.',
    ],
    'boolean'              => 'يجب أن تكون قيمة  :attribute إما true أو false .',
    'confirmed'            => ' التأكيد غير مُطابق لل :attribute.',
    'current_password'     => 'كلمة المرور الحالية غير صحيحة.',
    'date'                 => ' :attribute ليس تاريخًا صحيحًا.',
    'date_equals'          => 'يجب أن يكون  :attribute مطابقاً للتاريخ :date.',
    'date_format'          => 'لا يتوافق  :attribute مع الشكل :format.',
    'declined'             => 'يجب رفض :attribute.',
    'declined_if'          => 'يجب رفض :attribute عندما يكون :other بقيمة :value.',
    'different'            => 'يجب أن يكون الان :attribute و :other مُختلفين.',
    'digits'               => 'يجب أن يحتوي  :attribute على :digits رقمًا/أرقام.',
    'digits_between'       => 'يجب أن يحتوي  :attribute بين :min و :max رقمًا/أرقام .',
    'dimensions'           => 'ال:attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'لل :attribute قيمة مُكرّرة.',
    'email'                => 'صيغة  :attribute غير صحيحة',
    'ends_with'            => 'يجب أن ينتهي  :attribute بأحد القيم التالية: :values',
    'enum'                 => ' :attribute المختار غير صالح.',
    'exists'               => 'القيمة المحددة :attribute غير موجودة.',
    'file'                 => 'ال :attribute يجب أن يكون ملفا.',
    'filled'               => ' :attribute إجباري.',
    'gt'                   => [
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عنصر.',
        'file'    => 'يجب أن يكون حجم ملف  :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة  :attribute أكبر من :value.',
        'string'  => 'يجب أن يكون طول نّص  :attribute أكثر من :value حروفٍ/حرفًا.',
    ],
    'gte'                  => [
        'array'   => 'يجب أن يحتوي  :attribute على الأقل على :value عُنصرًا/عناصر.',
        'file'    => 'يجب أن يكون حجم ملف  :attribute على الأقل :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة  :attribute مساوية أو أكبر من :value.',
        'string'  => 'يجب أن يكون طول نص  :attribute على الأقل :value حروفٍ/حرفًا.',
    ],
    'image'                => 'يجب أن يكون  :attribute صورةً.',
    'in'                   => ' :attribute غير موجود.',
    'in_array'             => ' :attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون  :attribute عددًا صحيحًا.',
    'ip'                   => 'يجب أن يكون  :attribute عنوان IP صحيحًا.',
    'ipv4'                 => 'يجب أن يكون  :attribute عنوان IPv4 صحيحًا.',
    'ipv6'                 => 'يجب أن يكون  :attribute عنوان IPv6 صحيحًا.',
    'json'                 => 'يجب أن يكون  :attribute نصًا من نوع JSON.',
    'lt'                   => [
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عنصر.',
        'file'    => 'يجب أن يكون حجم ملف  :attribute أصغر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة  :attribute أصغر من :value.',
        'string'  => 'يجب أن يكون طول نّص  :attribute أقل من :value حروفٍ/حرفًا.',
    ],
    'lte'                  => [
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :value عنصر.',
        'file'    => 'يجب أن لا يتجاوز حجم ملف  :attribute :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة  :attribute مساوية أو أصغر من :value.',
        'string'  => 'يجب أن لا يتجاوز طول نّص  :attribute :value حروفٍ/حرفًا.',
    ],
    'mac_address'          => 'ال :attribute يجب أن يكون عنوان MAC صالحاً.',
    'max'                  => [
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عنصر.',
        'file'    => 'يجب أن لا يتجاوز حجم ملف  :attribute :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة  :attribute مساوية أو أصغر من :max.',
        'string'  => 'يجب أن لا يتجاوز طول نّص  :attribute :max حروفٍ/حرفًا.',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values.',
    'min'                  => [
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :min عنصر',
        'file'    => 'يجب أن يكون حجم ملف  :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة  :attribute مساوية أو أكبر من :min.',
        'string'  => 'يجب أن يكون طول نص  :attribute على الأقل :min حروفٍ/حرفًا.',
    ],
    'multiple_of'          => ' :attribute يجب أن يكون من مضاعفات :value',
    'not_in'               => 'عنصر ال :attribute غير صحيح.',
    'not_regex'            => 'صيغة  :attribute غير صحيحة.',
    'numeric'              => 'يجب على  :attribute أن يكون رقمًا.',
    'password'             => 'كلمة المرور غير صحيحة.',
    'present'              => 'يجب تقديم  :attribute.',
    'prohibited'           => ' :attribute محظور.',
    'prohibited_if'        => ' :attribute محظور إذا كان :other هو :value.',
    'prohibited_unless'    => ' :attribute محظور ما لم يكن :other ضمن :values.',
    'prohibits'            => 'ال :attribute يحظر تواجد ال :other.',
    'regex'                => 'صيغة  :attribute .غير صحيحة.',
    'required'             => ' :attribute مطلوب.',
    'required_array_keys'  => 'ال :attribute يجب أن يحتوي على مدخلات لـ: :values.',
    'required_if'          => ' :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => ' :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => ' :attribute مطلوب إذا توفّر :values.',
    'required_with_all'    => ' :attribute مطلوب إذا توفّر :values.',
    'required_without'     => ' :attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ' :attribute مطلوب إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق  :attribute مع :other.',
    'size'                 => [
        'array'   => 'يجب أن يحتوي :attribute على :size عنصرٍ بالضبط.',
        'file'    => 'يجب أن يكون حجم ملف  :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة  :attribute مساوية لـ :size.',
        'string'  => 'يجب أن يحتوي  :attribute على :size حروف أو أرقام بالضبط.',
    ],
    'starts_with'          => 'يجب أن يبدأ  :attribute بأحد القيم التالية: :values',
    'string'               => 'يجب أن يكون  :attribute نصًا.',
    'timezone'             => 'يجب أن يكون  :attribute نطاقًا زمنيًا صحيحًا.',
    'unique'               => 'قيمة  :attribute موجودة من قبل.',
    'uploaded'             => 'فشل في تحميل الـ :attribute.',
    'url'                  => 'صيغة رابط  :attribute غير صحيحة.',
    'uuid'                 => ' :attribute يجب أن يكون بصيغة UUID سليمة.',

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

    'attributes' => [
        'name.ar'    => 'الاسم بالعربية',
        'name.en'    => 'الاسم بالانجليزية',
        'description.ar'    => 'الوصف بالعربية',
        'description.en'    => 'الوصف بالانجليزية',
        'category_id'    => 'التصنيف',
    ],

];
