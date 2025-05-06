<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 25/06/2022
 * Time: 1:14 PM
 */

namespace App\Services;


class DropdownItemService
{
    public static function law_under_registered()
    {
        return [
            ['value' => 'Companies Act, 2017', 'type' => 'law_under_registered'],
            ['value' => 'Societies Registration Act, 1860', 'type' => 'law_under_registered'],
            ['value' => 'Trusts Act, 1882', 'type' => 'law_under_registered'],
            ['value' => 'Voluntary Social Welfare Agencies (Registration and Control) Ordinance, 1961', 'type' => 'law_under_registered'],
            ['value' => 'Companies Ordinance 1984 (Registrar Joint Stock Companies)', 'type' => 'law_under_registered'],
            ['value' => 'Companies Act 2017 (Registrar Joint Stock Companies)', 'type' => 'law_under_registered'],
            ['value' => 'Any other Law', 'type' => 'law_under_registered'],
        ];
    }
    public static function category_area_operations()
    {
        return [
            ['value' => 'Category (A): Currently operating in the entire Province/ two or more Districts', 'type' => 'category_area_operations'],
            ['value' => 'Category (B): Currently operating within one District (more than one Tehsils of the District)', 'type' => 'category_area_operations'],
            ['value' => 'Category (C): Currently operating within one Tehsil', 'type' => 'category_area_operations'],

        ];
    }
    public static function nature_authorization()
    {
        return [
            ['value' => 'Trustee of Charity', 'type' => 'nature_authorization'],
            ['value' => 'Officer of Charity', 'type' => 'nature_authorization'],
            ['value' => 'Authorized Representative', 'type' => 'nature_authorization'],

        ];
    }

    public static function networks()
    {
        return [
            ['value' => 'Mobilink', 'type' => 'networks'],
            ['value' => 'Telenor', 'type' => 'networks'],
            ['value' => 'Ufone', 'type' => 'networks'],
            ['value' => 'Warid', 'type' => 'networks'],
            ['value' => 'Zong', 'type' => 'networks'],
            
        ];
    }

    public static function auth_document_type()
    {
        return [
            ['value' => 'Authorization Letter from the Charity Head', 'type' => 'auth_document_type'],
            ['value' => 'Authorization Letter from the Charity Trustee', 'type' => 'auth_document_type'],
            ['value' => 'Resolution of the Charity', 'type' => 'auth_document_type'],
            
        ];
    }

    public static function banks()
    {
        return [
            ['value' => 'National Bank of Pakistan', 'type' => 'banks'],
            ['value' => 'State Bank of Pakistan', 'type' => 'banks'],
        ];
    }

  
   
}