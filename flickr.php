<?php

// Flickr API endpoint
$endpoint = 'https://www.flickr.com/services/rest/';

$api_key = 'ebcda528351089e3d90904c0c0998dee';

//Parameters for the API request
$params = [
    'method' => 'flickr.photos.search',
    'api_key' => $api_key,
    'text' => 'bicycle',
    'format' => 'json',
    'nojsoncallback' => 1,
    'per_page' => 3 //Only need 3 images on about section
];

// Construct the URL for the API request
$url = $endpoint . '?' . http_build_query($params);

// Make the API request
$response = json_decode(file_get_contents($url), true);

// Check if request was successful
if ($response['stat'] == 'ok') {
    $photos = $response['photos']['photo'];

    // Loop through the fetched photos and display them
    foreach ($photos as $photo) {
        $farm_id = $photo['farm'];
        $server_id = $photo['server'];
        $photo_id = $photo['id'];
        $secret = $photo['secret'];

        // Construct the URL for the image
        $image_url = "https://farm{$farm_id}.staticflickr.com/{$server_id}/{$photo_id}_{$secret}.jpg";

        // Display the image
        echo '<div class="column"><img src="' . $image_url . '" style="width:60%"></div>';
    }
} else {
    echo 'Error fetching images from Flickr API'; //error message
}
?>