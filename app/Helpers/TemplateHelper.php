<?php

if (!function_exists('genderOptions')) {
    function genderOptions()
    {
        $gender = array('Male' => 'male', 'Female' => 'female', 'Others' => 'others');
        return $gender;
    }
}

if (!function_exists('natureOfResident')) {
    function natureOfResident()
    {
        return [
            'Own House' => 'own house', 
            'Tenant' => 'tenant', 
            'Occupier' => 'occupier',
            'Other' => 'other'
        ];
    }
}

if (!function_exists('yesNoNotApplicable')) {
    function yesNoNotApplicable()
    {
        return [
            'Yes' => 'yes', 
            'No' => 'no', 
            'Not Applicable' => 'not applicable',
        ];
    }
}

if (!function_exists('buildingCategory')) {
    function buildingCategory()
    {
        return [
            'Pacca' => 'pacca', 
            'Earthen' => 'earthen', 
            'Other' => 'other',
        ];
    }
}

if (!function_exists('natureOfBusiness')) {
    function natureOfBusiness()
    {
        return [
            'Profitable' => 'profitable', 
            'Non Profitable' => 'non profitable', 
            'Office' => 'office',
            'Academic institution' => 'academic institution',
            'Not Applicable' => 'not applicable',
        ];
    }
}

if (!function_exists('typeOfBusiness')) {
    function typeOfBusiness()
    {
        return [
            'Food' => 'profitable', 
            'Rice' => 'non profitable', 
            'Wheat' => 'office',
            'Muri Shop' => 'academic institution',
            'Vegetable' => 'not',
            'Grocery' => 'not',
            'Treatment and Medicine' => 'not',
            'Garments' => 'not',
            'Machinery' => 'not',
            'Agriculture related' => 'not',
            'Cosmetics' => 'not',
            'Stationary' => 'not',
            'Furniture' => 'not',
            'Govt. Office' => 'not',
            'NGO' => 'not',
            'Private Farm' => 'not',
            'Education Inst.' => 'not',
            'Other Service Provider' => 'not',
            'Community Hall' => 'not',
            'Marrige Hall' => 'not',
            'Others' => 'not',
            'Not Applicable' => 'not',
        ];
    }
}

if (!function_exists('toiletType')) {
    function toiletType()
    {
        return [
            'Toilet with septic tank' => 'Toilet with septic tank', 
            'Toilet with twin pit leach pit' => 'Toilet with twin pit leach pit', 
            'No any toilet' => 'No any toilet',
            'Not Applicable' => 'not applicable',
        ];
        // return [
        //     'Twin pit leach pit' => 'twin pit leach pit', 
        //     'Leach pit' => 'leach pit', 
        //     'Leach pit with TF' => 'leach pit with tf',
        //     'Septic tank' => 'septic tank',
        //     'Septic tank with TF' => 'septic tank with tf',
        //     'Other type' => 'other type',
        //     'No any' => 'no any',
        //     'Not Applicable' => 'not applicable',
        // ];
    }
}

if (!function_exists('wasteMeasure')) {
    function wasteMeasure()
    {
        return [
            '1kg' => '1kg', 
            '2kg-3kg' => '2kg-3kg', 
            '3kg-99kg' => '3kg-99kg',
            '100kg+' => '100kg+',
            'Not Applicable' => 'not applicable',
        ];
    }
}

if (!function_exists('wasteMeasureTwo')) {
    function wasteMeasureTwo()
    {
        return [
            'up to 300gm' => 'up to 300gm', 
            '301gm-500gm' => '301gm-500gm', 
            'more than 500gm' => 'more than 500gm',
            'Not Applicable' => 'not applicable',
        ];
    }
}

if (!function_exists('wastePractices')) {
    function wastePractices()
    {
        return [
            'Open dumping' => 'open dumping', 
            'Dump to community dustbin' => 'community dustbin', 
            'Give to collection van with segregate' => 'collection van with segregate',
            'Give to collection van without segregate' => 'collection van without segregate',
            'No any system' => 'no any system',
            'Not Applicable' => 'not applicable',
        ];
    }
}

if (!function_exists('collectionTime')) {
    function collectionTime()
    {
        return [
            'Morning'=>'morning',
            'Evening'=>'evening',
            'Both'=>'both',
            'Not Applicable'=>'not applicable'
        ];
    }
}


?>