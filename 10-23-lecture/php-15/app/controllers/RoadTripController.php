<?php

namespace app\controllers;

//namespace for our openai sdk
use Orhanerday\OpenAi\OpenAi;

//namespace for google maps sdk
use yidas\googleMaps\Client;

class RoadTripController
{
    public function getRoadTripView() {
        include APP_VIEWS . '/road-trip/road-trip-view.html';
        exit();
    }

    public function getRoadTripData() {
        $startingLocation = isset($_GET['startingLocation']) ? $_GET['startingLocation'] : "";
        $endingLocation = isset($_GET['endingLocation']) ? $_GET['endingLocation'] : "";
//        echo json_encode(['success' => true]);
//        exit();

        //chat gpt php sdk
        //https://www.google.com/search?q=chatgpt+php+sdk&client=firefox-b-1-d&sca_esv=5c039bb6748befa2&sxsrf=ACQVn09epGKcPBaU-gg1KImmr0t_Or9y6A%3A1712532396381&ei=rCsTZpbXFrjk5NoP54yfqAI&ved=0ahUKEwiW3ZupoLGFAxU4MlkFHWfGByUQ4dUDCBA&uact=5&oq=chatgpt+php+sdk&gs_lp=Egxnd3Mtd2l6LXNlcnAiD2NoYXRncHQgcGhwIHNkazIFEAAYgAQyBhAAGBYYHjIGEAAYFhgeMgYQABgWGB4yBhAAGBYYHjIGEAAYFhgeMgsQABiABBiKBRiGA0j6BVBaWOEEcAF4AZABAJgBtAGgAcIEqgEDMS4zuAEDyAEA-AEBmAIFoALPBMICChAAGEcY1gQYsAPCAg0QABiABBiKBRhDGLADwgIIEAAYFhgeGAqYAwCIBgGQBgqSBwMxLjSgB9AS&sclient=gws-wiz-serp
        //https://github.com/orhanerday/open-ai
        //https://platform.openai.com/
        //https://platform.openai.com/docs/guides/text-generation

        $open_ai = new OpenAi(OPENAIKEY);
        //completion method with our input and prompt
        $complete = $open_ai->completion([
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => "Write a road trip itinerary for a trip from {$startingLocation} to {$endingLocation}. Output as a bulleted list with each day as a list item.",
            'temperature' => 0.9,
            'max_tokens' => 300,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);

        //JSON can be decoded to PHP arrays with json decode
        $gptResponse = json_decode($complete, true);

        //parsing the openai response
        $gptResponse = $gptResponse["choices"][0]["text"];

        //google maps api
        //https://console.cloud.google.com/ -> get account set up
        //https://github.com/yidas/google-maps-services-php

        //gmail, make a client object with our api key
        $gmaps = new Client(['key' => GOOGLEMAPSAPIKEY]);

        //call the directions method with our input
        $directionsResult = $gmaps->directions($startingLocation, $endingLocation, [
            'mode' => "driving",
            'departure_time' => time(),
        ]);

        //https://stackoverflow.com/questions/40212663/how-to-use-google-direction-api-response-for-displaying-drive-road-on-the-map
        //i googled how to make sense of the response
        $legs = $directionsResult['routes'][0]['legs'];

        //parse the response
        $directions = array_map(function ($element) {
            return $element['html_instructions'];
        }, $legs[0]['steps']);

        //run to front end
        $response = [
            'gpt' => $gptResponse,
            'directions' => $directions
        ];
        header("Content-Type: application/json");
        echo json_encode($response);
        exit();
    }
}