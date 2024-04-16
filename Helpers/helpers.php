<?php
function timeDifference($postTime){
    // Get the current date and time
    $currentDateTime = new DateTime();

    // Assuming $postDateTime is the date and time of the post
    $postDateTime = new DateTime($postTime); // Example date and time of the post

    // Calculate the difference between the current date and time and the post date and time
    $difference = $currentDateTime->diff($postDateTime);

    // Format the difference as a human-readable string
    $humanReadableDifference = '';

    if ($difference->y > 0) {
        $humanReadableDifference .= $difference->y . ' year';
        if ($difference->y > 1) {
            $humanReadableDifference .= 's';
        }
        $humanReadableDifference .= ' ago';
    } elseif ($difference->m > 0) {
        $humanReadableDifference .= $difference->m . ' month';
        if ($difference->m > 1) {
            $humanReadableDifference .= 's';
        }
        $humanReadableDifference .= ' ago';
    } elseif ($difference->d > 0) {
        $humanReadableDifference .= $difference->d . ' day';
        if ($difference->d > 1) {
            $humanReadableDifference .= 's';
        }
        $humanReadableDifference .= ' ago';
    } elseif ($difference->h > 0) {
        $humanReadableDifference .= $difference->h . ' hour';
        if ($difference->h > 1) {
            $humanReadableDifference .= 's';
        }
        $humanReadableDifference .= ' ago';
    } elseif ($difference->i > 0) {
        $humanReadableDifference .= $difference->i . ' minute';
        if ($difference->i > 1) {
            $humanReadableDifference .= 's';
        }
        $humanReadableDifference .= ' ago';
    } else {
        $humanReadableDifference .= 'Just now';
    }

    return $humanReadableDifference;
}