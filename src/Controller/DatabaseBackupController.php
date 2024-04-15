<?php

namespace App\Controller;

use DateTime, DateTimeZone;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DatabaseBackupController extends AbstractController
{
    #[Route('/backup-database', name: 'app_database_backup')]
    public function backupDatabase(): Response
    {
        $backupFilename = $this->sauvegarderBaseDeDonnees();

        if ($backupFilename) {
            return $this->telechargerFichier($backupFilename);
        } else {
            $this->addFlash('danger', 'Erreur lors de la sauvegarde de la base de données.');
            return $this->redirectToRoute('admin');
        }
    }
    
    private function sauvegarderBaseDeDonnees():?string{
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone ('Europe/Paris'));
        // $filename = 'backup/' . $date->format('Y-m-d-H-i') . '-' . substr(md5(rand()), 0, 10). '.sql';
        $projectDir = $this->getParameter('kernel.project_dir');
        $filename = $projectDir . '/public/backup/db_' . $date->format('Y-m-d-H-i') . '-' . substr(md5(rand()), 0, 10) . '.sql';
        
        $command = "mysqldump --user=". $this->getParameter('database_user') .
        " --password=" . $this->getParameter('database_password') .
        " --host=" . $this->getParameter('database_host') .
        " " . $this->getParameter('database_name') .
        " --result-file={$filename} 2>&1";

    $returnVar = -1;
    exec($command, $output, $returnVar);

    if ($returnVar === 0) {
        return $filename;
    } else {
        $errorMessage = 'Erreur lors de la sauvegarde de la base de données. ' . implode("\n", $output);
    $this->addFlash('danger', $errorMessage);
    return null;
    }
}
    private function telechargerFichier(string $filename): BinaryFileResponse
    {
        $response = new BinaryFileResponse($filename);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'backup_' . basename($filename)
        );

        return $response;
    }
}