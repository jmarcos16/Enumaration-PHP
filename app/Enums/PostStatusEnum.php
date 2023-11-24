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