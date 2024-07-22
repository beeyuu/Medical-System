<?php include 'header.php';
$sql = "SELECT * FROM appointment";
$result = $conn->query($sql);
?>
<div class="container mx-auto p-10">
    <!-- Button Container -->
    <div class="btn-container mb-4">
        <button id="open-modal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Appointment
        </button>
    </div>
    
    <!-- Table -->
    <table class="table-auto w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Description</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
            ?>
            <tr class="bg-white">
                <td class="border border-gray-300 px-4 py-2"><?= $row['id'] ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $row['name'] ?><?= $row['lastname'] ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $row['description'] ?></td>
                <td class="border border-gray-300 px-4 py-2">
                <form method='POST' action='update.php' class='inline'>
                    <input type='hidden' name='id' value='<?= $row['id'] ?>'>
                    <button type='submit' name='edit' class='text-blue-500 hover:text-blue-700'>
                       Edit
                    </button>
                </form>
                <form method='POST' action='actions.php' class='inline ml-2'>
                    <input type='hidden' name='id' value='<?= $row['id'] ?>'>
                    <button type='submit' name='delete' class='text-red-500 hover:text-red-700'>
                        Delete
                    </button>
                </form>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg w-1/3">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-xl font-semibold">Add Doctor</h3>
            <button id="close-modal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                &times;
            </button>
        </div>
        <div class="p-6">
            <!-- Form or Content for Adding a Doctor -->
            <form method="post" action="actions.php">
                <div class="mb-4">
                    <label for="doctor-name" class="block text-gray-700">Doctor's Name</label>
                    <input type="text" id="doctor-name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="doctor-name" class="block text-gray-700">Doctor's Last Name</label>
                    <input type="text" id="doctor-name" name="lastname" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="doctor-name" class="block text-gray-700">Doctor's User Name</label>
                    <input type="text" id="doctor-name" name="username" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="doctor-name" class="block text-gray-700">Doctor's Password</label>
                    <input type="text" id="doctor-name" name="password" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="specialization" class="block text-gray-700">Specialization</label>
                    <input type="text" id="specialization" name="description" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                </div>
                <button type="submit" name="addDoctor" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save Doctor
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('open-modal').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
    });

    document.getElementById('close-modal').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });

    // Close modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === document.getElementById('modal')) {
            document.getElementById('modal').classList.add('hidden');
        }
    });
</script>
</body>
</html>

</body>
</html>
