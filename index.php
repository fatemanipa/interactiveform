<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment By Fatema Nipa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        $name = '';
        $email = '';
        $password = '';
        $gender = '';
        $bio = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = isset($_POST['name']) ? custom_validation($_POST['name']) : '';
            $email = isset($_POST['email']) ? custom_validation($_POST['email']) : '';
            $password = isset($_POST['password']) ? custom_validation($_POST['password']) : '';
            $gender = isset($_POST['gender']) ? custom_validation($_POST['gender']) : '';
            $bio = isset($_POST['bio']) ? custom_validation($_POST['bio']) : '';
        }

        function custom_validation($field_value_check){
            $field_value_check = trim($field_value_check);
            $field_value_check = stripslashes($field_value_check);
            $field_value_check = htmlspecialchars($field_value_check);

            return $field_value_check;
        }

    ?>

    <div class="container">
        <div class="column">
            <h1>Interactive Form</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bio">Short Bio:</label>
                    <textarea id="bio" name="bio" rows="4" placeholder="Tell us about yourself"></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>

        <div class="column">
            <h2>Submitted Data</h2>
            <div class="result">
                <?php
                    if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($name) && !empty($email)){
                        echo "<p><strong>Name:</strong> $name</p>";
                        echo "<p><strong>Email:</strong> $email</p>";
                        echo "<p><strong>Gender:</strong> $gender</p>";
                        echo "<p><strong>Bio:</strong> $bio</p>";
                    }else {
                        echo "<p><strong>No data submitted yet.</strong></p>";
                    }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
