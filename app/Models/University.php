<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class University extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'category',
        'description',
        'logo_path',
        'official_link',
        'social_media',
        'booth_number',
        'x_position',
        'y_position',
        'booth_type',
        'logo_color',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'social_media' => 'array',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug from name when creating
        static::creating(function ($university) {
            if (empty($university->slug)) {
                $university->slug = \Str::slug($university->name);
            }
        });

        // Auto-update slug from name when updating
        static::updating(function ($university) {
            if ($university->isDirty('name') && empty($university->slug)) {
                $university->slug = \Str::slug($university->name);
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * The visitors that have favorited this university.
     */
    public function visitors()
    {
        return $this->belongsToMany(Visitor::class)
                    ->withTimestamps();
    }

    /**
     * Get the count of visitors who favorited this university.
     */
    public function getFavoritesCountAttribute(): int
    {
        return $this->visitors()->count();
    }

    /**
     * Get the logo URL with fallback to placeholder.
     */
    public function getLogoUrlAttribute(): string
    {
        if ($this->logo_path) {
            return asset('storage/' . $this->logo_path);
        }

        // Generate placeholder logo filename based on slug
        $logoFile = $this->getPlaceholderLogoName();
        $placeholderPath = "images/universities/{$logoFile}";
        
        // Check if placeholder exists, otherwise use default gradient
        if (file_exists(public_path($placeholderPath))) {
            return asset($placeholderPath);
        }

        return null; // Will use CSS gradient fallback
    }

    /**
     * Get placeholder logo filename based on university name/slug.
     */
    private function getPlaceholderLogoName(): string
    {
        // Map common university names to their logo files
        $logoMap = [
            'universitas-indonesia' => 'ui.svg',
            'institut-teknologi-bandung' => 'itb.svg',
            'universitas-gadjah-mada' => 'ugm.svg',
            'institut-pertanian-bogor' => 'ipb.svg',
            'institut-teknologi-sepuluh-nopember' => 'its.svg',
            'universitas-airlangga' => 'unair.svg',
            'universitas-diponegoro' => 'undip.svg',
            'universitas-sebelas-maret' => 'uns.svg',
            'binus-university' => 'binus.svg',
            'universitas-telkom' => 'telkom.svg',
            'upn-veteran-jakarta' => 'upn.svg',
            'universitas-pelita-harapan' => 'uph.svg',
            'universitas-trisakti' => 'trisakti.svg',
            'universitas-atma-jaya-jakarta' => 'atmajaya.svg',
            'universitas-tarumanagara' => 'untar.svg',
            'universitas-katolik-parahyangan' => 'unpar.svg',
        ];

        return $logoMap[$this->slug] ?? 'default.svg';
    }
}
