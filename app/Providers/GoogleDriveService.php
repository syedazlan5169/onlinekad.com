<?php

namespace App\Providers;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Illuminate\Support\Facades\Storage;

class GoogleDriveService
{
    protected $client;
    protected $drive;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId(config('services.google.client_id'));
        $this->client->setClientSecret(config('services.google.client_secret'));
        $this->client->setRedirectUri(config('services.google.redirect'));
        $this->client->setAccessType('offline');
        $this->client->addScope(Drive::DRIVE);

        $this->drive = new Drive($this->client);
    }

    public function uploadFile($filePath, $fileName)
    {
        $fileMetadata = new DriveFile([
            'name' => $fileName,
            'parents' => [config('services.google.drive_folder_id')], // Google Drive Folder ID
        ]);

        $content = file_get_contents($filePath);
        $file = $this->drive->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => mime_content_type($filePath),
            'uploadType' => 'multipart',
        ]);

        return $file->id;  // Return the file ID to reference it later
    }

    public function getFileUrl($fileId)
    {
        return "https://drive.google.com/uc?id={$fileId}";
    }
}
