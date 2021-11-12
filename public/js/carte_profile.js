    const mapboxToken = 'pk.eyJ1Ijoia2lyYWR1MTMiLCJhIjoiY2t2djdqZDF5MDBkYTJ2bjQxOHI1eHNhcCJ9.1Gy1cLL4PsURPsQFUeNSaw';
    const zones = [
        { distance: 10, color: "#00b798"},
        { distance: 30, color: "#ffb846"},
    ];
    let zoneIndex = 0;
    let carte;
    let marker;
    let circle;

    function addMarker(latlng) {
        marker = L.marker(latlng, {draggable: true }).addTo(carte);

        marker.on("dragstart", removeCircle);
        marker.on("dragend" , addCircle);
    }

    function removeMarker() {
        marker.remove();
        marker = null;
    }

    function addCircle() {
        circle = L.circle(marker.getLatLng(), {
            color: zones[zoneIndex].color,
            fillColor: zones[zoneIndex].color,
            fillOpacity: .15,
            radius: zones[zoneIndex].distance * 1000,
        }).addTo(carte)
    }

    function removeCircle() {
        circle.remove();
        circle = null;
    }

    function initmap(){
        carte = L.map('maCarte').setView([43.40612794950487, 132.98255905297853], 5);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 20,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: mapboxToken,
        }).addTo(carte);

        carte.on("click", (e) => {
            if (!marker) {
                addMarker(e.latlng);
                addCircle();
            }else {
                removeCircle();
                marker.setLatLng(e.latlng);
                addCircle();
            }
        });

        document.addEventListener("keydown", (e) => {
            if (!marker) {
                return;
            }
            switch (e.key) {
                case " ":
                    removeCircle();
                    zoneIndex ^= 1;
                    addCircle();
                    break;
                case "Escape":
                    removeCircle();
                    removeMarker();
                    break;
            }
        });
    }

    initmap();