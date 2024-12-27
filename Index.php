<?php
header("Content-Type: application/json");
include 'User.php';

$userModel = new User($conn);
$requestMethod = $_SERVER["REQUEST_METHOD"];

switch ($requestMethod) {
    case 'GET':
        if (isset($_GET['id'])) {
            $user = $userModel->read($_GET['id']);
            echo json_encode($user);
        } else {
            echo json_encode(["message" => "ID not provided."]);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->name) && !empty($data->email) && !empty($data->phone)) {
            $result = $userModel->create($data->name, $data->email, $data->phone);
            echo json_encode(["message" => $result ? "User created." : "Failed to create user."]);
        } else {
            echo json_encode(["message" => "Incomplete data."]);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->id) && !empty($data->name) && !empty($data->email) && !empty($data->phone)) {
            $result = $userModel->update($data->id, $data->name, $data->email, $data->phone);
            echo json_encode(["message" => $result ? "User updated." : "Failed to update user."]);
        } else {
            echo json_encode(["message" => "Incomplete data."]);
        }
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->id)) {
            $result = $userModel->delete($data->id);
            echo json_encode(["message" => $result ? "User deleted." : "Failed to delete user."]);
        } else {
            echo json_encode(["message" => "ID not provided."]);
        }
        break;

    default:
        echo json_encode(["message" => "Invalid request method."]);
        break;
}
