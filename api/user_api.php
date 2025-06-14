<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

include 'config.php';

// Parse HTTP method and input
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents("php://input"), true);

// Helper to fetch ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

switch ($method) {
    case 'GET':
        // Read
        if ($id > 0) {
            $result = $conn->query("SELECT * FROM users WHERE id = $id");
            echo json_encode($result->fetch_assoc());
        } else {
            $result = $conn->query("SELECT * FROM users");
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            echo json_encode($users);
        }
        break;

    case 'POST':
        // Create
        $name = $conn->real_escape_string($input['name']);
        $email = $conn->real_escape_string($input['email']);
        $password = password_hash($input['password'], PASSWORD_BCRYPT);
        $dob = $conn->real_escape_string($input['dob']);

        $sql = "INSERT INTO users (name, email, password, dob) VALUES ('$name', '$email', '$password', '$dob')";
        if ($conn->query($sql)) {
            echo json_encode(["status" => "User created"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
        break;

    case 'PUT':
        // Update
        if ($id <= 0) {
            echo json_encode(["error" => "Missing ID for update"]);
            break;
        }

        $name = $conn->real_escape_string($input['name']);
        $email = $conn->real_escape_string($input['email']);
        $dob = $conn->real_escape_string($input['dob']);

        $set = "name='$name', email='$email', dob='$dob'";
        if (!empty($input['password'])) {
            $password = password_hash($input['password'], PASSWORD_BCRYPT);
            $set .= ", password='$password'";
        }

        $sql = "UPDATE users SET $set WHERE id = $id";
        if ($conn->query($sql)) {
            echo json_encode(["status" => "User updated"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
        break;

    case 'DELETE':
        // Delete
        if ($id <= 0) {
            echo json_encode(["error" => "Missing ID for deletion"]);
            break;
        }

        $sql = "DELETE FROM users WHERE id = $id";
        if ($conn->query($sql)) {
            echo json_encode(["status" => "User deleted"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
        break;

    default:
        echo json_encode(["error" => "Unsupported request method"]);
}

$conn->close();
?>
