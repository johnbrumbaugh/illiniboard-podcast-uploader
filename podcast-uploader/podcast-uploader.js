/* Note for artile, I had to add in and call this using jQuery instead of $ */
jQuery(document).ready( function() {
	jQuery('#fine-uploader').fineUploaderS3({
		debug: true,
		request: {
			endpoint: "${ENDPOINT_HERE}",
			accessKey: "${ACCESS_KEY}"
		},
		signature: {
			endpoint: "/s3/fine-uploader-server.php"
		},
		objectProperties: {
			acl: "public-read",
			key: function(fileId) {
				return "podcasts/" + jQuery('#fine-uploader').fineUploaderS3('getName', fileId);
			}
		}
	}).on("complete", function( event, id, name, responseJson, xhr ) {
        var podcastUrl = ${S3_BUCKET_URL} + name;
        jQuery('.qq-file-id-' + id).append('<div><p><strong>File Location:</strong> <a href="' + podcastUrl + '">' + podcastUrl + '</a></p></div>');
	});
});
