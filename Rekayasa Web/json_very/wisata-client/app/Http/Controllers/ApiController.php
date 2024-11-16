<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    // halaman login
    public function index()
    {
        return view('login');
    }

    // halaman dashboard
    public function home()
    {
        return view('home');
    }

    // halaman tambah wisata
    public function tambahWisata()
    {
        return view('tambah');
    }

    // request API add wisata
    public function apiAddWisata(Request $request)
    {
        $tkn = $this->getCookie();
        if ($tkn == 'Unauthorized') {
            return "Unauthorized";
        }
        $validated = $request->validate([
            'kota' => 'required',
            'landmark' => 'required',
            'tarif' => 'required',
        ]);
        $response = Http::withToken($tkn)->post('http://localhost:8002/api/wisata', [
            'kota' => $request->input('kota'),
            'landmark' => $request->input('landmark'),
            'tarif' => $request->input('tarif'),
        ]);
        if ($response->status() === 201) {
            return redirect()->route('wisata.index')->with('message', 'Wisata berhasil ditambahkan');
        }
        return redirect()->back()->with('message', 'Terjadi Kesalahan');
    }

    // request API Login
    public function apiLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $response = Http::post('http://localhost:8002/api/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        $data = json_decode($response->body(), true);
        if (array_key_exists('message', $data)) {
            $this->setCookie($data['message']);
        } else {
            $this->setCookie($data['access_token']);
        }
        return redirect()->route('home');
    }

    // request API Logout
    public function apiLogout()
    {
        $tkn = $this->getCookie();
        Http::withToken($tkn)->post('http://localhost:8002/api/logout');
        Cookie::forget('token');

        return redirect()->route('home.login');
    }

    // request API getWisata
    public function apigetWisata()
    {
        $tkn = $this->getCookie();
        if ($tkn <> "Unauthorized") {
            $response = Http::withToken($tkn)->get('http://localhost:8002/api/wisata');
            $data['query'] = json_decode($response->body(), true);
            return view('list', $data);
        } else {
            return "Unauthorized";
        }
    }

    // request API detail wisata
    public function apiDetailWisata($id)
    {
        $tkn = $this->getCookie();
        if ($tkn == 'Unauthorized') {
            return "Unauthorized";
        }
        $response = Http::withToken($tkn)->get('http://localhost:8002/api/wisata/' . $id);
        $data = json_decode($response->body(), true);
        return view('lihat', compact('data'));
    }

    // request API detail wisata
    public function editWisata($id)
    {
        $tkn = $this->getCookie();
        if ($tkn == 'Unauthorized') {
            return "Unauthorized";
        }
        $response = Http::withToken($tkn)->get('http://localhost:8002/api/wisata/' . $id);
        $data = json_decode($response->body(), true);
        return view('edit', compact('data'));
    }

    // request API detail wisata
    public function apiUpdateWisata($id, Request $request)
    {
        $tkn = $this->getCookie();
        if ($tkn == 'Unauthorized') {
            return "Unauthorized";
        }
        $validated = $request->validate([
            'kota' => 'required',
            'landmark' => 'required',
            'tarif' => 'required',
        ]);
        $response = Http::withToken($tkn)->put('http://localhost:8002/api/wisata/' . $id, [
            'kota' => $request->input('kota'),
            'landmark' => $request->input('landmark'),
            'tarif' => $request->input('tarif'),
        ]);
        if ($response->status() === 200) {
            return redirect()->route('wisata.index')->with('message', 'Wisata berhasil diedit');
        }
        return redirect()->back()->with('message', 'Terjadi Kesalahan');
    }

    // request API detail wisata
    public function apiDeleteWisata($id, Request $request)
    {
        $tkn = $this->getCookie();
        if ($tkn == 'Unauthorized') {
            return "Unauthorized";
        }
        $response = Http::withToken($tkn)->delete('http://localhost:8002/api/wisata/' . $id);
        if ($response->status() === 200) {
            return redirect()->route('wisata.index')->with('message', 'Wisata berhasil dihapus');
        }
        return redirect()->back()->with('message', 'Terjadi Kesalahan');
    }

    // Set Cookies
    public function setCookie($token)
    {
        Cookie::queue(Cookie::make('token', $token, 60));
    }

    // Get Cookie
    public function getCookie()
    {
        return Cookie::get('token');
    }
}
