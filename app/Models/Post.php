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
                'type' => 'text',
                'analyzer' => 'synonym',
                'fuziness' => 'auto',
            ],
        ];
    }
}
