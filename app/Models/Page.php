<?php


namespace App\Models;


use Framework\Models\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\AsciiSlugger;

class Page extends Model
{

    protected static string $table = 'pages';

    protected static array $fillable = [
        'id',
        'title',
        'subtitle',
        'position',
        'slug',
        'banner',
        'content',
        'template_id',
        'page_id',
    ];

    public function template() {
        return $this->belongsTo(Template::class,'template_id');
    }

    public function page() {
        return $this->belongsTo(Page::class,'page_id');
    }

    /**
     * Uploads banner to database
     * @param UploadedFile $file
     */
    public function uploadFile(UploadedFile $file) {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $slugger = new AsciiSlugger();
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        $file->move(getBasePath() . '/public/uploads/', $newFilename);

        $this->update([
           'banner' => $newFilename
        ]);

    }
}