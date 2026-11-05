<?php

// Vercel entry point: the community `vercel-php` runtime only treats PHP
// files inside the `api/` directory as Serverless Functions. This bridge
// hands every request to the real Laravel front controller in public/.
require __DIR__ . '/../public/index.php';
