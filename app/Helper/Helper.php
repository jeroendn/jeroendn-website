<?php
/**
 * Define globally accessible functions inside Helpers.php
 */

/**
 * @return string
 */
function getPageTitle(): string {
    $title = request()->segment(count(request()->segments()));
    return ($title !== null) ? $title : 'home';
}
