<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Love Wedding</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-bg: #ec4899; 
            --text-light: #ffffff;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #f8fafc; 
            overflow-x: hidden; 
        }

        /* Sidebar Styling */
        .sidebar { 
            width: 250px; 
            background-color: var(--sidebar-bg); 
            min-height: 100vh; 
            position: fixed; 
            top: 0; 
            left: 0; 
            z-index: 1000;
        }

        .sidebar h5 {
            font-size: 1.25rem;
            letter-spacing: 0.5px;
        }

        .sidebar a { 
            color: rgba(255, 255, 255, 0.8); 
            text-decoration: none; 
            display: flex;
            align-items: center;
            padding: 12px 25px; 
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .sidebar a i {
            font-size: 1.1rem;
            margin-right: 12px;
        }

        .sidebar a:hover { 
            color: #fff;
            background: rgba(255, 255, 255, 0.15); 
        }

        .sidebar a.active {
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
            font-weight: 500;
            border-radius: 8px;
            margin: 0 15px;
            padding: 12px 10px;
        }

        .main-content { 
            margin-left: 250px; 
            width: calc(100% - 250px); 
            padding: 35px; 
        }
    </style>
</head>
<body>
<div class="d-flex">