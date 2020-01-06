<?php

/**
 * Simple page redirect.
 * @param string $page
 */
function redirect(string $page)
{
    header('location: ' . URLROOT . '/' . $page);
}
