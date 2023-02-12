function initMap() {
    let  customMapType = new google.maps.StyledMapType([{
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

    let  customMapTypeId = 'custom_style';

    let  center = {
        lat: 48.76034594263708,
        lng: 8.609468946875056
    };

    let  map = new google.maps.Map(document.getElementById('map'), {
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

    let  infowindow = new google.maps.InfoWindow();

    //At the moment we are loading empty infowindow, and there are no coordinates for markers. This will take care of it.
    function addMarker(place) {

        //Here we are defining the content for the Infowindows
        let  infowindowContent = "<h3>" + place.library + "</h3>" + "<p>" + place.city + ", " + place.nation + "</p>" + "<p>No. of objects: " + place.quantity + "</p>" + '<hr><div class="d-grid gap-2"><a class="btn btn-success" href="' + place.website + '" target="_blank"><i class="bi bi-link"></i> Go to the digitized manuscripts <sup><i class="bi bi-box-arrow-up-right fa-xs"></i></sup></a><a class="btn btn-primary" href="' + place.library_name_slug + '" target="_blank"><i class="bi bi-search"></i> Explore additional data</a></div><div><hr><p><a href="https://docs.google.com/forms/d/e/1FAIpQLSfYd3J_nTxiF82Nvm2i7YBhRfbP9mO6cxffSLF5nmgCK5PQ8g/viewform?entry.2011995917=' + place.library + '&entry.1561016982=' + place.website + '" class="badge bg-danger" target="_blank"> report broken link</a></p></div>';

        //Here we are trying to click on the table, center our map on the clicked library, and pass the data.
        let  clickToggle = function () { //when clicked, do this:
            map.setCenter({
                lat: parseFloat((place.lat)),
                lng: parseFloat((place.lng)),
            });
            infowindow.setContent(infowindowContent);
            infowindow.open(map, marker);

        };
        let  marker = new google.maps.Marker({ //here we are adding the pins for every library.
            position: {
                lat: parseFloat((place.lat)),
                lng: parseFloat((place.lng)),
            },
            map: map,
            "data": place.Library
        });

        marker.addListener('click', clickToggle);

    }


        //SECTION when a user clicks on the table row, move to marker.
        $('.yajra-datatable tbody').on('click', 'tr', function () {
            let data = table.row(this).data();
            let infowindowContent = "<h3>" + data.library + "</h3>" + "<p>" + data.city + ", " + data.nation + "</p>" + "<p>No. of objects: " + data.quantity + "</p>" + '<hr><div class="d-grid gap-2"><a class="btn btn-success" href="' + data.website + '" target="_blank"><i class="bi-link"></i> Go to the digitized manuscripts <sup><i class="bi-box-arrow-up-right fa-xs"></i></sup></a><a class="btn btn-primary" href="' + data.library_name_slug + '" target="_blank"><i class="bi-search-plus"></i> Explore additional data</a></div><div><hr><p><a href="https://docs.google.com/forms/d/e/1FAIpQLSfYd3J_nTxiF82Nvm2i7YBhRfbP9mO6cxffSLF5nmgCK5PQ8g/viewform?entry.2011995917=' + data.library + '&entry.1561016982=' + data.website + '" class="badge bg-danger" target="_blank"> report broken link</a></p></div>';
            let marker = new google.maps.Marker({ //here we are adding the pins for every library.
                position: {
                    lat: parseFloat((data.lat)),
                    lng: parseFloat((data.lng)),
                },
                map: map,
                "data": data.data
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
}
//TODO TEST
$.fn.DataTable.ext.type.search.string = function (data) {
    return !data ?
        '' :
        typeof data === 'string' ?
            data
                .replace(/[áÁàÀâÂäÄãÃåÅæÆ]/g, 'a')
                .replace(/[çÇ]/g, 'c')
                .replace(/[éÉèÈêÊëË]/g, 'e')
                .replace(/[íÍìÌîÎïÏĩĨĬĭ]/g, 'i')
                .replace(/[ñÑ]/g, 'n')
                .replace(/[óÓòÒôÔöÖœŒ]/g, 'o')
                .replace(/[ß]/g, 's')
                .replace(/[úÚùÙûÛüÜ]/g, 'u')
                .replace(/[ýÝŷŶŸÿ]/g, 'n') :
            data;
};
