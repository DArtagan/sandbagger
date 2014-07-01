$(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $(".embed-youtube").fitVids();
    $(".embed-gdrive-video").fitVids({ customSelector: "iframe[src^='https://docs.google.com'] "});
});
