<?php

function escapeHTML(string $text)
{
  return trim(htmlentities($text, ENT_QUOTES));
}