<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JeroenG\Explorer\Application\Explored;
use Laravel\Scout\Searchable;

class Post extends Model implements Explored
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'content'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }

    public function mappableAs(): array
    {
        return [
            'id' => 'keyword',
            'title' => [
                'type' => 'full_text',
                'analyzer' => 'synonym',
            ],
        ];
    }
}
