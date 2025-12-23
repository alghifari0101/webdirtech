<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Ask;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/**
 * Controller to generate Sitemap XML.
 */
final class SitemapController extends Controller
{
    /**
     * Generate the sitemap.
     *
     * @return Response
     */
    public function index(): Response
    {
        $staticRoutes = [
            'home',
            'about',
            'service.vps',
            'service.website',
            'service.migration',
            'service.gmb',
            'contact',
            'ask',
        ];

        $asks = Ask::latest()->get();

        return response()->view('sitemap.index', [
            'staticRoutes' => $staticRoutes,
            'asks' => $asks,
        ])->header('Content-Type', 'text/xml');
    }
}
