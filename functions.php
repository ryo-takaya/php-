<?php

/*
 * htmlをエスケープする
 */
function escapeHtml(string $str): string
{
    return htmlspecialchars($str,2,'UTF-8');
}