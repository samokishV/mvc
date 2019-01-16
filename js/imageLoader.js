function handleFileSelect(evt) {
    var files = evt.target.files;

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          var src = e.target.result;
          var title = escape(theFile.name);
          span.innerHTML = 
            '<div class="thumbnails-block">'+
                '<img src="'+ src+'" title="'+title+'">'+
                '<div class="close-btn" onclick="deleteImg(this)">'+
                    '<a href="#"><i class="far fa-times-circle"></i></a>'+  
                '</div>'+
                '<input name="images[]" type="hidden" value="'+src+'">'+
            '</div>';
         
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);

  function deleteImg(a) {
    parent = a.parentElement;
    parent.parentNode.removeChild(parent);
  }
