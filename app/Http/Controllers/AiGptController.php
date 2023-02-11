<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class AiGptController extends Controller
{

    public function index(Request $input)
    {
        if ($input->title == null) {
            return;
        }

        $title = $input->title;

        $client = OpenAI::client(config('app.openai_api_key'));

        $result = $client->completions()->create([
            "model" => "text-davinci-003",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => 1000,
            'prompt' => sprintf('Write article about: %s', $title),
        ]);
        $content = trim($result['choices'][0]['text']);
//        $arr_contents = preg_split('/\r\n|\r|\n/', $contents);
//        $content = [];
//        foreach ($arr_contents as $each){
//            if($each != ""){
//                $content[] = $each;
//            }
//        }
//        dd($contents,$result,$content);

        $arr['title'] = $title;
        $arr['content'] = $content;
        return $arr;
    }
}
