<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function _tokenUser()
    {
        return session('user')['token'];
    }

    public function index()
    {
        //
        $response = Http::withToken($this->_tokenUser())->get('http://localhost:8002/products')->json();
        $products = $response['data'];
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create', ['product' => []]);
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
        $data = $request->validate([
            'name'  => 'required|min:3',
            'desc'  => 'required|',
            'price' => 'required|alpha_num',
            'stock' => 'required|alpha_num'
        ]);

        $response = Http::withToken($this->_tokenUser())->post('http://localhost:8002/products/create', $data);

        if ($response->json()) {
            return redirect()->route('products')->with([
                'class' => 'success',
                'icon' => 'fas fa-check',
                'message' => $response->json()['message']
            ]);
        } else {
            return redirect()->route('products')->with([
                'class' => 'danger',
                'icon' => 'fas fa-ban',
                'message' => $response->json()['message']
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $response = Http::withToken($this->_tokenUser())->get('http://localhost:8002/products/' . $id)->json();

        $product = $response['data'];
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $response = Http::withToken($this->_tokenUser())->get('http://localhost:8002/products/' . $id)->json();

        $product = $response['data'];
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->validate([
            'name'  => 'required|min:3',
            'desc'  => 'required|',
            'price' => 'required|alpha_num',
            'stock' => 'required|alpha_num'
        ]);
        $response = Http::withToken($this->_tokenUser())->put('http://localhost:8002/products/' . $id, $data);

        if ($response->successful()) {
            return redirect()->route('products')->with([
                'class' => 'success',
                'icon' => 'fas fa-check',
                'message' => $response->json()['message']
            ]);
        } else {
            return redirect()->route('products')->with([
                'class' => 'danger',
                'icon' => 'fas fa-ban',
                'message' => $response->json()['message']
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $response = Http::withToken($this->_tokenUser())->delete('http://localhost:8002/products/' . $id);

        if ($response->successful()) {
            return redirect()->route('products')->with([
                'class' => 'success',
                'icon' => 'fas fa-check',
                'message' => $response->json()['message']
            ]);
        } else {
            return redirect()->route('products')->with([
                'class' => 'danger',
                'icon' => 'fas fa-ban',
                'message' => $response->json()['message']
            ]);
        }
    }
}
