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
        function encodeData($barangay, $gender, $maritalStatus, $educationalAttainment, $employmentStatus, $politicalInterest)
        {
            $barangayMap = [
                'Anilao' => 1,
                'Atlag' => 2,
                'Babatnin' => 3,
                'Bagna' => 4,
                'Bagong Bayan' => 5,
                'Balayong' => 6,
                'Balite' => 7,
                'Bangkal' => 8,
                'Barihan' => 9,
                'Bulihan' => 10,
                'Bungahan' => 11,
                'Caingin' => 12,
                'Calero' => 13,
                'Caliligawan' => 14,
                'Canalate' => 15,
                'Caniogan' => 16,
                'Catmon' => 17,
                'Cofradia' => 18,
                'Dakila' => 19,
                'Guinhawa' => 20,
                'Liang' => 21,
                'Ligas' => 22,
                'Longos' => 23,
                'Look_1st' => 24,
                'Look_2nd' => 25,
                'Lugam' => 26,
                'Mabolo' => 27,
                'Mambog' => 28,
                'Masile' => 29,
                'Matimbo' => 30,
                'Mojon' => 31,
                'Namayan' => 32,
                'Niugan' => 33,
                'Pamarawan' => 34,
                'Panasahan' => 35,
                'Pinagbakahan' => 36,
                'San_Agustin' => 37,
                'San_Gabriel' => 38,
                'San_Juan' => 39,
                'San_Pablo' => 40,
                'San_Vicente' => 41,
                'Santiago' => 42,
                'Santisima_Trinidad' => 43,
                'Santo_Cristo' => 44,
                'Santo_Niño' => 45,
                'Santo_Rosario' => 46,
                'Santor' => 47,
                'Sumapang_Bata' => 48,
                'Sumapang_Matanda' => 49,
                'Taal' => 50,
                'Tikay' => 51,
            ];

            $genderMap = ['Male' => 0, 'Female' => 1];
            $maritalStatusMap = ['Single' => 0, 'Married' => 1];
            $educationMap = ['College_Graduate' => 3, 'College_Level' => 2, 'High_School' => 1, 'Elementary' => 0];
            $employmentMap = ['Employed' => 1, 'Unemployed' => 0];
            $politicalInterestMap = ['Yes' => 1, 'No' => 0];

            return [
                $barangayMap[$barangay],
                $genderMap[$gender],
                $maritalStatusMap[$maritalStatus],
                $educationMap[$educationalAttainment],
                $employmentMap[$employmentStatus],
                $politicalInterestMap[$politicalInterest]
            ];
        }

        require '../vendor/autoload.php';
        use Phpml\Classification\KNearestNeighbors;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $barangay = filter_input(INPUT_POST, 'barangay', FILTER_SANITIZE_STRING);
            $age = intval(filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT));
            $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
            $maritalStatus = filter_input(INPUT_POST, 'marital_status', FILTER_SANITIZE_STRING);
            $educationalAttainment = filter_input(INPUT_POST, 'educational_attainment', FILTER_SANITIZE_STRING);
            $employmentStatus = filter_input(INPUT_POST, 'employment_status', FILTER_SANITIZE_STRING);
            $politicalInterest = filter_input(INPUT_POST, 'political_interest', FILTER_SANITIZE_STRING);


            $input = array_merge([$age], encodeData($barangay, $gender, $maritalStatus, $educationalAttainment, $employmentStatus, $politicalInterest));
            $count = 0;
            $reason = '';
            $maxWeight = 0;


            $weights = [
                'Underage' => 5,
                'Lack of political interest' => 3,
                'Financially struggling (unemployed)' => 2,
                'No time (married)' => 1,
                'No time (college student)' => 1
            ];

            $reasons = [];
            if ($age < 18) {
                $count++;
                $reasons['Underage'] = $weights['Underage'];
                $isParticipating = 'No';
            }

            if ($politicalInterest === 'No') {
                $count++;
                $reasons['Lack of political interest'] = $weights['Lack of political interest'];
            }

            if ($employmentStatus === 'Unemployed') {
                $count++;
                $reasons['Financially struggling (unemployed)'] = $weights['Financially struggling (unemployed)'];
            }

            if ($maritalStatus === 'Married') {
                $count++;
                $reasons['No time (married)'] = $weights['No time (married)'];
            }

            if ($educationalAttainment === 'College_Level' || $educationalAttainment === 'High_School') {
                $count++;
                $reasons['No time (college student)'] = $weights['No time (college student)'];
            }
            $isParticipating = 'Y';
            $dynamicSamples[] = $input;
            $labels = [$isParticipating];
            $classifier = new KNearestNeighbors();
            $classifier->train($dynamicSamples, $labels);
            $isParticipating = $classifier->predict($input)[0];
            $isParticipatingDisplay = $isParticipating === 'Y' ? 'Yes' : 'No';
            // echo "<div>Total count: <strong>$age,$politicalInterest ,$employmentStatus, $maritalStatus, $educationalAttainment</strong></div>";
        
            if ($count >= 1) {
                foreach ($reasons as $reasonText => $weight) {
                    if ($weight > $maxWeight) {
                        $maxWeight = $weight;
                        $reason = $reasonText;
                    }
                }
                $isParticipatingDisplay = 'No';
                echo "<div class='output'>Prediction: This voter will most likely participate: <strong>$isParticipatingDisplay</strong></div>";
                echo "<div class='output'>Reason for non-participation: <strong>$reason</strong></div>";
                echo "<div>Total count: <strong>$count</strong></div>";
            } else {
                echo "<div class='output'>Prediction: This voter will most likely participate: <strong>$isParticipatingDisplay</strong></div>";
            }
        }

        ?>
    </div>
</body>

</html>