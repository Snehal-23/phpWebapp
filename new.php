





<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <title>CKEditor</title>
                <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
        </head>
        <body>
             <div id="toolbar-container"></div>

    <!-- This container will become the editable. -->
    <div id="editor">
        <p>This is the initial editor content.</p>
    </div>
      

                <div id="editor">This is some sample content.</div>
                <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
        </body>
</html>


     



<!-- Comments Form -->




















                                        <div class="well">
                                            <h4>Leave a Comment:</h4>
                                            <form role="form">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" id="editor"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>

                                        <hr>

                                        <!-- Posted Comments -->


                                        <!-- Comment -->
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">Start Bootstrap
                                                    <small>August 25, 2014 at 9:30 PM</small>
                                                </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. 
                                                <!-- Nested Comment -->
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Nested Start Bootstrap
                                                            <small>August 25, 2014 at 9:30 PM</small>
                                                        </h4>
                                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. 
                                                    </div>
                                                </div>
                                                <!-- End Nested Comment -->
                                            </div>
                                        </div>