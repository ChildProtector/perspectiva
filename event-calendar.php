<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add any additional styles specific to the calendar here */
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr); /* 7 columns for days of the week */
            gap: 5px; /* Space between cells */
            margin-top: 20px; /* Space above the calendar */
        }
        .day, .day-header {
            border: 1px solid #ccc; /* Border for each day */
            padding: 10px; /* Space inside each day */
            text-align: center; /* Centered text */
            background-color: #f9f9f9; /* Light background color */
            position: relative; /* For positioning events */
        }
        .day-header {
            font-weight: bold; /* Bold for headers */
            background-color: #f0f0f0; /* Slightly different background for headers */
        }
        .event {
            background-color: #4CAF50; /* Green background for events */
            color: white;
            padding: 5px; /* Adjust padding */
            border-radius: 3px; /* Rounded corners */
            margin-top: 2px; /* Space between events */
            font-size: 14px; /* Adjust font size */
            cursor: pointer;
        }
        .learn-more-button {
            background-color: #ffeb3b;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 5px;
        }
        .description-box {
            display: none; /* Initially hidden */
            background-color: #fff3cd; /* Light background for the description box */
            border: 1px solid #ffeeba;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            color: maroon; /* Set description font color to maroon */
        }
        .month-header {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="logoweb.png" alt="My Logo" class="logo">
        <div class="links">
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="news.php">News</a>
            <a href="event-calendar.php">Event Calendar</a>
            <a href="contact-admin.php">Contact Administrator</a>
            <a href="about-us.php">About Us</a>
            <a href="login/user-logout.php">Logout</a>
        </div>
    </div>
    <div class="content">
        <h1 class="header">Event Calendar</h1>
        
        <div class="month-header" id="monthHeader"></div>
        
        <input type="date" id="datePicker" onchange="updateCalendar()">
        <div class="calendar" id="calendar"></div>
    </div>

    <script>
    let events = {};

    // Fetch events from the server
    fetch('fetch_events.php')
        .then(response => response.json())
        .then(data => {
            events = data;
            const today = new Date();
            document.getElementById('datePicker').value = today.toISOString().split('T')[0];
            createCalendar(today.getFullYear(), today.getMonth());
        });

    function createCalendar(year, month) {
        const calendar = document.getElementById('calendar');
        const monthHeader = document.getElementById('monthHeader');
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        
        // Set the header with month name and year
        monthHeader.textContent = `${monthNames[month]} ${year}`;

        calendar.innerHTML = ''; // Clear previous calendar

        // Days of the week headers
        const daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        for (let i = 0; i < daysOfWeek.length; i++) {
            const headerElement = document.createElement('div');
            headerElement.className = 'day-header';
            headerElement.textContent = daysOfWeek[i];
            calendar.appendChild(headerElement);
        }

        // Get the first day of the month and total days in the month
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Adjust for Sunday being day 0 in JavaScript (shift to Monday-based week)
        const adjustedFirstDay = (firstDay === 0) ? 6 : firstDay - 1;

        // Fill in the blanks for the first week
        for (let i = 0; i < adjustedFirstDay; i++) {
            const blankDay = document.createElement('div');
            blankDay.className = 'day';
            calendar.appendChild(blankDay);
        }

        // Fill in the days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'day';
            dayElement.textContent = day;

            // Check for events on this day
            const dateString = `${year}-${(month + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
            if (events[dateString]) {
                events[dateString].forEach(event => {
                    const eventElement = document.createElement('div');
                    eventElement.className = 'event';
                    eventElement.innerHTML = `
                        <strong>${event.name}</strong><br>
                        Location/Barangay: ${event.place}<br>
                        <button class="learn-more-button" onclick="toggleDescription('${event.id}')">Details</button>
                        <div class="description-box" id="desc-${event.id}" style="display: none;">
                            ${event.description}
                        </div>
                    `;
                    dayElement.appendChild(eventElement);
                });
            }

            calendar.appendChild(dayElement);
        }
    }

    function toggleDescription(eventId) {
        const descriptionBox = document.getElementById(`desc-${eventId}`);
        
        // Hide all other description boxes first
        document.querySelectorAll('.description-box').forEach(box => {
            if (box !== descriptionBox) {
                box.style.display = 'none'; // Hide other descriptions
            }
        });

        // Toggle the selected description
        descriptionBox.style.display = (descriptionBox.style.display === 'none') ? 'block' : 'none';
    }

    function updateCalendar() {
        const datePicker = document.getElementById('datePicker');
        const selectedDate = new Date(datePicker.value);

        if (!isNaN(selectedDate)) {
            createCalendar(selectedDate.getFullYear(), selectedDate.getMonth());
        }
    }

    // Initialize calendar with current date
    document.addEventListener('DOMContentLoaded', () => {
        const today = new Date();
        document.getElementById('datePicker').value = today.toISOString().split('T')[0];
        createCalendar(today.getFullYear(), today.getMonth());
    });
</script>

</body>
</html>
