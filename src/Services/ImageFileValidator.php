<?php

namespace App\Services;

use Symfony\Component\Validator\Constraints\File;

class ImageFileValidator
{
    public function getImageFileConstraints()
    {
        return new File([
            'maxSize' => '8192k',
            'mimeTypes' => ['image/jpeg', 'image/jpg', 'image/png'],
        ]);
    }
}
