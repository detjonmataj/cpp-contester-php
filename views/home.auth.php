<?php
echo "Home page of application $name <br>";

$displayName = Application::$APP->getUser()?->getDisplayName() ?? null;
echo "Welcome $displayName<br>";
