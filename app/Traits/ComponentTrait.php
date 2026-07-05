<?php

namespace App\Traits;

use App\Models\Certificate;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;
use Flux\Flux;

trait ComponentTrait
{
    public function saveCertificate($certImage, $certName, $certPlatform)
    {
        try {
            $url = Cloudinary::upload($certImage->getRealPath())->getSecurePath();
            Certificate::create([
                'name' => $certName,
                'platform' => $certPlatform,
                "image_url" => $url
            ]);
            Flux::toast('Certificate saved successfully.', variant: 'success', duration: 2000); 
        } 
        catch (Exception $e) {
            Flux::toast(heading: 'Failed to save certificate.', text: $e->getMessage(), variant: 'danger', duration: 4000);
        }

    }

    public function deleteCertificate($certID)
    {
        try {
            Certificate::destroy($certID);
            Flux::toast('Certificate deleted successfully.', variant: 'success', duration: 2000); 
        } 
        catch (Exception $e) {
            Flux::toast(heading: 'Failed to delete certificate.', text: $e->getMessage(), variant: 'danger', duration: 4000);
        }
    }
}
