$(document).ready(function () {
	console.log("Pagination design script loaded");
	function loadPortfolio(page) {
		$.ajax({
			url: "fetch_portfolio.php",
			type: "GET",
			data: { page: page },
			success: function (response) {
				var portfolioWrapper = $(".portfolio-wrapper");
				portfolioWrapper.empty();
				console.log(response);

				response.items.forEach(function (item) {
					var filterClass = getFilter(item.filter);
					var iconClass = getIcon(item.filter);

					if (item.type === "work-image") {
						portfolioWrapper.append(`
                            <div class="col-md-4 col-sm-6 grid-item ${filterClass}">
                                <a href="${item.asset_link}" class="work-image">
                                    <div class="portfolio-item rounded shadow-dark">
                                        <div class="details">
                                            <span class="term">${item.filter}</span>
                                            <h4 class="title">${item.title}</h4>
                                            <span class="more-button"><i class="${iconClass}"></i></span>
                                        </div>
                                        <div class="thumb">
                                            <img src="${item.thumb_link}" alt="${item.title}" />
                                            <div class="mask"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `);
					} else if (item.type === "gallery-link") {
						var galleryLinks = extractLinks(item.extra_link)
							.map(function (link) {
								return `<a href="${checkUrlFromDrive(
									link,
									item.gdrive_api
								)}"></a>`;
							})
							.join("");

						portfolioWrapper.append(`
                            <div class="col-md-4 col-sm-6 grid-item ${filterClass}">
                                <a href="#gallery-${item.UID}" class="gallery-link">
                                    <div class="portfolio-item rounded shadow-dark">
                                        <div class="details">
                                            <span class="term">${item.filter}</span>
                                            <h4 class="title">${item.title}</h4>
                                            <span class="more-button"><i class="${iconClass}"></i></span>
                                        </div>
                                        <div class="thumb">
                                            <img src="${item.thumb_link}" alt="${item.title}" />
                                            <div class="mask"></div>
                                        </div>
                                    </div>
                                </a>
                                <div id="gallery-${item.UID}" class="gallery mfp-hide">
                                    ${galleryLinks}
                                </div>
                            </div>
                        `);
					} else if (item.type === "work-video") {
						portfolioWrapper.append(`
                            <div class="col-md-4 col-sm-6 grid-item ${filterClass}">
                                <a href="${item.asset_link}" class="work-video">
                                    <div class="portfolio-item rounded shadow-dark">
                                        <div class="details">
                                            <span class="term">${item.filter}</span>
                                            <h4 class="title">${item.title}</h4>
                                            <span class="more-button"><i class="${iconClass}"></i></span>
                                        </div>
                                        <div class="thumb">
                                            <img src="${item.thumb_link}" alt="${item.title}" />
                                            <div class="mask"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `);
					} else if (item.type === "work-content") {
						portfolioWrapper.append(`
                            <div class="col-md-4 col-sm-6 grid-item ${filterClass}">
                                <a href="#small-dialog-${item.UID}" class="work-content">
                                    <div class="portfolio-item rounded shadow-dark">
                                        <div class="details">
                                            <span class="term">${item.filter}</span>
                                            <h4 class="title">${item.title}</h4>
                                            <span class="more-button"><i class="${iconClass}"></i></span>
                                        </div>
                                        <div class="thumb">
                                            <img src="${item.thumb_link}" alt="${item.title}" />
                                            <div class="mask"></div>
                                        </div>
                                    </div>
                                </a>
                                <div id="small-dialog-${item.UID}" class="white-popup zoom-anim-dialog mfp-hide">
                                    <img src="${item.asset_link}" alt="${item.title}" />
                                    <h2>${item.title}</h2>
                                    <p>${item.p1_content}</p>
                                    <p>${item.p2_content}</p>
                                    <a href="${item.extra_link}" target="_blank" class="btn btn-default">${item.caption_content}</a>
                                </div>
                            </div>
                        `);
					}
				});

				// Update pagination
				// var paginationWrapper = $(".pagination-wrapper");
				// paginationWrapper.empty();
				// var paginationHtml = '<ul class="pagination">';
				var paginationp12 = $(".p12");
				paginationp12.empty();
				var pagp12 = '<ul class="pag-p12">';

				// if (response.current_page > 1) {
				// 	paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${
				// 		response.current_page - 1
				// 	}">Previous</a></li>`;
				// }

				if (response.current_page > 1) {
					pagp12 += `<a class="nav-is-active" href="#" data-page="${
						response.current_page - 1
					}">
                            <li>Previous</li>
                        </a>`;
				}

				if (response.current_page == 1) {
					pagp12 += `<a class="inactive" data-page="${response.current_page}">
                            <li>Previous</li>
                        </a>`;
				}

				// for (var i = 1; i <= response.total_pages; i++) {
				// 	paginationHtml += `<li class="page-item ${
				// 		i === response.current_page ? "active" : ""
				// 	}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
				// }

				var max_page = 5;
				var start_page = Math.max(
					1,
					response.current_page - Math.floor(max_page / 2)
				);
				var end_page = Math.min(
					response.total_pages,
					start_page + max_page - 1
				);
				start_page = Math.max(1, end_page - max_page + 1);
				end_page = Math.min(response.total_pages, end_page);

				for (var i = start_page; i <= end_page; i++) {
					pagp12 += `<a class="${
						i === response.current_page ? "is-active" : ""
					}" href="#works" data-page="${i}">
                            <li>${i}</li>
                        </a>`;
				}

				// if (response.current_page < response.total_pages) {
				// 	paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${
				// 		response.current_page + 1
				// 	}">Next</a></li>`;
				// }

				if (response.current_page < response.total_pages) {
					pagp12 += `<a class="nav-is-active" href="#" data-page="${
						response.current_page + 1
					}">
                            <li>Next</li>
                        </a>`;
				}

				// if (response.current_page == response.total_pages) {
				// 	pagp12 += `<a class="inactive">
				//             <li>Next</li>
				//         </a>`;
				// }

				if (response.current_page == response.total_pages) {
					pagp12 += `<a class="inactive" data-page="${response.current_page}">
                            <li>Next</li>
                        </a>`;
				}

				// paginationHtml += "</ul>";
				// paginationWrapper.append(paginationHtml);
				pagp12 += "</ul>";
				paginationp12.append(pagp12);

				// Inisialisasi ulang plugin animasi setelah memuat konten AJAX
				initializePlugins();
				$(".portfolio-wrapper").isotope("destroy");
			},
			error: function (error) {
				console.log("Error loading portfolio items", error);
			},
		});
	}

	// Load initial portfolio items
	loadPortfolio(1);

	// Handle pagination click
	$(document).on("click", ".pagination a", function (e) {
		e.preventDefault();
		var page = $(this).data("page");
		loadPortfolio(page);
	});

	// Utility functions
	function getIcon(filter) {
		if (filter === "Poster") {
			return "icon-picture";
		} else if (filter === "Art") {
			return "icon-star";
		} else if (filter === "Video") {
			return "icon-camrecorder";
		} else if (filter === "Logo") {
			return "icon-trophy";
		}
	}

	function getFilter(filter) {
		if (filter === "Poster") {
			return "art";
		} else if (filter === "Art") {
			return "branding";
		} else if (filter === "Video") {
			return "creative";
		} else if (filter === "Logo") {
			return "design";
		}
	}

	function extractLinks(extra_asset) {
		var matches = extra_asset.match(/"([^"]+)"/g);
		return matches
			? matches.map(function (match) {
					return match.replace(/"/g, "");
			  })
			: [];
	}

	// get link from gdrive
	function checkUrlFromDrive(url_db, gdrive_api_key) {
		if (url_db.includes("drive.google.com")) {
			const matches = url_db.match(/\/d\/([a-zA-Z0-9_-]+)/);
			if (matches && matches[1]) {
				return `https://www.googleapis.com/drive/v3/files/${matches[1]}?alt=media&key=${gdrive_api_key}`;
			}
		}
		return url_db;
	}
});
