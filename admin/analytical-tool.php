<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytical Tool</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .sidebar {
            width: 200px;
            background-color: #800000;
            color: white;
            height: 100vh;
            padding: 15px;
            position: fixed;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 10px 0;
        }

        .sidebar a:hover {
            background-color: #600000;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .header {
            font-size: 24px;
            color: #800000;
            margin-bottom: 20px;
        }

        .coming-soon {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <a href="admin-index.php">Dashboard</a>
        <a href="inbox.php">Inbox</a>
        <a href="event-calendar.php">Event Calendar</a>
        <a href="news.php">News</a>
        <a href="user-management.php">User Account Management</a>
        <a href="analytical-tool.php">Analytical Tool</a>
        <a href="account-settings.php">Account Settings</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <h1 class="header">Analytical Tool</h1>
        <div class="form-container">
            <form method="post">
                <div class="form-group">
                    <label for="barangay">Barangay:</label>
                    <select id="barangay" name="barangay" required>
                        <option value="Anilao">Anilao</option>
                        <option value="Atlag">Atlag</option>
                        <option value="Babatnin">Babatnin</option>
                        <option value="Bagna">Bagna</option>
                        <option value="Bagong Bayan">Bagong Bayan</option>
                        <option value="Balayong">Balayong</option>
                        <option value="Balite">Balite</option>
                        <option value="Bangkal">Bangkal</option>
                        <option value="Barihan">Barihan</option>
                        <option value="Bulihan">Bulihan</option>
                        <option value="Bungahan">Bungahan</option>
                        <option value="Caingin">Caingin</option>
                        <option value="Calero">Calero</option>
                        <option value="Caliligawan">Caliligawan</option>
                        <option value="Canalate">Canalate</option>
                        <option value="Caniogan">Caniogan</option>
                        <option value="Catmon">Catmon</option>
                        <option value="Cofradia">Cofradia</option>
                        <option value="Dakila">Dakila</option>
                        <option value="Guinhawa">Guinhawa</option>
                        <option value="Liang">Liang</option>
                        <option value="Ligas">Ligas</option>
                        <option value="Longos">Longos</option>
                        <option value="Look_1st">Look 1st</option>
                        <option value="Look_2nd">Look 2nd</option>
                        <option value="Lugam">Lugam</option>
                        <option value="Mabolo">Mabolo</option>
                        <option value="Mambog">Mambog</option>
                        <option value="Masile">Masile</option>
                        <option value="Matimbo">Matimbo</option>
                        <option value="Mojon">Mojon</option>
                        <option value="Namayan">Namayan</option>
                        <option value="Niugan">Niugan</option>
                        <option value="Pamarawan">Pamarawan</option>
                        <option value="Panasahan">Panasahan</option>
                        <option value="Pinagbakahan">Pinagbakahan</option>
                        <option value="San_Agustin">San Agustin</option>
                        <option value="San_Gabriel">San Gabriel</option>
                        <option value="San_Juan">San Juan</option>
                        <option value="San_Pablo">San Pablo</option>
                        <option value="San_Vicente">San Vicente</option>
                        <option value="Santiago">Santiago</option>
                        <option value="Santisima_Trinidad">Santisima Trinidad</option>
                        <option value="Santo_Cristo">Santo Cristo</option>
                        <option value="Santo_Niño">Santo Niño</option>
                        <option value="Santo_Rosario">Santo Rosario</option>
                        <option value="Santor">Santor</option>
                        <option value="Sumapang_Bata">Sumapang Bata</option>
                        <option value="Sumapang_Matanda">Sumapang Matanda</option>
                        <option value="Taal">Taal</option>
                        <option value="Tikay">Tikay</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="marital_status">Marital Status:</label>
                    <select id="marital_status" name="marital_status" required>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="educational_attainment">Educational Attainment:</label>
                    <select id="educational_attainment" name="educational_attainment" required>
                        <option value="College_Graduate">College Graduate</option>
                        <option value="College_Level">College Level</option>
                        <option value="High_School">High School</option>
                        <option value="Elementary">Elementary</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="employment_status">Employment Status:</label>
                    <select id="employment_status" name="employment_status" required>
                        <option value="Employed">Employed</option>
                        <option value="Unemployed">Unemployed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="political_interest">Political Interest:</label>
                    <select id="political_interest" name="political_interest" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>

        <?php

        ?>
    </div>
</body>

</html>