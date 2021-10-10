<?php

namespace App\Http\Controllers;

use App\URLShortener;
use Illuminate\Http\Request;

class URLShortenerController extends Controller
{

     public function short(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|url'
        ]);
       // dd($request->all());

       //TODO:: check url exists?
        $url= URLShortener::whereUrl($request->url)->first();
       //if exist, show only the short version
       //else generate a short url, save to DB and show this
       if($url == null)
       {
           $short= $this->generateShortURL();

           URLShortener::create([
               'url'=> $request->url,
               'short'=> $short
           ]);

           $url= URLShortener::whereUrl($request->url)->first();
       }
       return view('url_shorted', compact('url'));
    }

    public function generateShortURL()
    {
        $result= base_convert(rand(1000, 99999), 10, 36);
        //base_convert(string $number, int $from_base, int $to_base); 10=a, 11=b, ... , 36=z
        $data= URLShortener::whereShort($result)->first();

        if($data != null)
        {
            $this->generateShortURL();
        }
        return $result;
    }

    public function shorted_url($link)
    {
        $url= URLShortener::whereShort($link)->first();
        return redirect($url->url); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\URLShortener  $uRLShortener
     * @return \Illuminate\Http\Response
     */
    public function show(URLShortener $uRLShortener)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\URLShortener  $uRLShortener
     * @return \Illuminate\Http\Response
     */
    public function edit(URLShortener $uRLShortener)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\URLShortener  $uRLShortener
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, URLShortener $uRLShortener)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\URLShortener  $uRLShortener
     * @return \Illuminate\Http\Response
     */
    public function destroy(URLShortener $uRLShortener)
    {
        //
    }
}
