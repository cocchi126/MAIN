<?php
// Abilita il debug per mostrare gli errori
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verifica il metodo della richiesta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Raccogli i dati dal form e sanificali
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Controlla se tutti i campi sono stati compilati
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Logica per inviare l'email va qui
        echo json_encode(['status' => 'success', 'message' => 'Messaggio inviato con successo!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Per favore, compila tutti i campi.']);
    }
} else {
    // Risposta per metodi non consentiti
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['status' => 'error', 'message' => 'Metodo non consentito']);
}
