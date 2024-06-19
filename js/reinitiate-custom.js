function initializePlugins() {
	// Inisialisasi plugin lain yang Anda gunakan di sini...


	var bolbyPopup = function () {
		/*=========================================================================
              Magnific Popup
      =========================================================================*/
		$(".work-image").magnificPopup({
			type: "image",
			closeBtnInside: false,
			mainClass: "my-mfp-zoom-in",
		});

		$(".work-content").magnificPopup({
			type: "inline",
			fixedContentPos: true,
			fixedBgPos: true,
			overflowY: "auto",
			closeBtnInside: false,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: "my-mfp-zoom-in",
		});

		function gdriveUrlIframe(url) {
			var idMatch = url.match(/\/d\/([a-zA-Z0-9_-]+)/);
			var fileId = idMatch ? idMatch[1] : null;
			if (fileId) {
				return "https://drive.google.com/file/d/" + fileId + "/preview";
			}
			return null;
		}

		$(".work-video").magnificPopup({
			type: "iframe",
			closeBtnInside: false,
			callbacks: {
				elementParse: function (item) {
					var clickedLink = item.el;
					var hrefValue = clickedLink.attr("href");
					console.log("Link yang diklik:", hrefValue);

					// Set the iframe source based on the clicked link
					if (hrefValue.includes("drive.google.com")) {
						item.src = gdriveUrlIframe(hrefValue);
						item.type = "iframe";
					}
				},
			},
			iframe: {
				markup:
					'<div class="mfp-iframe-scaler">' +
					'<div class="mfp-close"></div>' +
					'<iframe class="mfp-iframe" frameborder="0"' +
					'allow="accelerometer; autoplay;" allowfullscreen></iframe>' +
					"</div>",

				patterns: {
					youtube: {
						index: "youtube.com/",
						id: function (url) {
							var videoId = null;
							if (url.includes("youtube.com/watch?v=")) {
								var match = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
								if (match) {
									videoId = match[1];
								}
							} else if (url.includes("youtube.com/shorts/")) {
								var match = url.match(/shorts\/([a-zA-Z0-9_-]+)/);
								if (match) {
									videoId = match[1];
								}
							}
							return videoId;
						},
						src: "https://www.youtube.com/embed/%id%?autoplay=1",
					},
					vimeo: {
						index: "vimeo.com/",
						id: "/",
						src: "//player.vimeo.com/video/%id%?autoplay=1",
					},
					gmaps: {
						index: "//maps.google.",
						src: "%id%&output=embed",
					},
				},

				srcAction: "iframe_src",
			},
		});

		$(".gallery-link").on("click", function () {
			$(this).next().magnificPopup("open");
		});

		$(".gallery").each(function () {
			$(this).magnificPopup({
				delegate: "a",
				type: "image",
				closeBtnInside: false,
				gallery: {
					enabled: true,
					navigateByImgClick: true,
				},
				fixedContentPos: false,
				mainClass: "my-mfp-zoom-in",
			});
		});
	};

	bolbyPopup();

	/* ======= Mobile Filter ======= */

	// bind filter on select change
	$(".portfolio-filter-mobile").on("change", function () {
		// get filter value from option value
		var filterValue = this.value;
		// use filterFn if matches value
		filterValue = filterFns[filterValue] || filterValue;
		$container.isotope({ filter: filterValue });
	});

	var filterFns = {
		// show if number is greater than 50
		numberGreaterThan50: function () {
			var number = $(this).find(".number").text();
			return parseInt(number, 10) > 50;
		},
		// show if name ends with -ium
		ium: function () {
			var name = $(this).find(".name").text();
			return name.match(/ium$/);
		},
	};
}
