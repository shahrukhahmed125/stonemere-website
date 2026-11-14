<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermsContent extends Model
{
    protected $table = 'terms_contents';

    protected $fillable = [
        'hero_title',
        'last_updated',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'hero_title' => 'Website terms',
                'last_updated' => 'Last updated: November 2026',
                'content' => '<h2 id="about">About these terms</h2><p>These terms apply to your use of this website. Services are provided under a separate written agreement, which takes priority over anything on this website.</p>',
                'meta_title' => 'Website Terms | Stonemere Life Management',
                'meta_description' => 'Terms of use for the Stonemere Life Management website.',
            ]
        );
    }

    /**
     * Return the document HTML with ids ensured on every <h2>, plus a TOC.
     */
    public function document(): array
    {
        $html = (string) $this->content;
        $toc = [];
        $used = [];

        $html = preg_replace_callback('/<h2([^>]*)>(.*?)<\/h2>/is', function ($m) use (&$toc, &$used) {
            $attrs = $m[1];
            $inner = $m[2];
            $label = trim(html_entity_decode(strip_tags($inner), ENT_QUOTES | ENT_HTML5, 'UTF-8'));

            if (preg_match('/\bid="([^"]+)"/', $attrs, $idMatch)) {
                $id = $idMatch[1];
            } else {
                $base = $label !== '' ? $label : 'section';
                $id = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $base), '-'));
                $id = $id !== '' ? $id : 'section';
                $n = 1;
                $candidate = $id;
                while (isset($used[$candidate])) {
                    $candidate = $id . '-' . (++$n);
                }
                $id = $candidate;
                $attrs .= ' id="' . e($id) . '"';
            }
            $used[$id] = true;
            $toc[] = ['id' => $id, 'label' => $label !== '' ? $label : $id];

            return '<h2' . $attrs . '>' . $inner . '</h2>';
        }, $html);

        return ['html' => $html, 'toc' => $toc];
    }
}
