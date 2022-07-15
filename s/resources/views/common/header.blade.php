<script type="application/javascript">
    var images = new Array(8); // generate an array 8 deep, 2 wide
    var i = 0; // used for looping

    for (i = 0; i < images.length; i++) {
        images[i] = new Image;
        images[i].src = "/images/toolbar_images/tb_" + i + "_ro.gif"; // swapable gif
    }

    function swap_image(img, which) {
        var tmp = new Image;
        tmp.src = img.src;
        img.src = images[which].src;
        images[which].src = tmp.src;
    }
</script>

<?php include ROOTUP . "/header.php" ?>