<?php
// Set correct headers
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['success' => false, 'message' => 'Method not allowed']);
  exit;
}

// Read raw POST input
$input = json_decode(file_get_contents('php://input'), true);

// Validate input
if (!isset($input['codename']) || !isset($input['mission'])) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Missing parameters']);
  exit;
}

$codename = strtolower(trim($input['codename']));
$newMission = trim($input['mission']);

$missionsFile = 'missions.json';

// Check if file exists
if (!file_exists($missionsFile)) {
  echo json_encode(['success' => false, 'message' => 'Missions file not found']);
  exit;
}

// Read and decode current missions
$missionsData = json_decode(file_get_contents($missionsFile), true);

// Validate codename exists
if (!isset($missionsData[$codename])) {
  echo json_encode(['success' => false, 'message' => 'Codename not found']);
  exit;
}

// Update mission
$missionsData[$codename]['mission'] = $newMission;

// Write updated missions back to file
if (file_put_contents($missionsFile, json_encode($missionsData, JSON_PRETTY_PRINT))) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false, 'message' => 'Failed to write to file']);
}
?>
