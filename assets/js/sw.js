‘use strict’;
importScripts(‘sw-toolbox.js’); toolbox.precache([“../../index.php”,”../css/style.css”,”../../basket.php”,”../../combo.php”,”../../deserts.php”,”../../rolls.php”,”../../search.php”,”../../sety.php”,”../../user.php”]); toolbox.router.get(‘/images/*’, toolbox.cacheFirst); toolbox.router.get(‘/*’, toolbox.networkFirst, { networkTimeoutSeconds: 5});