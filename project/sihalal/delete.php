<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['filenames']) && is_array($_POST['filenames'])) {
        $target_dir = "uploads/";
        $deleted_files = [];
        $errors = [];

        foreach ($_POST['filenames'] as $filename) {
            $filename = basename($filename);
            $target_file = $target_dir . $filename;

            // Cek apakah file ada
            if (file_exists($target_file)) {
                // Hapus file
                if (unlink($target_file)) {
                    $deleted_files[] = ["status" => "success", "message" => "File '$filename' deleted successfully."];
                } else {
                    $errors[] = ["status" => "error", "message" => "There was an error deleting file '$filename'."];
                }
            } else {
                $errors[] = ["status" => "error", "message" => "File '$filename' does not exist."];
            }
        }

        echo json_encode(["deleted_files" => $deleted_files, "errors" => $errors]);
    } else {
        echo json_encode(["status" => "error", "message" => "No filenames specified or invalid format."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}