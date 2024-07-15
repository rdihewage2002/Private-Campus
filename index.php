<?php
session_start();
require 'config.php'; 
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>
<html>
<head>
     <title>Horizon Valley University</title>
    <link rel="stylesheet" href="css/styles.css"> 
    <style>
        .text-container {
            position: absolute;
            color: rgb(255, 255, 255);
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(41, 41, 41, 0.8);
            padding: 0.5rem;
            text-align: center;
            font-size: 16px;
        }
        .dashboard-container {
            padding: 20px;
            background-color: #ca9eb7;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .dashboard-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .dashboard {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .dashboard-item {
            flex: 1 1 calc(33.333% - 40px); 
            background-color: #17d637;
            margin: 10px;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-item h3 {
            margin-bottom: 10px;
        }

        .dashboard-item p {
            margin-bottom: 20px;
        }

        .dashboard-item a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .dashboard-item a:hover {
            background-color: #45a049; 
        }
    </style>
</head>
<body>
<header>
            <div class="container">
                <h1>Welcome to Horizon Valley University</h1>
                <nav>
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                    <a href="search.php">Search</a>
                    <a href="update.php">Update</a>
                    <a href="delete.php">Delete</a>
                </nav>
            </div>
        </header>
    <div class="content">
        <div class="dashboard-container">
            <h2>Dashboard</h2>
            <div class="dashboard">
                <div class="dashboard-item">
                    <h3>Student Enrollment</h3>
                    <p>Manage student enrollment processes.</p>
                    <button type="submit" class="button">Go to enrollment</button>
                </div>
                <div class="dashboard-item">
                    <h3>Course Management</h3>
                    <p>Manage course details and assignments.</p>
                    <button type="submit" class="button">Go to course</button>
                </div>
                <div class="dashboard-item">
                    <h3>Faculty Management</h3>
                    <p>Manage faculty information and schedules.</p>
                    <button type="submit" class="button">Go to faculty</button>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>
