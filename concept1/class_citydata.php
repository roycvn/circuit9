<?php
    class CityData
    {
        public $cities=array();
        public $city_html='';
        
        public function __construct()
        {
            $this->cities=array('Mumbai','Pune','Chennai','Bangalore');
        }
        
        public function getCities()
        {
             $this->city_html='<div>';
             foreach($this->cities as $city)
             {
                  $this->city_html.="<span onclick=\"getdata('".$city."')\">&raquo; ".$city."</span>";
             }
             $this->city_html.='</div>';
             
             return $this->city_html;
        }
    }
    class WeatherData extends CityData
    {
        public function getCityWeather($city)
        {
              $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
              $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$city.'") and u="c"';
              $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
              $session = curl_init($yql_query_url);
              curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
              $json = curl_exec($session);
              $currentWeather =  json_decode($json,true); 
              return $currentWeather;                    
        }
    }
?>