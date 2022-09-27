var videoFiles = [], videoDt = new DataTransfer(), videoThumb = $('.videoThumb').clone().show(), videoGallery = $('.divVideoMediaPreview');

$('#videoInp').change(function (v) {
    $.each(v.target.files, function (n, i) {
        var reader = new FileReader();
        reader.readAsDataURL(i);
        reader.onload = (function (i) {
            return function (x) {
                videoFiles.push({file: i, data: x.target.result});
                videoUpdateList(videoFiles.length - 1);
            }
        })(i);
    });

    for (let file of this.files) {
        videoDt.items.add(file);
    }
    this.files = videoDt.files;
});



function videoUpdateList(n) {
    var e = videoThumb.clone();
    e.find('video').attr('src', videoFiles[n].data);
    e.find('label').html(videoFiles[n]['file']['name']);
    e.find('span').click(removeFromList).data('n', n);
    videoGallery.append(e);

    function removeFromList() {
        var name = videoFiles[$(this).data('n')]['file']['name'];
        for (let i = 0; i < videoDt.items.length; i++) {
            if (name === videoDt.items[i].getAsFile().name) {
                videoDt.items.remove(i);
                continue;
            }
        }
        document.getElementById('videoInp').files = videoDt.files;
        videoFiles[$(this).data('n')] = null;
        $(this).parent().remove();
    }
}
