<?php

namespace App\Http\Controllers;

use App\Category;
use App\Vocabulary;
use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function Index(){
        
        return view('index');
    }

    public function handleTranToVi(Request $request){

        $word = $request['word'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => True,
            // CURLOPT_URL => 'https://od-api.oxforddictionaries.com:443/api/v2/entries/FR/hello',
            CURLOPT_URL => 'https://api.tracau.vn/WBBcwnwQpV89/s/'.$word.'/vi',
            CURLOPT_USERAGENT => 'Nhom10 cURL Request',
            CURLOPT_SSL_VERIFYPEER => false
        ));

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8'
            // "app_id:43e4d42f",
            // "app_key:521b14a9563c177cdb35eabaede6b11b"
        ));

        $resp = curl_exec($curl);

        $json = json_decode($resp);

        curl_close($curl);
        

        //  dump($json->tratu[0]->fields->fulltext);
        // var_dump($json->tratu[0]->fields->fulltext);


        // $nghia = $json->sentences[0]->fields->en;

        $nghia = $json->tratu[0]->fields->fulltext;

        return view('index',compact('nghia'));
    } 

    public function practive(){
        $category = Category::all();
        
        $Cat = json_decode($category);
        shuffle($Cat);
        // foreach($Cat as $cat){
        //     echo $cat->Name;
        //     echo "<br/>";
        // }
        // dd($Cat);
        return view('practive',compact('Cat'));
    }

    public function handleAnswer(Request $request){

        $category = Category::all();
        // dd($category);
        // dd($request);
        return redirect(route('practive'));
    }

    public function getListVocabulary(){
        $vocabulary = Vocabulary::all();
        return view('getListVocabulary',compact('vocabulary'));
    }

    public function addVocabulary($id){
        $vocabulary = Vocabulary::find($id);

        $category = new Category();
        $category->Name = $vocabulary['English'];
        $category->Mean = $vocabulary['Vietnamese'];
        $category->save();

        return redirect(route('list-vocabulary'));
        // dd($vocabulary['English']);
    }

    public function practiveListening(){
        // $category = Category::all();
        // $category = Category::simplePaginate(2);
        // $category = Category::paginate(2);
        // $Cat = json_decode($category);
        // dd($Cat); 
        $Cat = Category::simplePaginate(1);

        // dd($Cat);
        return view('practiveListening',compact('Cat'));
    }

    public function gameMatchWords(){
        $category = Category::all();
        $Cat = json_decode($category);

        $array = array();
        foreach($Cat as $cat){
            $array[$cat->Name] = $cat->id;
            $array[$cat->Mean] = $cat->id;
        }
        // dd($array); 
        // return view('gameMatchWords',compact('Cat'));

        // $testArray = array('a' => 'apple', 'b' => 'ball', 'c' => 'cat', 'd' => 'dog');
        $keys = array_keys($array); //Get the Keys of the array -> a, b, c, d
        shuffle($keys); //Shuffle The keys array -> d, a, c, b
        $shuffledArray = array();
        foreach ($keys as $key) {
            $shuffledArray[$key] = $array[$key]; //Get the original array using keys from shuffled array
        }

        return view('gameMatchWords', compact('shuffledArray'));
    }

    public function gameGhepChu(){

        $Cat = Category::simplePaginate(1);
        // dd($Cat);
        return view("gameGhepChu",compact('Cat'));
    }

    public function gameLatOChu(){

        $category = Category::all();
        $Cat = json_decode($category);

        $array = array();
        foreach ($Cat as $cat) {
            $array[$cat->Name] = $cat->id;
            $array[$cat->Mean] = $cat->id;
        }
        // dd($array); 
        // return view('gameMatchWords',compact('Cat'));

        // $testArray = array('a' => 'apple', 'b' => 'ball', 'c' => 'cat', 'd' => 'dog');
        $keys = array_keys($array); //Get the Keys of the array -> a, b, c, d
        shuffle($keys); //Shuffle The keys array -> d, a, c, b
        $shuffledArray = array();
        foreach ($keys as $key) {
            $shuffledArray[$key] = $array[$key]; //Get the original array using keys from shuffled array
        }

        return view('gameLatOChu', compact('shuffledArray'));
        
    }
}
