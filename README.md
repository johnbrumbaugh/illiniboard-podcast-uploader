# IlliniBoard Podcast Uploader
The IlliniBoard Podcast Uploader is a quick WordPress plugin that allowed me to place an upload dialog box that would give a WordPress Admin the ability to upload file from their computer to an Amazon S3 bucket with minimal server-side integration.

This code leverages the Widen Fine Uploader located at: https://github.com/Widen/fine-uploader for the processing.  The only difference is the addition of placing this within the WordPress Admin Panel and changing the file name and bucket location based on the uploaded file's name instead of the UUID.
