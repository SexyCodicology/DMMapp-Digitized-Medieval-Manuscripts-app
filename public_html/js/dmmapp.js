/* localStorage.placeData = localStorage.placeData ? localStorage.placeData : "";

if (libraries instanceof Array) {
    libraries = libraries.concat(JSON.parse("[" + localStorage.placeData.slice(0, -1) + "]") || []);
} else {
    console.log("AJAX error");
    libraries = JSON.parse("[" + localStorage.placeData.slice(0, -1) + "]") || [];
} */

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

        //Here we are defining the stuff for the datatable: first define what is in the "row" and then append it.
        var row = $("<tr>" + "<td>" + place.nation + "</td>" + "<td>" + place.city + "</td>" + "<td>" + place.library + "</td>" + "<td>" + place.lat + "</td>" + "<td>" + place.lng + "</td>" + "<td>" + place.quantity + "</td>" + "<td>" + '<a href="' + place.website + '" target="_blank">Browse the manuscripts</a>' + "</td>" + "</tr>");
        $("#datatablex").find('tbody').append(row);

        //Here we are defining the content for the Infowindows
        var infowindowContent = "<h3>" + place.library + "</h3><p>" + place.quantity + "</p>" + '<a class="btn btn-success btn-block" href="' + place.website + '" target="_blank"><i class="fas fa-book-open"></i> Browse the manuscripts</a><a class="btn btn-info btn-block" href="/app/record/' + place.id + '" target="_blank"><i class="fas fa-drafting-compass"></i> Explore additional data</a></div><p><a href="https://docs.google.com/forms/d/e/1FAIpQLSfYd3J_nTxiF82Nvm2i7YBhRfbP9mO6cxffSLF5nmgCK5PQ8g/viewform?entry.2011995917=' + place.library + '&entry.1561016982=' + place.website + '" class="badge badge-light" target="_blank"> report broken link</a></p></div>';

        //Here we are trying to click on the table, center our map on the clicked library, and pass the data.
        var clickToggle = function () { //when clicked, do this:
            map.setCenter({
                lat: parseFloat((place.lat)),
                lng: parseFloat((place.lng)),
            });
            map.setZoom(12);
            infowindow.setContent(infowindowContent);
            infowindow.open(map, marker);
            row.parent().find('tr').removeClass('bolderText');
            row.addClass('bolderText');

            //Smootly scroll up to the map when a row is clicked
            $('html, body').animate({
                scrollTop: $("#dmmmap").offset().top
            }, 500);

        };

        var marker = new google.maps.Marker({ //here we are adding the pins for every library.
            position: {
                lat: parseFloat((place.lat)),
                lng: parseFloat((place.lng)),
            },
            map: map,
            title: place.Library
        });

        row.click(clickToggle);
        marker.addListener('click', clickToggle);

    };

    //Datatable

    libraries.map(addMarker);
    //Datatable options go here!
    $('#datatablex').DataTable({
        "responsive": true,
        "processing": true,
        "columnDefs": [{
                "targets": [3],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [4],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [6],
                "visible": false,
                "searchable": false
            },
            {
                responsivePriority: 1,
                targets: 2
            },
            {
                responsivePriority: 2,
                targets: -1
            }
        ]

    });
};

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