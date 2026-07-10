<?php

namespace App\Traits;

use App\Models\Certificate;
use App\Models\Experience;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;
use Flux\Flux;

trait ComponentTrait
{
    public function saveCertificate($certImage, $certName, $certPlatform)
    {
        try {
            $this->validate([
                'certName' => 'required|string|max:255',
                'certPlatform' => 'required|string|max:255',
                'certImage' => 'image|max:10240',
            ]);
            
            $result = Cloudinary::upload($certImage->getRealPath());
            Certificate::create([
                'name' => $certName,
                'platform' => $certPlatform,
                "image_url" => $result->getSecurePath(),
                "image_public_id" => $result->getPublicId(),
            ]);

            $this->reset('certName', 'certPlatform', 'certImage');
            Flux::toast('Certificate saved successfully.', variant: 'success', duration: 2000); 
        } 
        catch (Exception $e) {
            Flux::toast(heading: 'Failed to save certificate.', text: $e->getMessage(), variant: 'danger', duration: 4000);
        }

    }

    public function deleteCertificate($certID, $publicID)
    {
        try {
            Cloudinary::destroy($publicID);
            Certificate::destroy($certID);
            Flux::toast('Certificate deleted successfully.', variant: 'success', duration: 2000); 
        } 
        catch (Exception $e) {
            Flux::toast(heading: 'Failed to delete certificate.', text: $e->getMessage(), variant: 'danger', duration: 4000);
        }
    }

    public function saveExperience($job_title, $time_rendered, $employment_type, $company_name, $company_website, $description)
    {
        try {
            $this->validate([
                'job_title' => 'required|string|max:255',
                'time_rendered' => 'required|string|max:255',
                'employment_type' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'company_website' => 'nullable|string|max:255',
                'description' => 'nullable|string',
            ]);
            
            Experience::create([
                'job_title' => $job_title,
                'time_rendered' => $time_rendered,
                "employment_type" => $employment_type,
                "company_name" => $company_name,
                "company_website" => $company_website,
                "description" => $description,
            ]);

            $this->reset('job_title', 'time_rendered', 'employment_type', 'company_name', 'company_website', 'description');
            Flux::toast('Experience saved successfully.', variant: 'success', duration: 2000); 
        } 
        catch (Exception $e) {
            Flux::toast(heading: 'Failed to save experience.', text: $e->getMessage(), variant: 'danger', duration: 4000);
        }
    }
}
