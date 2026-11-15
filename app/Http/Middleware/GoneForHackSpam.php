<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Answers 410 Gone for the SEO-spam URLs planted in the 2026-10 hack, so
 * search engines drop them instead of indexing the home page under them.
 *
 * Registered as global middleware ahead of sessions and routing, so the
 * thousands of crawler hits a day never touch the database.
 */
class GoneForHackSpam
{
    // /products-search-detail-C67200190111.shtm, /shop/a/b0210.phtml and
    // /sitemap-detail-324.xml. This Laravel app serves none of these.
    private const SPAM_PATH = '#(\.(shtml?|phtml)|^/sitemap-detail-\d+\.xml)$#i';

    // "view/item/235836949": a path-like query with no "=". Real visitors only
    // ever bring key=value queries such as ?fbclid=… or ?utm_source=….
    private const SPAM_QUERY = '#^[\w-]+(/[\w.-]+)+=?$#';

    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isSpam($request)) {
            return response('Gone', 410, [
                'Content-Type' => 'text/plain; charset=UTF-8',
                'X-Robots-Tag' => 'noindex',
            ]);
        }

        return $next($request);
    }

    private function isSpam(Request $request): bool
    {
        $path = $request->getPathInfo();

        if (preg_match(self::SPAM_PATH, $path)) {
            return true;
        }

        if ($path !== '/' && $path !== '/index.php') {
            return false;
        }

        $query = rawurldecode((string) $request->server->get('QUERY_STRING', ''));

        return (bool) preg_match(self::SPAM_QUERY, $query);
    }
}
