<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use SoapClient;

class Station extends Model
{
    use HasFactory, Sushi;

    //{"Code":"SUG-001","Name":"kirinya","LocationType":" ","email":"","phoneNumber":"","latitude":"","longitude":""}

    protected $fillable = ['Code','Name','LocationType','email','phoneNumber','latitude','longitude'];

   /**
     * Model Rows
     *
     * @return void
     */
    public function getRows()
    {
                    // Configuration for the SOAP client
                    $webServiceUrl = config('app.webService');
                    $username = config('app.soapUsername');
                    $password = config('app.soapPassword');
                    $options = [
                        'login' => $username,
                        'password' => $password,
                        'cache_wsdl' => WSDL_CACHE_NONE
                    ];
        
                    // Create a new SOAP client instance with options
                    $service = new SoapClient($webServiceUrl, $options);
                                // Create a new SOAP client instance with options
            $service = new SoapClient($webServiceUrl, $options);
            $result = $service->GetLocations();
            $data = json_decode($result->return_value, true);

        //API
        // $stations = Http::get('https://graph.stabexinternational.com/api/stations/getLocations')->json();
 
        //filtering some attributes
        $stations = Arr::map($data, function ($item) {
            return Arr::only($item,
                [
                    'Code',
                    'Name',
                    'LocationType',
                    'email',
                    'PhoneNumber',
                    'latitude',
                    'longitude',

                ]
            );
        });
 
        return $stations;
    }
 
}
