<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\Sitemap\SitemapOriginalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        return Response::make($this->render(), 200, [
            'Content-Type' => 'text/xml',
        ]);
    }

    public function indexOriginal(SitemapOriginalService $service)
    {
        $view = view('sitemap.index')
            ->with(['data' => $service->getData()])
            ->render();

        return Response::make($view, 200, [
            'Content-Type' => 'text/xml',
        ]);
    }

    protected function render()
    {
        $data[] =  Post::published()->get();
        return view('sitemap.index')
            ->with(compact('data'))
            ->render();
    }
}
