<?php
require_once __DIR__ . '/../../Controllers/OffreController.php';

if (isset($_POST['search'])) {
    try {
        $search = $_POST['search'];
        
        $query = "SELECT o.*, u.firstname 
                  FROM offres o 
                  JOIN users u ON o.user_id = u.id 
                  WHERE o.titre LIKE :search";
        
        $stmt = DatabaseConnection::getInstance()->prepare($query);
        $stmt->execute([':search' => "%$search%"]);
        
        $html = '';
        while ($offre = $stmt->fetch(PDO::FETCH_OBJ)) {
            $html .= "
            <div class='col-md-9 mt-4'>
                <div class='book-card d-flex gap-4 p-3 shadow-sm rounded'>
                    <img src='https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c' 
                         alt='Book Cover' 
                         class='book-cover' />
                    <div class='book-details flex-grow-1'>
                        <div class='book-author text-success fw-bold'>{$offre->titre}</div>
                        <div class='book-title fw-bold fs-5'>
                            <img alt='...' src='photo' class='avatar avatar-sm rounded-circle me-2' />
                            <a class='text-heading font-semibold'>{$offre->firstname}</a>
                        </div>
                        <p class='text-muted small'>{$offre->description}</p>
                        <div class='fw-bold'>duree: <span class='text-dark'>{$offre->duree}</span></div>
                        <div class='fw-bold'>Budget: <span class='text-dark'>{$offre->budget}</span></div>
                        <span class='text-success fw-bold'>development</span>
                    </div>
                    <div class='d-flex flex-column align-items-end justify-content-between'>
                        <div class='book-icons'>
                            <i class='fas fa-star text-warning'></i> 4.4
                            <i class='fas fa-bookmark text-muted'></i>
                        </div>
                        <button class='btn btn-success btn-sm'>Take offer Now</button>
                    </div>
                </div>
            </div>";
        }
        
        echo json_encode(['status' => 'success', 'html' => $html]);
        
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No search term provided']);
}