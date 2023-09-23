<?php
// Function to handle file uploads
function uploadFiles() {
    $uploadDir = 'uploads/'; // Directory where uploaded files will be stored

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }

    $filePaths = []; // Initialize an array to store file paths

    if (isset($_FILES['files']['name'])) {
        $totalFiles = count($_FILES['files']['name']);

        for ($i = 0; $i < $totalFiles; $i++) {
            $fileName = $_FILES['files']['name'][$i];
            $fileTmpName = $_FILES['files']['tmp_name'][$i];

            // Generate a unique file name
            $uniqueFileName = uniqid() . '_' . $fileName;

            $filePath = $uploadDir . $uniqueFileName;

            if (move_uploaded_file($fileTmpName, $filePath)) {
                $filePaths[] = $filePath; // Add the file path to the array
            } else {
                echo "Error uploading $fileName.";
                return;
            }
        }
    }

    // Return the file paths as a JSON response
    header('Content-Type: application/json');
    echo json_encode(['file_paths' => $filePaths]);
}

// Handle GET requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Call the function to retrieve file paths
    uploadFiles();
}
?>
