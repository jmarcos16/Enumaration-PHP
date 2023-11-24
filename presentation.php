<?php

namespace App\Enums;

enum PostStatusEnum:string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Rascunho',
            self::PUBLISHED => 'Publicado',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::DRAFT => 'Este post é um rascunho',
            self::PUBLISHED => 'Este post está publicado',
        };
    }
    
}

//-----------------------------------------------------------------------------------------------

namespace App\Models;

class Post extends Model
{
    use HasFactory;
    protected $casts = [
        'status' => \App\Enums\PostStatusEnum::class,
    ];
}

//-----------------------------------------------------------------------------------------------

Post::first()->status; // instance of PostStatusEnum
Post::first()->status->value(); // draft
Post::first()->status->label(); // Rascunho
Post::first()->status->description(); // Este post é um rascunho

//-----------------------------------------------------------------------------------------------

foreach (PostStatusEnum::cases() as $status) {
    echo $status->value(); // draft, published
    echo $status->label(); // Rascunho, Publicado
    echo $status->description(); // Este post é um rascunho, Este post está publicado
}