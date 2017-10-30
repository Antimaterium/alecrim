<?php

namespace Alecrim\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Input;

class ExcelController extends Controller {
    
    public function importProducts() {
        $file           = Input::file('produtos');
        $fileName       = $file->getClientOriginalName();

        $results = Excel::load($file_name, function($reader) {
            $reader->all();
        });

        dd($results);

    }

}
