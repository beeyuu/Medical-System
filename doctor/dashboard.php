<?php include 'header.php';?>
<div class="content">
        <div class="header">
            <input type="text" placeholder="Search Doctor name or Email">
            <button>Search</button>
            <div><time datetime="2024-7-17">Today</time></div>
        </div>
        <div class="status">
            <div>    
                <p>Doctors</p>
            </div>

            <div>   
                <p>Patients</p>
            </div>

            <div>   
                <p>NewBooking</p>
            </div>

            <div>              
                <p>Today Sessions</p>
            </div>
        </div>
        <div class="cards">
            <div class="card appointments">
                <h2>Appointments</h2>
                <p>@Appointment section.</p>
                <table>
                    <thead>
                        <tr>
                            <th>Appointment number</th>
                            <th>Patient name</th>
                            <th>Doctor</th>
                            <th>Session</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
                <button>Show all Appointments</button>
            </div>
            <div class="card sessions">
                <h2>Sessions</h2>
                <p>@Schedule section.</p>
                <table>
                    <thead>
                        <tr>
                            <th>Session Title</th>
                            <th>Doctor</th>
                            <th>Scheduled Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <button>Show all Sessions</button>
            </div>
        </div>
    </div>
</body>
</html>
