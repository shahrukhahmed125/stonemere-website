<?php

namespace App\Helpers;

use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

class HtmlSanitizerHelper
{
    /**
     * Sanitize HTML content allowing only safe tags and attributes.
     *
     * @param string|null $html
     * @return string
     */
    public static function sanitize(?string $html): string
    {
        if (empty($html)) {
            return '';
        }

        $config = (new HtmlSanitizerConfig())
            ->allowSafeElements()
            ->allowElement('em', ['class'])
            ->allowElement('strong', ['class'])
            ->allowElement('br')
            ->allowElement('a', ['href', 'target', 'rel', 'class'])
            ->allowAttribute('class', 'a')
            ->allowAttribute('class', 'em')
            ->allowAttribute('class', 'strong')
            ->allowLinkSchemes(['http', 'https', 'mailto', 'tel'])
            ->forceAttribute('rel', 'noopener noreferrer', 'a')
            ->forceAttribute('target', '_blank', 'a');

        $sanitizer = new HtmlSanitizer($config);

        return $sanitizer->sanitize($html);
    }
}
