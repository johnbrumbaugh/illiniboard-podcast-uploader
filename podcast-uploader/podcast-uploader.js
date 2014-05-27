(function($) {
	$(function() {
		$('#fine-uploader').fineUploaderS3({
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
					return "podcasts/" + this.getName(fileId);
				}
			}
		}).on("complete", function( event, id, name, responseJson, xhr ) {
			var key = this.fineUploaderS3("getKey", id),
	        	    podcastUrl = "${ENDPOINT_HERE}" + key,
	        	    $fileContainer = this.fineUploader("getItemByFileId", id);
	        	$fileContainer.append('<div><p><strong>File Location:</strong> <a href="' + podcastUrl + '">' + podcastUrl + '</a></p></div>');
		});
	});
}(jQuery));
