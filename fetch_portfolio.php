<?php
// Database connection
include './database/db.php';

function getIcon($filter)
{
    if ($filter == "Poster") {
        return "icon-picture";
    } elseif ($filter == "Art") {
        return "icon-star";
    } elseif ($filter == "Video") {
        return "icon-camrecorder";
    } elseif ($filter == "Logo") {
        return "icon-trophy";
    }
}

function getFilter($filter)
{
    if ($filter == "Poster") {
        return "art";
    } elseif ($filter == "Art") {
        return "branding";
    } elseif ($filter == "Video") {
        return "creative";
    } elseif ($filter == "Logo") {
        return "design";
    }
}

// Get the Google Drive API key
$gdrive_api_query = $db->query("SELECT gdrive_api FROM API");
$gdrive_api_key = mysqli_fetch_assoc($gdrive_api_query);

function checkUrlFromDrive($url_db, string $gdrive_api_key)
{
    if (strpos($url_db, "drive.google.com") !== false) {
        preg_match('/\/d\/([a-zA-Z0-9_-]+)/', $url_db, $matches);
        return "https://www.googleapis.com/drive/v3/files/{$matches[1]}?alt=media&key={$gdrive_api_key}";
    } else {
        return $url_db;
    }
    
}

// Function to extract links from the text
function extractLinks($extra_asset)
{
    // Match all URLs within double quotes
    preg_match_all('/"([^"]+)"/', $extra_asset, $matches);

    // Return the array of URLs
    return $matches[1];
}

$items_per_page = 9;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

$query = "SELECT * FROM designs LIMIT $offset, $items_per_page";
$result = mysqli_query($db, $query);

$portfolio_items = [];

while ($row = mysqli_fetch_array($result)) {
    $item = [
        'UID' => $row['UID'],
        'title' => $row['title'],
        'filter' => $row['filter'],
        'type' => $row['type'],
        'asset_link' => checkUrlFromDrive($row['asset_link'], $gdrive_api_key['gdrive_api']),
        'thumb_link' => checkUrlFromDrive($row['thumb_link'], $gdrive_api_key['gdrive_api']),
        'extra_link' => $row['extra_link'],
        'p1_content' => $row['p1_content'],
        'p2_content' => $row['p2_content'],
        'caption_content' => $row['caption_content'],
        'gdrive_api' => $gdrive_api_key['gdrive_api']
    ];

    $portfolio_items[] = $item;
}

$total_items_query = "SELECT COUNT(*) as count FROM designs";
$total_items_result = mysqli_query($db, $total_items_query);
$total_items_row = mysqli_fetch_assoc($total_items_result);
$total_items = $total_items_row['count'];

$total_pages = ceil($total_items / $items_per_page);

$response = [
    'items' => $portfolio_items,
    'total_pages' => $total_pages,
    'current_page' => $page
];

header('Content-Type: application/json');
echo json_encode($response);

$db->close();