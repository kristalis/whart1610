
        Dropzone.options.imageUpload = {
        	uploadMultiple: false,
        	parallelUploads: 100,
            maxFilesize         :       1,
            previewsContainer: '#dropzonePreview',
    		previewTemplate: document.querySelector('#preview-template').innerHTML,
    		addRemoveLinks: true,
    		dictRemoveFile: 'Remove',
    		dictFileTooBig: 'Image is bigger than 1MB',
    		dictRemoveFileConfirmation: "Are you sure you wish to delete this image?",
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            // The setting up of the dropzone
    init:function() {

        this.on("removedfile", function(file) {

            $.ajax({
                type: 'POST',
                url: 'upload/delete',
                data: {id: file.name, _token: $('#csrf-token').val()},
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    if(rep.code == 200)
                    {
                       
                    }

                }
            });

        } );
    },
            
            

  }



