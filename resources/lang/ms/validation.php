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

    'accepted' => ':attribute perlu accepted.',
    'accepted_if' => ':attribute perlu accepted when :other is :value.',
    'active_url' => ':attribute is not a valid URL.',
    'after' => ':attribute perlu a date after :date.',
    'after_or_equal' => ':attribute perlu a date after or equal to :date.',
    'alpha' => ':attribute must only contain letters.',
    'alpha_dash' => ':attribute must only contain letters, numbers, dashes dan underscores.',
    'alpha_num' => ':attribute must only contain letters dan numbers.',
    'array' => ':attribute perlu an array.',
    'before' => ':attribute perlu a date before :date.',
    'before_or_equal' => ':attribute perlu a date before or equal to :date.',
    'between' => [
        'numeric' => ':attribute perlu diantara :min dan :max.',
        'file' => ':attribute perlu diantara :min dan :max kilobytes.',
        'string' => ':attribute perlu diantara :min dan :max karakter.',
        'array' => ':attribute must have between :min dan :max items.',
    ],
    'boolean' => ':attribute field perlu true or false.',
    'confirmed' => ':attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => ':attribute is not a valid date.',
    'date_equals' => ':attribute perlu a date equal to :date.',
    'date_format' => ':attribute does not match the format :format.',
    'declined' => ':attribute perlu declined.',
    'declined_if' => ':attribute perlu declined when :other is :value.',
    'different' => ':attribute dan :other perlu different.',
    'digits' => ':attribute memerlukan :digits angka.',
    'digits_between' => ':attribute perlu diantara :min dan :max angka.',
    'dimensions' => ':attribute has invalid image dimensions.',
    'distinct' => ':attribute field has a duplicate value.',
    'email' => ':attribute perlu a valid email address.',
    'ends_with' => ':attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => ':attribute perlu a file.',
    'filled' => ':attribute field must have a value.',
    'gt' => [
        'numeric' => ':attribute perlu greater than :value.',
        'file' => ':attribute perlu greater than :value kilobytes.',
        'string' => ':attribute perlu greater than :value karakter.',
        'array' => ':attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute perlu greater than or equal to :value.',
        'file' => ':attribute perlu greater than or equal to :value kilobytes.',
        'string' => ':attribute perlu greater than or equal to :value karakter.',
        'array' => ':attribute must have :value items or more.',
    ],
    'image' => ':attribute perlu an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => ':attribute field does not exist in :other.',
    'integer' => ':attribute perlu an integer.',
    'ip' => ':attribute perlu a valid IP address.',
    'ipv4' => ':attribute perlu a valid IPv4 address.',
    'ipv6' => ':attribute perlu a valid IPv6 address.',
    'mac_address' => ':attribute perlu a valid MAC address.',
    'json' => ':attribute perlu a valid JSON string.',
    'lt' => [
        'numeric' => ':attribute perlu less than :value.',
        'file' => ':attribute perlu less than :value kilobytes.',
        'string' => ':attribute perlu less than :value karakter.',
        'array' => ':attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute perlu less than or equal to :value.',
        'file' => ':attribute perlu less than or equal to :value kilobytes.',
        'string' => ':attribute perlu less than or equal to :value karakter.',
        'array' => ':attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh lebih besar daripada :max.',
        'file' => ':attribute tidak boleh lebih besar daripada :max kilobytes.',
        'string' => ':attribute tidak boleh lebih besar daripada :max karakter.',
        'array' => ':attribute must not have more than :max items.',
    ],
    'mimes' => ':attribute perlu a file of type: :values.',
    'mimetypes' => ':attribute perlu a file of type: :values.',
    'min' => [
        'numeric' => ':attribute perlu sekurang-kurangnya :min.',
        'file' => ':attribute perlu sekurang-kurangnya :min kilobytes.',
        'string' => ':attribute perlu sekurang-kurangnya :min karakter.',
        'array' => ':attribute must have at least :min items.',
    ],
    'multiple_of' => ':attribute perlu a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => ':attribute format is invalid.',
    'numeric' => ':attribute memerlukan nombor sahaja.',
    'password' => 'The password is incorrect.',
    'present' => ':attribute field perlu present.',
    'prohibited' => ':attribute field is prohibited.',
    'prohibited_if' => ':attribute field is prohibited when :other is :value.',
    'prohibited_unless' => ':attribute field is prohibited unless :other is in :values.',
    'prohibits' => ':attribute field prohibits :other from being present.',
    'regex' => ':attribute format is invalid.',
    'required' => ':attribute diperlukan.',
    'required_if' => ':attribute diperlukan sekiranya :other adalah :value.',
    'required_unless' => ':attribute diperlukan kecuali :other dalah :values.',
    'required_with' => ':attribute diperlukan sekiranya :values wujud.',
    'required_with_all' => ':attribute diperlukan sekiranya :values wujud.',
    'required_without' => ':attribute diperlukan sekiranya :values tidak wujud.',
    'required_without_all' => ':attribute diperlukan sekiranya tiada :values wujud.',
    'same' => ':attribute dan :other must match.',
    'size' => [
        'numeric' => ':attribute perlu :size.',
        'file' => ':attribute perlu :size kilobytes.',
        'string' => ':attribute perlu :size karakter.',
        'array' => ':attribute must contain :size items.',
    ],
    'starts_with' => ':attribute must start with one of the following: :values.',
    'string' => ':attribute perlu a string.',
    'timezone' => ':attribute perlu a valid timezone.',
    'unique' => ':attribute has already been taken.',
    'uploaded' => ':attribute failed to upload.',
    'url' => ':attribute perlu a valid URL.',
    'uuid' => ':attribute perlu a valid UUID.',

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
        'identity_no' => 'No Kad Pengenalan',
        'no_tel' => 'No Telefon'
    ],

];
