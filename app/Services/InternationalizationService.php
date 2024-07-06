<?php

namespace App\Services;

/**
 *  This service will mostly be used to get internationalization data from 
 *  different countries.
 */
class InternationalizationService
{
    /**
     *  Get all countries.
     */
    public static function countries()
    {
        $countries = json_decode(file_get_contents(public_path('countries/countries.json')), true);

        return $countries;
    }

    /**
     *  Get all flags.
     *  Returns an array of arrays containing country_name and flag.
     */
    public static function flags()
    {
        $countries = self::countries();

        $flags = [];

        foreach($countries as $country)
        {
            $flag = [
                'country_name' => $country['name']['common'],
                'flag' => $country['flag']
            ];

            array_push($flags, $flag);
        }

        return $flags;
    }

    /**
     *  Get all currencies.
     *  Returns an array of arrays with 
     *  country_name, currency_name, currency_symbol.
     */
    public static function currencies()
    {
        $countries = self::countries();

        $currencies = [];
        
        foreach($countries as $country)
        {
            $currency['country_name'] = $country['name']['common'];

            foreach($country['currencies'] as $cur)
            {
                $currency = [
                    'country_name' => $country['name']['common'],
                    // 'currency_short_name' => $cur,
                    'currency_name' => $cur['name'],
                    'currency_symbol' => $cur['symbol']
                ];
            }
            
            array_push($currencies, $currency);
        }

        return $currencies;
    }
}