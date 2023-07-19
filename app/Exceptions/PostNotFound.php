<?php

namespace App\Exceptions;

use Exception;

class PostNotFound extends Exception
{
    function report(){
        function render(){
            return view('errors.404');
        }
    }
}
