<?php


namespace App\Models;


use Framework\Models\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\AsciiSlugger;

class Option extends Model
{

    protected static string $table = 'options';

    protected static array $fillable = [
        'id',
        'name',
        'value'
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
            'value' => $newFilename
        ]);

    }
}