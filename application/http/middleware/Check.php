<?php

namespace app\http\middleware;

class Check
{
    public function handle($request, \Closure $next,$lll)
    {
        if ($request->param('nn') == '123') {
            dump($lll);
        }
        //return $request;
       //    dump($request);
    }
}
