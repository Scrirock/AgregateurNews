<?php

namespace App\Service;

class NewsAgregator {

    public function getMediaNews() {
        $queryString = http_build_query([
            'access_key' => '2cfef2156ca663aef6e79c31e0d05045',
            'sort' => 'published_desc',
            'languages' => 'fr',
            'countries' => 'be',
            'limit' => 20
        ]);

        $ch = curl_init(sprintf('%s?%s', 'http://api.mediastack.com/v1/news', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        curl_close($ch);

        return json_decode($json, true)['data'];
    }

    public function getCatcherNews() {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://newscatcher.p.rapidapi.com/v1/search_free?q=nature&lang=fr&media=True",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: newscatcher.p.rapidapi.com",
                "x-rapidapi-key: 08e7772b7dmshef46ee9d050acf3p179a2djsnf40b528df551"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return json_decode($response)->articles;
    }

}