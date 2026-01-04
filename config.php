<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dashboard_catatan';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Koneksi database gagal: ' . $conn->connect_error]));
}

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

// Fungsi untuk mendapatkan semua pengaturan
function getPengaturan($conn) {
    $settings = [];
    $result = $conn->query("SELECT nama_setting, nilai_setting FROM pengaturan");
    while ($row = $result->fetch_assoc()) {
        $settings[$row['nama_setting']] = $row['nilai_setting'];
    }
    return $settings;
}

// Fungsi untuk memperbarui pengaturan
function updatePengaturan($conn, $data) {
    foreach ($data as $key => $value) {
        $stmt = $conn->prepare("INSERT INTO pengaturan (nama_setting, nilai_setting) VALUES (?, ?) 
                               ON DUPLICATE KEY UPDATE nilai_setting = ?");
        $stmt->bind_param("sss", $key, $value, $value);
        $stmt->execute();
    }
    return ['success' => true, 'message' => 'Pengaturan berhasil diperbarui'];
}

// API Routes
switch ($action) {
    case 'pengaturan':
        if ($method == 'GET') {
            echo json_encode(getPengaturan($conn));
        } elseif ($method == 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            echo json_encode(updatePengaturan($conn, $input));
        }
        break;
    
    case 'kategori':
        $result = $conn->query("SELECT * FROM kategori ORDER BY nama");
        $kategori = [];
        while ($row = $result->fetch_assoc()) {
            $kategori[] = $row;
        }
        echo json_encode($kategori);
        break;
    
    case 'filter':
        $where = [];
        $params = [];
        $types = '';
        
        if (!empty($_GET['kategori'])) {
            $where[] = "c.kategori_id = ?";
            $params[] = $_GET['kategori'];
            $types .= 'i';
        }
        
        if (!empty($_GET['status'])) {
            $where[] = "c.status = ?";
            $params[] = $_GET['status'];
            $types .= 's';
        }
        
        if (!empty($_GET['prioritas'])) {
            $where[] = "c.prioritas = ?";
            $params[] = $_GET['prioritas'];
            $types .= 's';
        }
        
        if (!empty($_GET['tanggal'])) {
            $where[] = "c.tanggal = ?";
            $params[] = $_GET['tanggal'];
            $types .= 's';
        }
        
        $whereClause = $where ? "WHERE " . implode(" AND ", $where) : "";
        
        $query = "SELECT c.*, k.nama as kategori_nama, k.warna as kategori_warna 
                  FROM catatan c 
                  LEFT JOIN kategori k ON c.kategori_id = k.id 
                  $whereClause 
                  ORDER BY c.tanggal DESC, c.waktu DESC";
        
        $stmt = $conn->prepare($query);
        if ($where) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $catatan = [];
        while ($row = $result->fetch_assoc()) {
            $catatan[] = $row;
        }
        echo json_encode($catatan);
        break;
    
    default:
        // Default: get all catatan
        if ($method == 'GET') {
            $id = $_GET['id'] ?? null;
            
            if ($id) {
                // Get single catatan
                $stmt = $conn->prepare("SELECT c.*, k.nama as kategori_nama, k.warna as kategori_warna 
                                      FROM catatan c 
                                      LEFT JOIN kategori k ON c.kategori_id = k.id 
                                      WHERE c.id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                echo json_encode($result->fetch_assoc());
            } else {
                // Get all catatan
                $result = $conn->query("SELECT c.*, k.nama as kategori_nama, k.warna as kategori_warna 
                                      FROM catatan c 
                                      LEFT JOIN kategori k ON c.kategori_id = k.id 
                                      ORDER BY c.tanggal DESC, c.waktu DESC");
                $catatan = [];
                while ($row = $result->fetch_assoc()) {
                    $catatan[] = $row;
                }
                echo json_encode($catatan);
            }
        } elseif ($method == 'POST' && $_GET['action'] == 'tambah') {
            // Tambah catatan baru
            $input = json_decode(file_get_contents('php://input'), true);
            
            $stmt = $conn->prepare("INSERT INTO catatan (judul, deskripsi, kategori_id, tanggal, waktu, status, prioritas) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssissss", 
                $input['judul'],
                $input['deskripsi'],
                $input['kategori_id'],
                $input['tanggal'],
                $input['waktu'],
                $input['status'],
                $input['prioritas']
            );
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'id' => $conn->insert_id]);
            } else {
                echo json_encode(['success' => false, 'error' => $conn->error]);
            }
        } elseif ($method == 'PUT') {
            // Update catatan
            $id = $_GET['id'];
            $input = json_decode(file_get_contents('php://input'), true);
            
            $stmt = $conn->prepare("UPDATE catatan SET judul=?, deskripsi=?, kategori_id=?, tanggal=?, waktu=?, status=?, prioritas=? WHERE id=?");
            $stmt->bind_param("ssissssi", 
                $input['judul'],
                $input['deskripsi'],
                $input['kategori_id'],
                $input['tanggal'],
                $input['waktu'],
                $input['status'],
                $input['prioritas'],
                $id
            );
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => $conn->error]);
            }
        } elseif ($method == 'DELETE') {
            // Hapus catatan
            $id = $_GET['id'];
            $stmt = $conn->prepare("DELETE FROM catatan WHERE id = ?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => $conn->error]);
            }
        }
        break;
}

$conn->close();
?>