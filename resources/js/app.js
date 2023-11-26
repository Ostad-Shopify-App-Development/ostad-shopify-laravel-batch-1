import './bootstrap';

import * as Turbo from '@hotwired/turbo';

document.addEventListener("DOMContentLoaded", (event) => {
    Turbo.start();
});

document.addEventListener("turbo:load", (event) => {
    console.log("turbo:load");
});
