<?php

namespace App\Markdown;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class CustomLinkRenderer implements NodeRendererInterface
{
    /**
     * @param Node|Link $node
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        $label = $childRenderer->renderNodes($node->children());
        $url = $node->getUrl();

        $scheme = strtolower(parse_url($url, PHP_URL_SCHEME));

        $link = new HtmlElement("a", [], $label);

        $disallowedSchemes = ['javascript', 'vbscript', 'file', 'data'];

        if (in_array($scheme, $disallowedSchemes)) {
            $link->setAttribute('class', 'text-red-500 underline');
            return $link;
        }

        $link->setAttribute("href", $url);

        if ($scheme == null) {
            if ($this->routeExists($url)) {
                $link->setAttribute('class', 'text-blue-500 underline');
            }
            else {
                $link->setAttribute('class', 'text-red-500 underline');
            }
        }
        else {
            $link->setAttribute('class', 'text-blue-500 underline');
        }

        return $link;
    }

    public function routeExists(string $url)
    {
        $routes = Route::getRoutes();
        $request = Request::create($url);
        try {
            $routes->match($request);
            return true;
        } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            return false;
        }
    }
}
