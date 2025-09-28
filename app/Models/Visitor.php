<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'school_name',
        'class_level',
    ];

    /**
     * Get the class level options.
     *
     * @return array<string>
     */
    public static function getClassLevelOptions(): array
    {
        return ['XI', 'XII', 'Alumni', 'Umum'];
    }

    /**
     * Check if visitor is a high school student.
     */
    public function isHighSchoolStudent(): bool
    {
        return in_array($this->class_level, ['XI', 'XII']);
    }

    /**
     * Check if visitor is an alumni.
     */
    public function isAlumni(): bool
    {
        return $this->class_level === 'Alumni';
    }

    /**
     * Check if visitor is from general public.
     */
    public function isGeneralPublic(): bool
    {
        return $this->class_level === 'Umum';
    }

    /**
     * The universities that this visitor has favorited.
     */
    public function favoriteUniversities()
    {
        return $this->belongsToMany(University::class)
                    ->withTimestamps();
    }

    /**
     * Add a university to favorites.
     */
    public function addToFavorites(University $university): bool
    {
        if (!$this->hasFavorited($university)) {
            $this->favoriteUniversities()->attach($university);
            return true;
        }
        return false;
    }

    /**
     * Remove a university from favorites.
     */
    public function removeFromFavorites(University $university): bool
    {
        if ($this->hasFavorited($university)) {
            $this->favoriteUniversities()->detach($university);
            return true;
        }
        return false;
    }

    /**
     * Toggle favorite status for a university.
     */
    public function toggleFavorite(University $university): bool
    {
        if ($this->hasFavorited($university)) {
            $this->removeFromFavorites($university);
            return false; // Removed from favorites
        } else {
            $this->addToFavorites($university);
            return true; // Added to favorites
        }
    }

    /**
     * Check if visitor has favorited a university.
     */
    public function hasFavorited(University $university): bool
    {
        return $this->favoriteUniversities()->where('university_id', $university->id)->exists();
    }

    /**
     * Get the count of favorite universities.
     */
    public function getFavoritesCountAttribute(): int
    {
        return $this->favoriteUniversities()->count();
    }
}
