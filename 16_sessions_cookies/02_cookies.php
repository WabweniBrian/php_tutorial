<?php

// How to set cookies
setcookie('key', 'value', time() + 60);

// How to update cookie
setcookie('key', 'value_updated', time() + 3600);

// How to delete cookie
setcookie('key', '', time() - 3600);