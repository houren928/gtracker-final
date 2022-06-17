<!-- Display the mentee list for a mentor in a DataTable -->
<?php
if ($mentors != null) {
    // Stores the mentee id in an indexed array
    foreach ($mentors as $mentor) :
?>
        <tr id="<?php echo $mentor['user_id']; ?>">
            <td><img class="rounded-circle me-2" width="30" height="30" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($mentor['user_photo']) . ''; ?>"><?php echo $mentor['user_username']; ?></a></td>
            <td><?php echo $mentor['user_country']; ?></td>
            <td><?php echo $mentor['user_email']; ?></td>
            <td><?php echo $mentor['user_birthdate']; ?></td>
    <?php endforeach;
} else {
    // The database is not able to execute the prepared statement
    echo ("Something wrong happens");
}
    ?>
        </tr>
        <?php
        // The statement cannot be prepared and error occurs
        $conn->close();
        ?>