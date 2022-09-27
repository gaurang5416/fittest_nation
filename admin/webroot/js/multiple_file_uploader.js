var files = [];
var dt = new DataTransfer();
$('#imgInp').change(function (v) {
    $.each(v.target.files, function (n, i) {
        var reader = new FileReader();
        reader.readAsDataURL(i);
        reader.onload = (function (i) {
            return function (x) {
                files.push({file: i, data: x.target.result});
                updateList(files.length - 1);
            }
        })(i);
    });

    for (let file of this.files) {
        dt.items.add(file);
    }
    this.files = dt.files;
});

var thumb = $('.thumb').clone().show(), gallery = $('.divImageMediaPreview');

function updateList(n) {
    var e = thumb.clone();
    e.find('img').attr('src', files[n].data);
    e.find('label').html(files[n]['file']['name']);
    e.find('span').click(removeFromList).data('n', n);
    console.log(files[n]);
    gallery.append(e);

    function removeFromList() {
        var name = files[$(this).data('n')]['file']['name'];
        for (let i = 0; i < dt.items.length; i++) {
            if (name === dt.items[i].getAsFile().name) {
                dt.items.remove(i);
                continue;
            }
        }
        document.getElementById('imgInp').files = dt.files;
        files[$(this).data('n')] = null;
        $(this).parent().remove();
    }
}
