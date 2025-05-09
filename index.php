<?php
session_start();
require_once 'config/database.php';
require_once 'includes/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Verificar autenticação
if (!isset($_SESSION['user']) && $page !== 'login') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nitro Pay - Dashboard Financeiro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <?php include 'includes/sidebar.php'; ?>
        
        <div class="flex-1">
            <?php include 'includes/topbar.php'; ?>
            
            <main class="p-6">
                <?php
                switch ($page) {
                    case 'dashboard':
                        include 'pages/dashboard.php';
                        break;
                    case 'accounts-payable':
                        include 'pages/accounts-payable.php';
                        break;
                    case 'operational-costs':
                        include 'pages/operational-costs.php';
                        break;
                    case 'marketing':
                        include 'pages/marketing.php';
                        break;
                    case 'meds':
                        include 'pages/meds.php';
                        break;
                    case 'users':
                        include 'pages/users.php';
                        break;
                    case 'settings':
                        include 'pages/settings.php';
                        break;
                    default:
                        include 'pages/dashboard.php';
                }
                ?>
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>