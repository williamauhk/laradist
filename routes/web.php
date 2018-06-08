<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;

$router->get('/', function () use ($router) {
    return view('index');
});

$router->get('/ajax', function () use ($router) {
    $chi_code_replace=array("日","月","金","木","水","火","土","竹","戈","十","大","中","一","弓","人","心","手","口","尸","廿","山","女","田","難","卜","重");
    $eng_code_replace=array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    $input = preg_split('/(?<!^)(?!$)/u', $_GET["input"]);
    foreach($input as $input_value){	
        $results = DB::select("SELECT word,code FROM code where word=?",[$input_value]);
        foreach ($results as $value) {
            $chi_code=str_replace($eng_code_replace,$chi_code_replace,$value->code);
            echo $value->word."     ".$value->code."       ".$chi_code."<br>";
        }
    }
});
