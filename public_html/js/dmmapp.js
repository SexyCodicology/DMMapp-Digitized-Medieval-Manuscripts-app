function initMap() {
    var customMapType = new google.maps.StyledMapType([{
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [{
            "visibility": "on"
        }]
    }, {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [{
            "visibility": "off"
        }]
    }, {
        "featureType": "road",
        "elementType": "all",
        "stylers": [{
            "color": "#bfbfbf"
        }]
    }, {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [{
            "color": "#ebebeb"
        }]
    }, {
        "featureType": "water",
        "elementType": "all",
        "stylers": [{
            "visibility": "simplified"
        }, {
            "color": "#006699"
        }]
    }, {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [{
            "visibility": "off"
        }]
    }]);

    var customMapTypeId = 'custom_style';

    var center = {
        lat: 48.76034594263708,
        lng: 8.609468946875056
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: center,
        zoom: 5,
        zoomControl: false,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: false,
        fullscreenControl: false
    });

    map.mapTypes.set(customMapTypeId, customMapType);
    map.setMapTypeId(customMapTypeId);

    var infowindow = new google.maps.InfoWindow();

    //At the moment we are loading empty infowindow, and there are no coordinates for markers. This will take care of it.
    function addMarker(place) {

        //Here we are defining the content for the Infowindows
        var infowindowContent = "<h3>" + place.library + "</h3>" + "<p>" + place.city + ", " + place.nation + "</p>" + "<p>No. of objects: " + place.quantity + "</p>" + '<hr><div class="d-grid gap-2"><a class="btn btn-primary" href="' + place.website + '" target="_blank"><i class="fas fa-link"></i> Browse the manuscripts</a><a class="btn btn-success" href="' + place.library_name_slug + '" target="_blank"><i class="fas fa-search-plus"></i> Explore additional data</a></div><div><hr><p><a href="https://docs.google.com/forms/d/e/1FAIpQLSfYd3J_nTxiF82Nvm2i7YBhRfbP9mO6cxffSLF5nmgCK5PQ8g/viewform?entry.2011995917=' + place.library + '&entry.1561016982=' + place.website + '" class="badge bg-danger" target="_blank"> report broken link</a></p></div>';

        //Here we are trying to click on the table, center our map on the clicked library, and pass the data.
        var clickToggle = function () { //when clicked, do this:
            map.setCenter({
                lat: parseFloat((place.lat)),
                lng: parseFloat((place.lng)),
            });
            infowindow.setContent(infowindowContent);
            infowindow.open(map, marker);

        };
        var marker = new google.maps.Marker({ //here we are adding the pins for every library.
            position: {
                lat: parseFloat((place.lat)),
                lng: parseFloat((place.lng)),
            },
            map: map,
            "data": place.Library
        });

        marker.addListener('click', clickToggle);

    };

    libraries.map(addMarker);


    //Datatables
    $(function(){
        var table = $('#dmmtable').DataTable({
            data: libraries,
            columns: [
                { "data": "library" }, //0
                { "data": "iiif" }, //1
                { "data": "quantity" }, //2
                { "data": "copyright" }, //3
                { "data": "is_free_cultural_works_license" }, //4
                { "data": "nation" }, //5
                { "data": "city" }, //6
                { "data": "lat" }, //7
                { "data": "lng" }, //8
                { "data": "notes" }, //9
                { "data": "website" }, //10
                { "data": "has_post" }, // 11
                { "data": "post_url" }, // 12
                { "data": "library_name_slug"},
            ],

            responsive: {
                details: false
            },
            searchPanes: true,
            searchPanes: {
                threshold: 1,
            },

            columnDefs: [

                {
                    targets: [3, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                    visible: false
                },
                {
                    targets: [1, 2, 3, 4, 7, 8, 9, 10, 11, 12, 13],
                    searchable: false
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: 2
                },
                {
                    searchPanes: {
                        show: false
                    },
                    targets: [1, 3, 5, 6, 7, 8, 9, 10 , 11, 12, 13]
                },
                {
                    targets: [1, 4],
                    render: function (data) {

                        if (data === 1) {
                            return "<p style='display:none'>yes</p><i class='fas fa-2x fa-check-circle text-success'></i>";

                        }
                        else {
                            return "<p style='display:none'>no</p><i class='fas fa-2x fa-times-circle text-danger'></i>";
                        }
                    }
                },
                {
                    targets: [0],
                    searchPanes: {
                        viewCount: false
                    },

                },
            ],

            fnInitComplete : function() {
                $("#spinner").hide();
             }

        });
        table.searchPanes.container().prependTo(table.table().container());
        table.searchPanes.resizePanes();

        //SECTION when a user clicks on the table row, move to marker.
        $('#dmmtable tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            var infowindowContent = "<h3>" + data.library + "</h3>" + "<p>" + data.city + ", " + data.nation + "</p>" + "<p>No. of objects: " + data.quantity + "</p>" + '<hr><div class="d-grid gap-2"><a class="btn btn-primary" href="' + data.website + '" target="_blank"><i class="fas fa-link"></i> Browse the manuscripts</a><a class="btn btn-success" href="' + data.library_name_slug + '" target="_blank"><i class="fas fa-search-plus"></i> Explore additional data</a></div><div><hr><p><a href="https://docs.google.com/forms/d/e/1FAIpQLSfYd3J_nTxiF82Nvm2i7YBhRfbP9mO6cxffSLF5nmgCK5PQ8g/viewform?entry.2011995917=' + data.library + '&entry.1561016982=' + data.website + '" class="badge bg-danger" target="_blank"> report broken link</a></p></div>';
            var marker = new google.maps.Marker({ //here we are adding the pins for every library.
                position: {
                    lat: parseFloat((data.lat)),
                    lng: parseFloat((data.lng)),
                },
                map: map,
                "data": data.Library
            });

            map.setCenter({
                lat: parseFloat((data.lat)),
                lng: parseFloat((data.lng)),
            });

            map.setZoom(12);

            infowindow.setContent(infowindowContent);
            infowindow.open(map, marker);

            $('html, body').animate({
                scrollTop: $("#lead").offset().top
            }, 500);
        });

    });
};

//TODO TEST
$.fn.DataTable.ext.type.search.string = function (data) {
    return !data ?
        '' :
        typeof data === 'string' ?
            data
                .replace(/[áÁàÀâÂäÄãÃåÅæÆ]/g, 'a')
                .replace(/[çÇ]/g, 'c')
                .replace(/[éÉèÈêÊëË]/g, 'e')
                .replace(/[íÍìÌîÎïÏîĩĨĬĭ]/g, 'i')
                .replace(/[ñÑ]/g, 'n')
                .replace(/[óÓòÒôÔöÖœŒ]/g, 'o')
                .replace(/[ß]/g, 's')
                .replace(/[úÚùÙûÛüÜ]/g, 'u')
                .replace(/[ýÝŷŶŸÿ]/g, 'n') :
            data;
};
