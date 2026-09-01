<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    protected $table = 'seo_pages';

    protected $guarded = [];

    protected $casts = [
        'sections'      => 'array',
        'comparison'    => 'array',
        'faqs'          => 'array',
        'sources'       => 'array',
        'landmarks'     => 'array',
        'fleet_slugs'   => 'array',
        'related_paths' => 'array',
        'reviewed_at'   => 'date',
        'is_published'  => 'boolean',
        'noindex'       => 'boolean',
    ];

    public const TYPE_SERVICE    = 'service';
    public const TYPE_AREA       = 'area';
    public const TYPE_WEDDING    = 'wedding';
    public const TYPE_ROUTE      = 'route';
    public const TYPE_DIRECTIONS = 'directions';
    public const TYPE_FLEET      = 'fleet';
    public const TYPE_HIRE       = 'hire';   // self-drive area pages

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function getUrlAttribute(): string
    {
        return url('/' . ltrim($this->url_path, '/'));
    }

    /** Word count of the rendered body - used by the pre-publish audit. */
    public function getWordCountAttribute(): int
    {
        $text = $this->answer_block . ' ' . $this->intro;

        foreach ((array) $this->sections as $section) {
            $text .= ' ' . ($section['h2'] ?? '') . ' ' . ($section['html'] ?? '');
        }

        foreach ((array) $this->faqs as $faq) {
            $text .= ' ' . ($faq['q'] ?? '') . ' ' . ($faq['a'] ?? '');
        }

        return str_word_count(trim(strip_tags($text)));
    }

    /** Words in the direct-answer block. Target is 40-60. */
    public function getAnswerWordCountAttribute(): int
    {
        return str_word_count(trim(strip_tags((string) $this->answer_block)));
    }
}
