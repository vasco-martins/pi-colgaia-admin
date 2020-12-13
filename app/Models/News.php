<?php


namespace App\Models;


use Framework\Models\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\AsciiSlugger;

class News extends Model
{

    protected static string $table = 'news';

    protected static array $fillable = [
        'id',
        'title',
        'subtitle',
        'slug',
        'content',
        'banner'
    ];

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